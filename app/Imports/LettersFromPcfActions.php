<?php

namespace App\Imports;

use App\Jobs\ImportLettersMasterFileAction;
use App\Jobs\ImportNewLettersFromPcfAction;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LettersFromPcfActions implements ToCollection, WithHeadingRow
{
    public $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            switch ($this->action) {
                case 'Import New':
                    ImportNewLettersFromPcfAction::dispatch($row);
                    break;
                case 'Import Master File':
                    ImportLettersMasterFileAction::dispatch($row);
                    break;
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
