#!/bin/bash

# Turn on maintenance mode
# ./vendor/bin/sail php artisan down

# Pull the latest changes from the git repository
git pull

# Install/update composer dependecies
./vendor/bin/sail exec -it laravel.test sh -c "composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev"

# Clear caches
./vendor/bin/sail php artisan cache:clear

# Clear and cache routes
./vendor/bin/sail php artisan route:clear
./vendor/bin/sail php artisan route:cache

# Clear and cache config
./vendor/bin/sail php artisan config:clear
./vendor/bin/sail php artisan config:cache

# Turn on queues
# ./vendor/bin/sail php artisan queue:work &

# Turn on horizon
# ./vendor/bin/sail php artisan horizon &

# Turn off maintenance mode
# ./vendor/bin/sail php artisan up
