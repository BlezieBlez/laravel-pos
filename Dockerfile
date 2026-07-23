FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (including pdo_sqlite)
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Install Composer packages
RUN composer install --no-dev --optimize-autoloader

# Ensure database directory and file exist
RUN mkdir -p database && touch database/database.sqlite

# Set storage and database permissions
RUN chmod -R 777 storage bootstrap/cache database

# Create database if missing, run migrations, and start server
CMD touch database/database.sqlite && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT