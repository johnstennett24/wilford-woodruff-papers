<?php

namespace App\Jobs;

use App\Models\Date;
use App\Models\Item;
use App\Models\Page;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use PHPHtmlParser\Dom;

class ImportItemFromFtp implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Item $item;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->batch()->cancelled()) {
            // Determine if the batch has been cancelled...
            return;
        }

        $item = $this->item;
        $response = Http::get($item->ftp_id);
        $canvases = $response->json('sequences.0.canvases');
        if (! empty($canvases)) {
            foreach ($canvases as $key => $canvas) {
                $page = Page::updateOrCreate([
                    'item_id' => $item->id,
                    'ftp_id' => $canvas['@id'],
                ], [
                    'name' => $canvas['label'],
                    'transcript_link' => $canvas['otherContent'][0]['@id'],
                    'transcript' => $this->convertSubjectTags(
                        (array_key_exists('otherContent', $canvas))
                            ? Http::get($canvas['otherContent'][0]['@id'])->json('resources.0.resource.chars')
                            : ''),
                    'ftp_link' => (array_key_exists('related', $canvas))
                        ? $canvas['related'][0]['@id']
                        : '',
                    'is_blank' => in_array('markedBlank', array_values(data_get($canvas, 'service.pageStatus', []))),
                ]);

                if (! $page->hasMedia()) {
                    $page->clearMediaCollection();

                    if (! empty($canvas['images'][0]['resource']['@id'])) {
                        $page->addMediaFromUrl($canvas['images'][0]['resource']['@id'])->toMediaCollection();
                    }
                }

                $page->subjects()->detach();

                $subjects = [];
                Str::of($page->transcript)->replaceMatches('/(?:\[\[)(.*?)(?:\]\])/s', function ($match) use (&$subjects) {
                    $subjects[] = Str::of($match[0])->trim('[[]]')->explode('|')->first();

                    return '[['.$match[0].']]';
                });
                foreach ($subjects as $subject) {
                    $subject = Subject::firstOrCreate([
                        'name' => $subject,
                    ]);
                    $subject->enabled = 1;
                    $subject->save();
                    $page->subjects()->syncWithoutDetaching($subject->id);
                }

                $page->dates()->delete();

                $dates = $this->extractDates($page->transcript);

                foreach ($dates as $date) {
                    try {
                        if (Carbon::canBeCreatedFromFormat($date, 'Y-m-d')) {
                            // No modification to date needed
                        } elseif (Carbon::canBeCreatedFromFormat($date, 'Y-m')) {
                            $date = $date.'-01';
                        } elseif (Carbon::canBeCreatedFromFormat($date, 'Y')) {
                            $date = $date.'-01-01';
                        } else {
                            logger()->warning('Date cannot be created from '.$date);
                        }
                        $d = new Date;
                        $d->date = $date;
                        $page->dates()->save($d);
                    } catch (\Exception $e) {
                        logger()->error($e->getMessage());
                    }
                }

                unset($page);
            }
        }

        $item->ftp_slug = str($response->json('related.0.@id'))->afterLast('/');
        $item->imported_at = now('America/Denver');
        $item->save();
    }

    private function convertSubjectTags($transcript)
    {
        $transcript = str($transcript);
        $links = $transcript->matchAll('/<a.*?<\/a>/s');

        foreach ($links as $link) {
            $title = str($link)->match("/(?<=title=')(.*?)(?=')/s");
            $text = str($link)->match("/(?<=>)(.*?)(?=<\/a>)/s");
            $transcript = $transcript->replace(
                $link,
                '[['.html_entity_decode($title).'|'.$text.']]'
            );
        }

        return $transcript;
    }

    private function extractDates($transcript)
    {
        $dates = [];
        $dom = new Dom;
        $dom->loadStr($transcript);
        $dateNodes = $dom->find('date');
        foreach ($dateNodes as $node) {
            $dates[] = $node->getAttribute('when');
        }

        return $dates;
    }
}
