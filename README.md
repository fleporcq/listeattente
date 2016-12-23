# Liste d'attente

## Déploiement

```bash
# Installation des dépendances
composer install

# Création de la base de données
php bin/console doctrine:database:create

# Création du schéma
php bin/console doctrine:migrations:migrate

# Installation des assets
php bin/console assets:install
```

## Installation de l'environnement Docker

```bash
# Démarrage des services
docker-compose up -d

# Applications des permissions
HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/DoctrineMigrations
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/DoctrineMigrations
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX web/bundles
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX web/bundles
```

### Exécution des commandes php et composer avec docker-compose

```bash
# php
docker-compose exec php php bin/console [cmd]

# composer
docker-compose run --rm composer [cmd]
```

### Services disponibles

- L'application à http://localhost:81
- phpMyAdmin à http://localhost:82