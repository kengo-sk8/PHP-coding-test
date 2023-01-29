FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    vim \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# xdebugの処理追加
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
