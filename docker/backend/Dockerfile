FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    nano \
    zip \
    unzip \
    curl \
    supervisor \
    cron

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy php confjgurations files
COPY php/conf.d/php.ini $PHP_INI_DIR/
COPY php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/

# Install and enable pecl php extentions
RUN pecl install xdebug redis
RUN docker-php-ext-enable xdebug redis

# Install php extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR "/var/www/backend"