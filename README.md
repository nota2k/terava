# Terava

## Récupérer le projet

```bash
git clone https://github.com/nota2k/terava.git
```

## Prérequis

### Installer Composer
Si Composer n'est pas installé, suivez les instructions sur le site officiel :  
[https://getcomposer.org/download/](https://getcomposer.org/download/)

### Installer Laravel CLI
```bash
composer global require laravel/installer
```

### NodeJS
Assurez-vous que NodeJS est installé en version 18 ou supérieure.

## Installation

1. Installez les dépendances PHP et JavaScript :
    ```bash
    composer install
    npm install && npm run build
    ```

2. Ouvrez Docker et lancez le `docker-compose` pour démarrer le serveur MySQL et PhpMyAdmin :
    ```bash
    docker compose up
    ```

3. Configurez les variables d'environnement dans le fichier `.env` pour la connexion à la base de données :
    ```
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=terava_db
    DB_USERNAME=terava
    DB_PASSWORD=terava
    ```

    > **Note :** Ces variables sont spécifiques à l'environnement local et ne sont pas incluses dans le dépôt. En production, elles sont configurées selon les informations fournies par l'hébergeur.

4. Effectuez une migration initiale pour tester la base de données avec Artisan, le CLI de Laravel :
    ```bash
    php artisan migrate
    ```

## Lancer le projet

Pour démarrer le projet, exécutez :
```bash
composer run dev
```
