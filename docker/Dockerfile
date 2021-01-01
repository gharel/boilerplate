FROM php:7.2-fpm-alpine

# Install all dependencies.
RUN apk --no-cache update \
    && apk add ca-certificates \
    && apk add openssl \
    && apk --no-cache upgrade \
    && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
        ca-certificates \
        zlib-dev \
        libxml2-dev \
        curl \
        git \
        tzdata \
        patch \
        zip \
        nodejs \
        nodejs-npm \
        autoconf \
        automake \
        libtool \
        nasm \
        libjpeg-turbo \
        libjpeg-turbo-dev \
        libpng \
        libpng-dev \
    && pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install -j$(nproc) opcache \
    && cp /usr/share/zoneinfo/Pacific/Noumea /etc/localtime && echo "Pacific/Noumea" > /etc/timezone \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -sS http://get.sensiolabs.org/security-checker.phar > /usr/local/bin/security-checker \
    && chmod +x /usr/local/bin/security-checker \
    && mkdir /run/php \
    && echo "127.0.0.1 localhost localhost.localdomain $(hostname)" >> /etc/hosts \
    && echo "alias ll='ls -l'" > /etc/profile.d/ll.sh

# Copy configurations.
COPY php.ini /usr/local/etc/php/conf.d/php-smtp.ini
COPY php.ini /usr/local/etc/php/conf.d/50-setting.ini

# Define workdir.
WORKDIR /app

# Run php-fpm.
EXPOSE 9000
CMD ["php-fpm"]
