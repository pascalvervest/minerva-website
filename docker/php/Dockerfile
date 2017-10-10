FROM php:7.0-fpm

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install json \

RUN useradd -ms /bin/bash vagrant

WORKDIR /var/www/html

# COPY php-fpm.conf /etc/php-fpm.conf
