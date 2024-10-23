# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

WORKDIR /var/www/html/sdn

# Instalar las extensiones necesarias para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY . .

RUN chown -R www-data:www-data /var/www/html/sdn

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Modificar el archivo de configuración de Apache para incluir VirtualHost
RUN echo "<VirtualHost *:80> \n\
    ServerName docker.sdn \n\
    DocumentRoot /var/www/html/sdn \n\
    <Directory /var/www/html/sdn> \n\
        Options Indexes FollowSymLinks \n\
        AllowOverride All \n\
        Require all granted \n\
    </Directory> \n\
    ErrorLog ${APACHE_LOG_DIR}/error.log \n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined \n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini
COPY /db_backup/pgbackup.sql /shared_data/backup.sql

# VOLUME ["/var/www/html/sdn"]

EXPOSE 80
