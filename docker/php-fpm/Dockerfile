FROM php:7.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        sudo \
	zip \
	unzip \
	libzip-dev \
        libfreetype6-dev \
        libssl-dev \
        libjpeg62-turbo-dev \
        libmemcached-dev \
        libmagickwand-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
    && docker-php-ext-install -j$(nproc) iconv sockets pdo_mysql mysqli pcntl intl bcmath \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) sysvsem \
    && docker-php-ext-install soap \
    && docker-php-ext-enable opcache \
    && docker-php-ext-install zip

RUN pecl install imagick \
    && docker-php-ext-enable imagick

RUN pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug

RUN apt-get install autoconf g++ make \
    && pecl install memcached \ 
    && docker-php-ext-enable memcached

RUN mkdir -p /var/log/php-fpm
RUN ln -sf /dev/stdout /var/log/php-fpm/access.log
RUN ln -sf /dev/stderr /var/log/php-fpm/error.log

RUN mkdir -p /var/log/php-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --1 --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
CMD ["php-fpm"]
