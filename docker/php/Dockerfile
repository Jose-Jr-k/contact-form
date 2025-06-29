FROM php:8.0-fpm

RUN apt update && apt install -y \
    git unzip zip curl libzip-dev \
    && docker-php-ext-install pdo_mysql zip

COPY php.ini /usr/local/etc/php/
WORKDIR /var/www