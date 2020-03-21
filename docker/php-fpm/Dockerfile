FROM php:7.4-fpm-alpine3.10

ARG USERID=${USERID}
ARG GROUPID=${GROUPID}

RUN apk add --no-cache git shadow mysql-client \
        php7-mysqlnd php7-pdo_mysql php7-gd php7-mbstring php7-intl \
        php7-xsl php7-zip php7-curl zip unzip \
    && docker-php-ext-install bcmath sockets mysqli pdo_mysql pcntl opcache

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del -f .build-deps

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN usermod -u ${USERID} www-data \
    && groupmod -g ${GROUPID} www-data \
    && mkdir /app \
    && chown www-data:www-data /app \
    && chown www-data:www-data /run

WORKDIR "/app"
USER www-data

COPY ./*.json ./*.lock /app/
RUN composer check-platform-reqs \
    && composer install \
        --prefer-dist \
        --no-scripts \
        --optimize-autoloader \
        --no-interaction \
        --no-dev \
    && composer clear-cache
COPY ./ /app/

RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;")
