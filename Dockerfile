FROM php:7.4-fpm-alpine

RUN docker-php-ext-install -j $(nproc) mysqli pdo_mysql

RUN apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS

RUN pecl install redis \
  && docker-php-ext-enable redis

# RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug

RUN apk del .phpize-deps

# RUN docker-php-ext-enable opcache 

ADD custom.ini /usr/local/etc/php/conf.d/custom.ini