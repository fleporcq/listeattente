FROM php:7.1-fpm

# libicu is for intl php extension
RUN apt-get update \
    && apt-get install -y \
        libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# OPCache activation
RUN docker-php-ext-enable opcache

# pdo, pdo_mysql, intl, mbstring
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    intl \
    mbstring

#Problème de timezone
ENV TZ Europe/Paris
RUN cp /usr/share/zoneinfo/Europe/Paris /etc/localtime

WORKDIR /var/www/html

USER www-data

