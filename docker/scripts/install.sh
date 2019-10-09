#!/usr/bin/env bash
#
# Installation script.
# Run it once on project.
#
cd project
# Install composer dependencies.
composer install
# Install npm dependencies.
npm install
# Install migrations.
php artisan migrate

