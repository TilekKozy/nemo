<?php

namespace Tests\Feature\App\Http\Controllers\Api\Airports;

use Tests\TestCase;


class AirportControllerTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->getJson('/api/airports?search=a');

        // Проверка статуса ответа
        $response->assertStatus(200);

        // Проверка наличия нужных данных в ответе
        // Например, можно проверить наличие ожидаемых полей в JSON-ответе
        $response->assertJsonStructure([
                                           '*' => [
                                               "cityName" => [],
                                               "airportName",
                                               "area",
                                               "country",
                                               "lat",
                                               "lng",
                                               "timezone"
                                           ]
                                       ]);

    }
}
