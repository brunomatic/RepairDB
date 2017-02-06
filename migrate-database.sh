#!/bin/bash
set -e 

echo "Migrating database 'php artisan migrate --force'..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force