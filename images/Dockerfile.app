FROM php:7.4-fpm-alpine

WORKDIR /var/www/

# Configure PHP and install extensions
COPY --chown=www-data:www-data --chmod=544 php.ini /usr/local/etc/php/conf.d/local.ini
RUN docker-php-ext-install pdo_mysql

# Install and run Composer
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN rm composer.* /usr/local/bin/composer

# Copy application
COPY app/ app/
COPY public/ public/
RUN rm -r public/static/
RUN chown -R www-data:www-data ./
RUN chmod -R 544 ./

# Start PHP FastCGI server
EXPOSE 9000
CMD [ "php-fpm" ]
