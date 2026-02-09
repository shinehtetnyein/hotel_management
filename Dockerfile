FROM php:8.3-cli

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

# Copy project files
FROM php:8.3-apache

# Install system packages and node
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    nodejs \
    npm && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip bcmath

# Enable Apache rewrite
RUN a2enmod rewrite

# Ensure only one MPM is enabled (enable prefork for mod_php, disable event/worker)
RUN a2dismod mpm_event mpm_worker || true && a2enmod mpm_prefork || true

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-scripts

# Build frontend assets
RUN npm install && npm run build || true

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Expose a default port (informational)
EXPOSE 8080

# Start Apache: adjust Listen and VirtualHost to use $PORT (fallback 8080) and serve the `public` directory
CMD ["sh", "-c", "a2dismod mpm_event mpm_worker || true && a2enmod mpm_prefork || true && printf 'ServerName localhost\n' > /etc/apache2/conf-available/servername.conf && a2enconf servername || true && sed -i \"s/Listen 80/Listen ${PORT:-8080}/\" /etc/apache2/ports.conf && sed -i \"s/:80/:${PORT:-8080}/\" /etc/apache2/sites-available/000-default.conf && sed -i \"s#/var/www/html#/var/www/html/public#g\" /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf && apache2-foreground"]
