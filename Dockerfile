FROM php:8.5-apache
 
RUN a2enmod rewrite
 
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql mbstring zip xml gd \
    && rm -rf /var/lib/apt/lists/*
 
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
 
# Install Node.js 22.x and npm
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*
 
# Prevent ServerName warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
 
# Replace default vhost
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
 
WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data storage bootstrap/cache
