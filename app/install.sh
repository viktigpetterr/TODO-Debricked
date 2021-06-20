#!/bin/bash

composer install
composer copy-env
yarn install
yarn run prod
php artisan config:clear && php artisan cache:clear
chmod 777 storage/ -R
