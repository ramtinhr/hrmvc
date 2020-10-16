FROM php:7.4-fpm

COPY . /var/www

RUN docker-php-ext-install mysqli

EXPOSE 9000
CMD ["php-fpm"]
