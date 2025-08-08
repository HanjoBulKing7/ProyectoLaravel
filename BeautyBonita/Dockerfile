FROM php:8.2-cli

# Instala extensiones de PHP necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo (también lo hace docker-compose)
WORKDIR /var/www/html
