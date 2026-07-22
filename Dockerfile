FROM richarvey/nginx-php-fpm:latest 
COPY . /var/www/html 
ENV APP_ENV=production 
ENV DB_CONNECTION=sqlite 
