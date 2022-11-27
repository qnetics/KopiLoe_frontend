# setting nginx for deploy frontend service
FROM nginx:1.22.1

COPY nginx.conf /etc/nginx/conf.d/default.conf

# setting frontend service deployment
FROM php:7.4-fpm-alpine

WORKDIR /opt/kopiloe_frontend_service

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

EXPOSE 80
RUN composer install
