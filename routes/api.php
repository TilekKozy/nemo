<?php

use App\Http\Controllers\Api\Airports\AirportController;
use Illuminate\Support\Facades\Route;

Route::get('airports', [AirportController::class, 'index']);
