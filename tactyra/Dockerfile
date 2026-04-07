FROM php:8.2-apache

WORKDIR /var/www/html

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl sqlite3

# Activar extensiones (sin compilar sqlite)
RUN docker-php-ext-install zip

# Activar mod_rewrite (Laravel lo necesita)
RUN a2enmod rewrite

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear base de datos SQLite
RUN mkdir -p /tmp && touch /tmp/database.sqlite

# Permisos
RUN chmod -R 777 storage bootstrap/cache

# Configurar Apache para Laravel
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Puerto
EXPOSE 10000

# Cambiar puerto Apache
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

CMD ["apache2-foreground"]