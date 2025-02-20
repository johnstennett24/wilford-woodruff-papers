<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class LastImported extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        if ($value == -1) {
            return $query;
        }

        return $query->where(function ($query) use ($value) {
            $query->whereNull('imported_at')
                            ->orWhere('imported_at', '<', now('America/Denver')->subDays($value));
        });
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Anytime' => -1,
            'More than 24 Hours Ago' => 1,
            'More than 1 Week Ago' => 7,
            'More than 1 Month Ago' => 30,
        ];
    }
}
