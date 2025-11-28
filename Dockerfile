FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy example env if not present
RUN if [ ! -f .env ]; then cp .env.example .env; fi

 
# Create SQLite database file if it doesn't exist
RUN touch database/database.sqlite
RUN chmod -R 777 database

# Laravel setup
RUN php artisan migrate --force --no-interaction || exit 0
RUN php artisan db:seed --force || exit 0
RUN php artisan key:generate --force
RUN php artisan config:cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
