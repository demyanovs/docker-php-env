# Use official image of PHP
FROM php:7.3-fpm
# If you have any question, here a contancs
MAINTAINER codingwar.com <demyanovs@gmail.com>

# Install additional modules to PHP image
# Note that for each RUN command creates a new layer in the image, so it's recommended to merge the commands.
RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) zip iconv mbstring mysqli pdo_mysql zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Our php.ini to redefine config values
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

# PHP working dir
WORKDIR /var/www

# Run the container
CMD ["php-fpm"]