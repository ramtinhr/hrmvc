FROM php:7.4-fpm

COPY . /var/www

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli

EXPOSE 9000
CMD ["php-fpm"]
