FROM php:8.5-apache

ENV APP_ENV=production \
    APP_DEBUG=false \
    PORT=10000 \
    SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    LOG_CHANNEL=stderr

RUN apt-get update \
    && apt-get install -y --no-install-recommends unzip libonig-dev libicu-dev libzip-dev \
    && docker-php-ext-install -j"$(nproc)" mbstring intl zip pdo_mysql bcmath \
    && a2enmod rewrite setenvif \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction --prefer-dist --no-progress

COPY . .
RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && composer dump-autoload --no-dev --optimize --no-scripts \
    && php artisan package:discover --no-interaction \
    && chown -R www-data:www-data storage bootstrap/cache \
    && cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY render-apache.conf /etc/apache2/sites-available/000-default.conf
RUN printf 'Listen ${PORT}\n' > /etc/apache2/ports.conf

EXPOSE 10000
CMD ["sh", "/var/www/html/render-start.sh"]
