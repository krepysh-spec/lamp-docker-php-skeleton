FROM php:8.1

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY supervisord.conf /etc/supervisor
COPY conf.d/* /etc/supervisor/conf.d

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]