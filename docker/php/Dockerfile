# ./docker/php/Dockerfile

    FROM composer:latest AS composer

    FROM php:7.4-fpm

    RUN docker-php-ext-install pdo_mysql

    RUN pecl install apcu

    RUN apt-get update && \
    apt-get install -y \
    libzip-dev

    RUN docker-php-ext-install zip
    RUN docker-php-ext-enable apcu
    

    WORKDIR /usr/src/app

    COPY --chown=1000:1000 apps/symfony-app /usr/src/app

#    RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    COPY --from=composer /usr/bin/composer /usr/bin/composer
#   RUN composer install --no-scripts --prefer-dist \
#      && rm -rf "$(composer config cache-dir)" "$(composer config data-dir)"
    RUN composer install