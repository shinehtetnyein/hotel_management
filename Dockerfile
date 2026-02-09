FROM php:8.4-cli

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    bcmath

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install && npm run build

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Expose port
EXPOSE 8080

# Start app
CMD php artisan serve --host=0.0.0.0 --port=8080
