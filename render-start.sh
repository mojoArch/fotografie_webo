#!/bin/sh
set -eu

if [ -z "${APP_KEY:-}" ]; then
    echo 'APP_KEY ontbreekt. Voeg een Laravel-applicatiesleutel toe bij Render Environment.' >&2
    exit 1
fi

php artisan config:cache --no-interaction
php artisan view:cache --no-interaction
chown -R www-data:www-data storage bootstrap/cache

exec apache2-foreground
