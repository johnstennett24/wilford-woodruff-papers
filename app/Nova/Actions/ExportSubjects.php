<?php

namespace App\Nova\Actions;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportSubjects extends DownloadExcel implements WithMapping, WithHeadings
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'Category',
            'Number Occurrences',
            'URL',
            'Bio',
        ];
    }

    /**
     * @param $item
     * @return array
     */
    public function map($subject): array
    {
        $subject->load('category');
        $subject->loadCount('pages');

        return [
            $subject->name,
            $subject->category->pluck('name')->join(';'),
            $subject->pages_count,
            config('app.url').'/subjects/'.$subject->slug,
            $subject->bio,
        ];
    }
}
