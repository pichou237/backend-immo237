# Utilise l'image officielle PHP 8.2 avec Apache préinstallé
FROM php:8.2-apache

# Met à jour les paquets et installe les dépendances système nécessaires pour Laravel et Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpq-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql zip && \
    rm -rf /var/lib/apt/lists/*


# Copie l'exécutable composer depuis l'image officielle composer vers notre image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie tous les fichiers de l'application dans le dossier racine Apache
COPY . /var/www/html

# Prépare un dossier pour le cache de Composer avec les bonnes permissions
RUN mkdir -p /root/.composer && chown -R www-data:www-data /root/.composer

# Définit le dossier de travail pour les commandes suivantes
WORKDIR /var/www/html

# Installer les dépendances Composer
RUN composer install 

# Copier le .env.example en .env pour permettre à Laravel de fonctionner
# Copie le .env.example si pas déjà en place
RUN if [ ! -f .env ]; then cp .env.example .env; fi
# Générer la clé d'application Laravel
RUN php artisan key:generate

# Générer la documentation Swagger
RUN php artisan l5-swagger:generate

# Définit le dossier 'public' comme racine du serveur Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Modifie les configurations Apache pour utiliser le dossier 'public' comme racine web
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Active le module Apache mod_rewrite nécessaire à Laravel pour la gestion des URL
RUN a2enmod rewrite

# Donne les bonnes permissions aux dossiers 'storage' et 'bootstrap/cache' (nécessaire pour le fonctionnement Laravel)
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose le port 80 (port par défaut d'Apache)
EXPOSE 80

# Commande pour lancer Apache en mode premier plan (processus principal du conteneur)
# 👉 Lancement Apache + commandes Laravel au démarrage du conteneur
CMD php artisan config:clear && \
    php artisan key:generate && \
    php artisan migrate --force && \
    php artisan l5-swagger:generate && \
    apache2-foreground