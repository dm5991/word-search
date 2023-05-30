# Base image
FROM php:8.0-apache

# Set the working directory
WORKDIR /var/www/html

# Update and install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Copy the Symfony application files
COPY . .

# Install Symfony dependencies
RUN composer install --no-interaction --no-scripts

# Expose port 80
EXPOSE 80

# Start the Symfony server
CMD ["symfony", "server:start", "--port=80", "--no-tls"]
