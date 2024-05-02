FROM php:8.2-fpm

# Копирование composer.lock и composer.json
COPY ../../composer.lock composer.json /var/www/

# Установка рабочей директории
WORKDIR /var/www

# Установка зависимостей
RUN apt-get update && apt-get install -y git

# Очистка кэша
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка расширений
RUN apt-get update \
    && apt-get install -y iputils-ping wget git unzip libpq-dev librabbitmq-dev libicu-dev libpng-dev libzip-dev libjpeg-dev libfreetype6-dev libwebp-dev

RUN docker-php-ext-install pdo_mysql zip gd bcmath


# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Добавление пользователя для приложения Laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Копирование содержимого текущей директории в контейнер
COPY ../.. /var/www

# Установка прав на директорию
COPY --chown=www:www ../.. /var/www

# Смена текущего пользователя на www
USER www

# Открытие порта 9000 и запуск сервера php-fpm
EXPOSE 9000
CMD ["php-fpm"]
