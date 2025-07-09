# Choisir l'image PHP officielle avec extensions nécessaires
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Copier les fichiers de l'application
COPY . /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Changer le dossier public pour Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Configuration Apache pour adapter le dossier public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Donner les bonnes permissions
RUN chown -R www-data:www-data /var/www/html/storage

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer Apache
CMD ["apache2-foreground"]
