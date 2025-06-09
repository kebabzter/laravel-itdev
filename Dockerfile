FROM php:8.3-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip unzip curl libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN service apache2 restart


# Copy Laravel app
COPY . .

# Install PHP dependencies
RUN composer install

# Permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80
