FROM php:8.1-fpm

ARG WORK_DIR
ARG XDEBUG_MODE
ARG XDEBUG_CLIENT_HOST
ARG XDEBUG_IDKEY
ARG XDEBUG_CLIENT_PORT

ENV WORK_DIR=$WORK_DIR
ENV XDEBUG_MODE=$XDEBUG_MODE
ENV XDEBUG_CLIENT_HOST=$XDEBUG_CLIENT_HOST
ENV XDEBUG_IDKEY=$XDEBUG_IDKEY
ENV XDEBUG_CLIENT_PORT=$XDEBUG_CLIENT_PORT

# Set timezone
RUN echo "UTC" > /etc/timezone

# Install dependencies
RUN apt-get update && apt-get install -y \
    nano \
    zip \
    unzip \
    curl \
    procps \
    htop

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy confjgurations files
COPY php/conf.d/php.ini $PHP_INI_DIR/
COPY php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/

# Set configuration for xdebug
RUN sed -i -e 's/xdebug.client_host=host.docker.internal/xdebug.client_host='"${XDEBUG_CLIENT_HOST}"'/g' $PHP_INI_DIR/conf.d/xdebug.ini
RUN sed -i -e 's/xdebug.client_port=9003/xdebug.client_port='"${XDEBUG_CLIENT_PORT}"'/g' $PHP_INI_DIR/conf.d/xdebug.ini
RUN sed -i -e 's/xdebug.idekey=docker/xdebug.idekey='"${XDEBUG_IDKEY}"'/g' $PHP_INI_DIR/conf.d/xdebug.ini

# Install and enable pecl php extentions
RUN pecl install xdebug redis
RUN docker-php-ext-enable xdebug redis

# Install php extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR "${WORK_DIR}"