ARG PHP_VERSION=8.1

FROM php:${PHP_VERSION}-fpm as fpm

RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /code

USER www-data

FROM php:${PHP_VERSION}-cli as cli
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_HOME=/code/.composer

RUN apt-get update && apt-get install -y unzip zip && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /code

USER www-data
