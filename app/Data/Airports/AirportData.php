<?php

namespace App\Data\Airports;

use Spatie\LaravelData\Data;

class AirportData extends Data
{
    public function __construct(
        public array       $cityName,
        public ?array  $airportName,
        public ?string $area,
        public ?string $country,
        public ?float  $lat,
        public ?float  $lng,
        public ?string $timezone,
    )
    {
    }
}
