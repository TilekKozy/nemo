<?php

namespace App\Data\Airports;

use Spatie\LaravelData\Data;

class SearchData extends Data
{
    public function __construct(
        public string $search
    )
    {
    }
}
