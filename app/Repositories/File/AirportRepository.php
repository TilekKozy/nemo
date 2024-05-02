<?php

namespace App\Repositories\File;

use App\Data\Airports\AirportData;
use App\Data\Airports\SearchData;
use App\Repositories\Interfaces\AirportInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class AirportRepository implements AirportInterface
{
    private string     $pathToFile;
    private string     $charset;
    private Collection $data;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->pathToFile = config('file-data.path');
        $this->charset = config('file-data.charset');
        $this->data = collect(json_decode(Storage::get($this->pathToFile), true));
    }

    public function getSearchColumns(): array
    {
        return ['cityName', 'airportName'];
    }

    public function getByName(SearchData $searchData): Collection
    {

        return AirportData::collect(
            $this->data->filter(function($airport) use ($searchData)
            {
                // проходимся по всем колонкам по которым должен пройти поиск по соответствию
                foreach($this->getSearchColumns() as $searchColumn) {
                    // Проверяем на наличее колонки
                    if(isset($airport[$searchColumn])){
                        // Поиск по всем языкам
                        foreach($airport[$searchColumn] as $value) {
                            // Проверяем на содержит ли строка заданную подстроку
                            return str_contains(
                                mb_strtolower($value, $this->charset),
                                mb_strtolower($searchData->search, $this->charset)
                            );
                        }
                    }

                }
                return false;

            })
        );
    }

}
