<?php

namespace App\Console\Commands;

use App\Models\Subject;
use Illuminate\Console\Command;

class CaculateSubjectNamesAndIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subjects:process-names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse subject names and save index letter';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Subject::chunkById(100, function ($subjects) {
            foreach ($subjects as $subject) {
                $subject->calculateNames();
                $subject->save();
            }
        });

        return 0;
    }
}
