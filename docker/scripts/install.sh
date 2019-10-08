#!/usr/bin/env bash
#
# Installation script.
# Run it once on project.
#
cd ../frontend
npm install vue
#npm install -g @vue/cli
#npm install -g @vue/cli-service-global

cd ../backend
composer install
