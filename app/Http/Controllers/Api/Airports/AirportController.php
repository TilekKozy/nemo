<?php

namespace App\Http\Controllers\Api\Airports;

use App\Data\Airports\SearchData;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Airports\IndexRequest;
use App\Repositories\Interfaces\AirportInterface;
use Illuminate\Http\JsonResponse;


class AirportController extends BaseController
{
    public function __construct(
        private readonly AirportInterface $airportRepository
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/api/airports",
     *     summary="Получить аэропорты по поисковому запросу",
     *     tags={"Airports"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Поисковый запрос для фильтрации аэропортов",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Список аэропортов, соответствующих поисковому запросу",
     *         @OA\JsonContent(
     *
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="ошибка валидации"
     *     )
     * )
     */
    public function index(IndexRequest $request): JsonResponse
    {
        return response()->json(
            $this->airportRepository
                ->getByName(
                    SearchData::from($request->validated())
                )
        );
    }
}
