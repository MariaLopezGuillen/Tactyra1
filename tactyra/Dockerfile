FROM php:8.2-cli

WORKDIR /app

# Instalar dependencias del sistema (incluye SQLite dev)
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl sqlite3 libsqlite3-dev libonig-dev libxml2-dev

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_sqlite zip mbstring bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear base de datos SQLite
RUN mkdir -p /tmp && touch /tmp/database.sqlite

# Permisos necesarios
RUN chmod -R 777 storage bootstrap/cache

# Optimizar Laravel (no rompe si falla)
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Exponer puerto
EXPOSE 10000

# Arrancar Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000