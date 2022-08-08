<?php

namespace App\Models;

use Carbon\Carbon;

class Period
{
    public Carbon $end;

    public Carbon $start;

    function __construct(Carbon $start, Carbon $end) {

        $this->start = $start;
        $this->end = $end;
    }
}
