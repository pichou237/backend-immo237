# Utilise l'image officielle PHP 8.2 avec Apache préinstallé
FROM php:8.2-apache

# Met à jour les paquets et installe les dépendances système nécessaires pour Laravel et Composer
RUN apt-get update && apt-get install -y \
    git \            # Pour récupérer certains paquets via git
    unzip \          # Pour décompresser les archives
    zip \            # Utilisé par certaines dépendances PHP
    libzip-dev \     # Bibliothèque nécessaire pour l'extension zip de PHP
    && docker-php-ext-install pdo pdo_mysql zip \  # Installe les extensions PHP nécessaires
    && rm -rf /var/lib/apt/lists/*                 # Nettoie le cache des paquets pour réduire la taille de l'image

# Copie l'exécutable composer depuis l'image officielle composer vers notre image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie tous les fichiers de l'application dans le dossier racine Apache
COPY . /var/www/html

# Prépare un dossier pour le cache de Composer avec les bonnes permissions
RUN mkdir -p /root/.composer && chown -R www-data:www-data /root/.composer

# Définit le dossier de travail pour les commandes suivantes
WORKDIR /var/www/html

# Installe les dépendances PHP de Laravel sans les dépendances de développement et optimise l'autoload
RUN composer install --no-dev --optimize-autoloader

# Génère la clé d'application Laravel nécessaire pour sécuriser les sessions et autres fonctionnalités
RUN php artisan key:generate

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
CMD ["apache2-foreground"]
