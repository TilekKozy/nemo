<?php

namespace App\Repositories\Interfaces;

use App\Data\Airports\SearchData;
use App\Repositories\File\AirportRepository;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AirportInterfaceTest extends TestCase
{

    public function testRepositoryBinding(): void
    {
        // Создаем экземпляр приложения
        $app = $this->createApplication();

        // Проверяем, что реализация интерфейса AirportInterface забиндена в контейнере приложения
        $this->assertInstanceOf(
            AirportRepository::class,
            $app->make(AirportInterface::class)
        );
    }

    public function testGetByNameReturnsCollection(): void
    {
        $repository = $this->createMock(AirportInterface::class);

        $repository->expects($this->once())
            ->method('getByName')
            ->with($this->isInstanceOf(SearchData::class))
            ->willReturn($this->createMock(Collection::class));

        $result = $repository->getByName($this->createMock(SearchData::class));
        $this->assertInstanceOf(Collection::class, $result);
    }

}
