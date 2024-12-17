FROM php:8.3-fpm

# Install packages
RUN apt-get update \
 && apt-get -y install git zip unzip

# Install extensions
RUN apt-get -y install libzip-dev \
 && docker-php-ext-install zip

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt-get install -y nodejs

# Install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# Set the working directory inside the container
WORKDIR /var/www/html