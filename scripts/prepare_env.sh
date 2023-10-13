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

php artisan key:generate
php artisan migrate
php artisan db:seed
#/bin/fix_permissions.sh
