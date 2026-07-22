FROM php:8.2-cli 
RUN docker-php-ext-install pdo_mysql mbstring gd 
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer 
WORKDIR /var/www 
COPY . . 
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs 
CMD php artisan serve --host=0.0.0.0 --port=$PORT 
