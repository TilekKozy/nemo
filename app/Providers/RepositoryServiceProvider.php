<?php

namespace App\Providers;

use App\Repositories\File\AirportRepository;
use App\Repositories\Interfaces\AirportInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Используем синглтон чтобы каждый раз не создовать место в памяти для данных
        $this->app->bind(AirportInterface::class, AirportRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
