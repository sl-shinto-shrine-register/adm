FROM php:7.4-fpm-alpine

WORKDIR /var/www/

# Configure PHP
COPY --chown=www-data:www-data --chmod=544 php.ini /usr/local/etc/php/conf.d/local.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application
COPY app/ app/
COPY public/ public/
RUN rm -r public/static/
COPY composer.json composer.lock ./
RUN chown -R www-data:www-data ./
RUN chmod -R 544 ./

# Install
RUN composer install

# Cleanup
RUN rm composer.* /usr/local/bin/composer

# Start PHP FastCGI server
EXPOSE 9000
CMD [ "php-fpm" ]
