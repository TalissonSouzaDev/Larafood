FROM php:8.1-fpm-alpine

# args do docker compose
ARG user
ARG uid

#install ssysem dependecies

RUN apt-get update && apt-get upgrade -y \
    php:8.1-git \ 
    php:8.1-curl \ 
    php:8.1-libpng-dev \ 
    php:8.1-libonig-dev \
    php:8.1-libxml2-dev  \
    php:8.1-zip \
    php:8.1-unzip

#clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install extension php
RUN docker-php-ext-install php:8.1-pdo_mysql php:8.1-mbstring php:8.1-exif php:8.1-pcntl php:8.1-bcmath php:8.1-gd php:8.1-sockets

COPY  --from=composer:lastest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -P /home/$user/.composer && \ chown -R $user:$user /home/$user

WORKDIR /var/www
USER $user