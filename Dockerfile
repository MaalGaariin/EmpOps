# Using an official PHP image as the base image
FROM php:7.4-apache

# Installing MySQL client and other dependencies if needed
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    # Add any other dependencies here \
    && rm -rf /var/lib/apt/lists/*

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the local PHP files to the container's working directory
COPY ./www/ /var/www/html/

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Expose port 80 to the outside world
EXPOSE 80
