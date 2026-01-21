FROM php:8.2-apache

# Enable Apache rewrite (optional)
RUN a2enmod rewrite

# Copy API code
COPY index.php /var/www/html/index.php

# Expose Apache port
EXPOSE 80
