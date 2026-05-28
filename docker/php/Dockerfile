FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html