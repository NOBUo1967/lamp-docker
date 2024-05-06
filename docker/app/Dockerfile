FROM php:7.2.19-apache
RUN docker-php-ext-install pdo_mysql mbstring

COPY ./config/php/php.ini /usr/local/etc/php/