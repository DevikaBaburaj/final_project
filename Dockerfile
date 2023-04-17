FROM php:7.0-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy source files
COPY src/ /var/www/html

# Set environment variables for RDS database connection
ENV RDS_HOSTNAME=test-wp.ca93bvqqvvwr.us-east-1.rds.amazonaws.com
ENV RDS_USERNAME=admin
ENV RDS_PASSWORD=admin123
ENV RDS_DB_NAME=contact_form

# Expose port 80
EXPOSE 80