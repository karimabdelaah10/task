#!/bin/sh

# shellcheck disable=SC2164
echo "in prepare_env.sh"

composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

FILE=./.env

if [ -f "$FILE" ]; then
  echo "$FILE exists."
else
  echo "$FILE does not exist."
  cp .env.example .env
  echo "$FILE created."

fi

#npm install -g npm@9.8.1
#npm i
#npm run build
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed --class=SuperAdminSeeder
php artisan jwt:secret
#/bin/fix_permissions.sh
