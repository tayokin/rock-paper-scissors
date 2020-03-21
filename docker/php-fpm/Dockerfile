FROM php:7.4-fpm-alpine3.10

RUN apk add --no-cache git mysql-client \
        php7-mysqlnd php7-pdo_mysql php7-gd php7-mbstring php7-intl \
        php7-xsl php7-zip php7-curl zip unzip \
        # @todo remove before end
        php7-phpdbg php7-xdebug \
    && docker-php-ext-install bcmath sockets mysqli pdo_mysql pcntl opcache

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del -f .build-deps

# @todo remove before end
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
#RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

USER www-data

RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;")
