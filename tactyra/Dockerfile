FROM php:8.2-cli

WORKDIR /app

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl sqlite3

# Extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_sqlite zip

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

# Optimizar Laravel
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Puerto
EXPOSE 10000

# Arranque
CMD php artisan serve --host=0.0.0.0 --port=10000