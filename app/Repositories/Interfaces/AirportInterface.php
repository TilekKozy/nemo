<?php

namespace App\Repositories\Interfaces;

use App\Data\Airports\SearchData;
use Illuminate\Support\Collection;

interface AirportInterface
{
    public function getSearchColumns(): array;

    public function getByName(SearchData $searchData): Collection;
}
