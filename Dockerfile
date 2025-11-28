# ---------------------------
# 1. Base PHP Image with Composer
# ---------------------------
FROM php:8.2-fpm

# ---------------------------
# 2. Install system dependencies
# ---------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    zip \
    supervisor \
    nginx \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip xml

# ---------------------------
# 3. Set working directory
# ---------------------------
WORKDIR /var/www/html

# ---------------------------
# 4. Copy project files
# ---------------------------
COPY . /var/www/html

# ---------------------------
# 5. Install PHP dependencies
# ---------------------------
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# ---------------------------
# 6. Install Node.js dependencies & build assets
# ---------------------------
RUN npm install
RUN npm run build

# ---------------------------
# 7. Set permissions
# ---------------------------
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage
RUN chmod -R 775 /var/www/html/bootstrap/cache

# ---------------------------
# 8. Copy Nginx configuration
# ---------------------------
COPY ./docker/nginx/default.conf /etc/nginx/sites-available/default

# ---------------------------
# 9. Expose port
# ---------------------------
EXPOSE 80

# ---------------------------
# 10. Start services
# ---------------------------
CMD ["sh", "-c", "php artisan migrate --force && php-fpm -D && nginx -g 'daemon off;'"]
