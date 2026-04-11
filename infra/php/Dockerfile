FROM php:8.2-fpm

COPY ./infra/php/php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    ca-certificates \
    net-tools \
    libgmp-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    make \
    python3 \
    build-essential \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install gmp \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy app code to /var/www/html
COPY ./php /var/www/html

WORKDIR /var/www/html

EXPOSE 8000

# Fix git ownership warning
RUN git config --global --add safe.directory /var/www/html

# Install dependencies
RUN composer install --ignore-platform-reqs

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]