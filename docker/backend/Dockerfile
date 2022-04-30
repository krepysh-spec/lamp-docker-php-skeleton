FROM php:8.1-fpm

# Set timezone
RUN echo "UTC" > /etc/timezone

# Install dependencies
RUN apt-get update && apt-get install -y \
    nano \
    zip \
    unzip \
    curl \
    supervisor \
    cron \
    procps \
    htop

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy confjgurations files
COPY php/conf.d/php.ini $PHP_INI_DIR/
COPY php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/
COPY supervisor/supervisord.conf /etc/supervisor
COPY supervisor/conf.d/* /etc/supervisor/conf.d

COPY cron/crontab /etc/cron.d/crontab
RUN chmod 0644 /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab

RUN mkdir -p /var/log/cron

# Install and enable pecl php extentions
RUN pecl install xdebug redis
RUN docker-php-ext-enable xdebug redis

# Install php extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR "/var/www/backend"

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]