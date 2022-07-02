FROM php:8.1-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo_mysql
RUN install-php-extensions mysqli
RUN install-php-extensions redis
RUN install-php-extensions zip
RUN install-php-extensions intl
RUN install-php-extensions gd
RUN install-php-extensions xdebug
RUN install-php-extensions @composer