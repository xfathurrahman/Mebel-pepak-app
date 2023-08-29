#!/bin/bash

set -e

#check if vendor directory exists
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

echo ""

#check if .env file exists
if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

echo ""

# check if APP_KEY is set
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY is not set, generating..."
    php artisan key:generate --ansi
else
    echo "APP_KEY is set", skipping generation...""
fi

echo ""

# clear cache
php artisan config:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize:clear

#check if storage directory already linked
if [ ! -d "public/storage" ]; then
    php artisan storage:link --ansi
fi

php-fpm -D
nginx -g "daemon off;"
