#!/bin/bash

# Install dependencies
npm install
composer install

# Build assets for production
npm run build

# Start the Laravel server
php artisan serve --host 0.0.0.0 --port 8080
