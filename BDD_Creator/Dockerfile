# Use an official PHP runtime as a parent image
FROM php:8.3-apache

# Set the working directory in the container to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install any needed packages specified in composer.json
RUN composer install --no-dev

# Install the PDO MySQL extension
# old version
# RUN docker-php-ext-install pdo_mysql && apt-get update

# new version a tester apre manger
# RUN apt-get update && apt-get install -y mysql-client

# mix des 2 version
RUN apt-get update && apt-get install -y default-mysql-client \
    && docker-php-ext-install pdo_mysql


# RUN apt-get update && apt-get install -y mysql-client

# Install default-mysql-client (dernier ajout a del si sa chie)
# RUN apt-get install -y default-mysql-client

# Expose port 80 to the outside world
EXPOSE 80

# Run the built-in web server
CMD ["apache2-foreground"]
