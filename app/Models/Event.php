<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /**
     * Get all the resources that are assigned this item.
     */
    public function items()
    {
        return $this->morphedByMany(Item::class, 'timelineable');
    }

    /**
     * Get all the resources that are assigned this item.
     */
    public function pages()
    {
        return $this->morphedByMany(Page::class, 'timelineable');
    }

    /**
     * Get all the photos that are assigned this item.
     */
    public function photos()
    {
        return $this->morphedByMany(Photo::class, 'timelineable');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function toArray()
    {
        $event = [];

        if ($this->start_year) {
            $event['start_date']['year'] = $this->start_year;
        }
        if ($this->start_month) {
            $event['start_date']['month'] = $this->start_month;
        }
        if ($this->start_day) {
            $event['start_date']['day'] = $this->start_day;
        }

        if ($this->end_year) {
            $event['end_date']['year'] = $this->end_year;
        }
        if ($this->end_month) {
            $event['end_date']['month'] = $this->end_month;
        }
        if ($this->end_day) {
            $event['end_date']['day'] = $this->end_day;
        }

        $event['text'] = [
            'headline' => $this->headline,
            'text' => $this->text,
        ];

        if ($this->photos->count() > 0) {
            $event['media'] = [
                'url' => $this->photos->first()->getFirstMediaUrl('default', 'thumb'),
                'thumbnail' => $this->photos->first()->getFirstMediaUrl('default', 'thumb'),
            ];
        } elseif ($this->media->count() > 0) {
            $event['media'] = [
                'url' => $this->getFirstMediaUrl('default', 'thumb'),
                'thumbnail' => $this->getFirstMediaUrl('default', 'thumb'),
            ];
        }

        $event['group'] = $this->group;

        return $event;
    }

    public function formattedDate($side = 'start')
    {
        $date = [];

        if (! empty($this->{$side.'_month'})) {
            $date[] = Event::monthName($this->{$side.'_month'});
        }

        if (! empty($this->{$side.'_day'})) {
            $date[] = $this->{$side.'_day'}.',';
        }

        if (! empty($this->{$side.'_year'})) {
            $date[] = $this->{$side.'_year'};
        }

        return collect($date)->filter()->join(' ');
    }

    public static function monthName($num)
    {
        switch ($num) {
            case 1:
                return 'Jan';
            case 2:
                return 'Feb';
            case 3:
                return 'Mar';
            case 4:
                return 'Apr';
            case 5:
                return 'May';
            case 6:
                return 'June';
            case 7:
                return 'July';
            case 8:
                return 'Aug';
            case 9:
                return 'Sep';
            case 10:
                return 'Oct';
            case 11:
                return 'Nov';
            case 12:
                return 'Dec';

        }
    }
}
