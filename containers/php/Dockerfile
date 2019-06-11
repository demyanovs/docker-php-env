# Use official image of PHP
FROM php:7.3-fpm

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
        nano \
        vim \
    && docker-php-ext-install -j$(nproc) zip pcntl mysqli pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN pecl channel-update pecl.php.net

RUN pecl install -o -f redis uopz \
    &&  rm -rf /tmp/pear

ENV COMPOSER_ALLOW_SUPERUSER 1

# PHP working dir
WORKDIR /var/www/hello.dev

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer

# Our php.ini to redefine config values
#ADD my.ini /usr/local/etc/php/conf.d/40-custom.ini

ADD .my.cnf /var/www/hello.dev/.my.cnf

# Run the container
CMD ["php-fpm"]