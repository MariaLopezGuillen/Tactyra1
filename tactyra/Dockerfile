FROM php:8.2-cli

WORKDIR /app

# Instalar dependencias completas (IMPORTANTE pkg-config)
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl sqlite3 libsqlite3-dev pkg-config libonig-dev libxml2-dev

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_sqlite zip mbstring bcmath

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear SQLite
RUN mkdir -p /tmp && touch /tmp/database.sqlite

# Permisos
RUN chmod -R 777 storage bootstrap/cache

# Optimización
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Puerto
EXPOSE 10000

# Start
CMD php artisan serve --host=0.0.0.0 --port=10000