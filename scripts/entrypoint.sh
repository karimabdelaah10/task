#!/bin/sh

cd /var/www

echo "in entrypoint.sh"

php-fpm

chmod -R 775 /var/www/storage

php artisan config:cache
php artisan cache:clear
/usr/bin/supervisord -c /etc/supervisord.conf

