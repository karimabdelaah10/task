#!/bin/sh

cd /var/www
echo "in fix_permissions.sh"

find /var/www -exec chown -R nobody:www-data {} \; && find /var/www  -type f -exec chmod 664 {} \; && find /var/www -type d -exec chmod 775 {} \;