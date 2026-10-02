FROM php:8.4-cli

RUN apt-get update \
    && apt-get install -y unzip \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]