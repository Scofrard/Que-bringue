# Que-bringue

Bienvenue dans le projet **Que-bringue** ! L’application simple et rapide pour vos réservations de bringues près de chez vous 

Pour exécuter ce porjet en local, suivez les instructions ci-dessous afin de configurer votre environnement

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **PHP 8.2** ou supérieur
- **Composer** (pour gérer les dépendances PHP)
- **Herd** (fortement recommandé, mais vous pouvez aussi utiliser XAMPP ou MAMP)
- **Git** (pour cloner le dépôt)
- Une **clé API Google Maps** (obligatoire pour faire fonctionner les cartes interactives)
- Un **navigateur web** pour accéder à l'application en local

## Étapes d'installation

### 1. Cloner le dépôt

Tout d'abord, clonez le projet à partir de GitHub : 

git clone https://github.com/Scofrard/Que-bringue.git

### 2. Accéder au projet

cd : Que-bringue

### 3. Installer les dépendances via votre terminal

composer install

### 4. Créer un fichier .env

cp .env.example .env


### 5. Configurer la base de données dasn votre fichier .env 

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=quebringue  
DB_USERNAME=root  
DB_PASSWORD=  

### 6. Ajoutez votre clé API Google Maps dans le fichier .env

GOOGLE_MAPS=VOTRE_CLE_API

### 7. Effectuer les migrations via votre terminal

php artisan migrate

### 8. Lancer l'application en démarrant le serveur

php artisan serve


### 9. Problèmes courants
### 9.1 Version PHP

PHP 8.2 ou supérieur est requis : Si vous utilisez une version de PHP inférieure à 8.2, vous pourriez rencontrer des erreurs. Assurez-vous d'installer PHP 8.2 ou une version supérieure.

Problèmes de permissions de fichiers : Si vous obtenez une erreur de permission, assurez-vous que votre utilisateur a les bonnes permissions pour les fichiers et dossiers du projet, en particulier pour le dossier storage/ et bootstrap/cache/ dans Laravel. Vous pouvez utiliser la commande suivante pour donner les bonnes permissions sur ces dossiers :

sudo chmod -R 775 storage bootstrap/cache

### 9.2 Connexion à la base de données

Problèmes de connexion à la base de données : Si vous avez des erreurs de connexion à la base de données, vérifiez que le serveur de base de données est bien démarré et que les informations de connexion dans le fichier .env sont correctes.


### 10. Recommandations
Recommandations pour l'environnement local
Bien que Herd soit fortement recommandé, vous pouvez également utiliser XAMPP ou MAMP si vous préférez. Voici quelques recommandations :

Herd : Installez Herd et suivez les instructions pour créer votre environnement local avec PHP 8.2. Il est conçu pour être facile à configurer avec des projets Laravel.
XAMPP/MAMP : Si vous utilisez XAMPP ou MAMP, assurez-vous d'installer la version de PHP 8.2. Vous pouvez configurer ces outils pour utiliser la version PHP requise et démarrer les services MySQL.

### 11. Recommandations
Pour accéder au backoffice, il est nécessaire de posséder un compte amdinistrateur. Voici les accès du compte admin :
URL de connexion : https://quebringue.be/bringeur2000/login
Adresse email : bringeur@quebringue.be
Mot de passe : h6rbR6FomvxuAKR


