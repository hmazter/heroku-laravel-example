release: php artisan heroku:release
web: vendor/bin/heroku-php-nginx -C nginx.conf public/
worker: php artisan queue:work