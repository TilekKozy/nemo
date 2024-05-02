<?php

namespace App\Repositories\Interfaces;

use App\Data\Airports\SearchData;
use Illuminate\Support\Collection;

interface AirportInterface
{
    public function getSearchColumns(): array;

    /**
     * @param SearchData $searchData
     *
     * @return Collection
     */
    public function getByName(SearchData $searchData): Collection;
}
