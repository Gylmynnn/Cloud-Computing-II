FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y nano && \
    docker-php-ext-install mysqli && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

EXPOSE 80
