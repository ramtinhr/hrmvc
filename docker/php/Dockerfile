FROM php:7.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
        software-properties-common \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libjpeg-dev \
        libpng-dev \
        libpq-dev \
        libicu-dev \
        libzip-dev \
        zip \
        libmosquitto-dev \
        git \
        build-essential \
        apt-transport-https \
        curl \
        ca-certificates \
        gnupg2
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
#composer dump-autoload

# Install extension
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

COPY . /var/www

EXPOSE 9000
CMD ["php-fpm"]
