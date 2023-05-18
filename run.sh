#!/bin/bash

./vendor/bin/sail up -d

# Clear caches
./vendor/bin/sail php artisan cache:clear

# Clear and cache routes
./vendor/bin/sail php artisan route:clear
./vendor/bin/sail php artisan route:cache

# Clear and cache config
./vendor/bin/sail php artisan config:clear
./vendor/bin/sail php artisan config:cache