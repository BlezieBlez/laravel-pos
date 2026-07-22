FROM richarvey/nginx-php-fpm:latest 
COPY . /var/www/html 
ENV WEB_DOCUMENT_ROOT=/var/www/html/public 
ENV APP_BASE_DIR=/var/www/html 
ENV APP_ENV=production 
ENV APP_DEBUG=false 
RUN rm -f /var/www/html/index.php /var/www/html/index.html 
RUN composer install --no-dev --prefer-dist --optimize-autoloader 
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache 
