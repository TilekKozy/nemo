#!/bin/bash

# Установка зависимостей с помощью Composer
docker run --rm -v $(pwd):/app prooph/composer:8.2 install

# Копирование файла .env.example в .env
cp .env.example .env

# Запуск контейнеров Docker
docker-compose up -d

# Генерация ключа приложения
docker-compose exec app php artisan key:generate

# Выполнение миграций и заполнение базы данных тестовыми данными
docker-compose exec app php artisan migrate

# Публикация конфигурации для l5-swagger
docker-compose exec app php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"

# Генерация документации API с помощью l5-swagger
docker-compose exec app php artisan l5-swagger:generate
