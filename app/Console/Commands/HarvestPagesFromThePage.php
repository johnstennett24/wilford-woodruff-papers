<?php

namespace App\Console\Commands;

use App\Jobs\ImportItemFromFtp;
use App\Models\Item;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class HarvestPagesFromThePage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:pages {item?} {--enable=false}  {--download=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import pages from From the Page';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = Item::query()
                        ->whereNotNull('ftp_id');

        if (! empty($itemId = $this->argument('item'))) {
            $items = $items->whereId($itemId);
        }

        $items = $items->get();

        $jobs = [];
        foreach ($items as $item) {
            $jobs[] = new ImportItemFromFtp($item, $this->option('enable'), $this->option('download'));
        }

        $batch = Bus::batch($jobs)
            ->onQueue('pages')
            ->name('Import Pages')
            ->allowFailures()
            ->dispatch();

        $this->info('Batch ID: '.$batch->id);

        return 0;
    }
}
