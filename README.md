# Projet d'intégration: Generation Connect

<img src="https://archive.y-parc.ch/uploads/pics/20151121_image_event_po-heig-vd.png" alt="drawing" width="200px"/>
<img src="http://tv.comem.ch/yverdon/img/logo/logoComem.png" alt="drawing" width="200px"/>

## Technologies utilisées
* PHP
* MySQL
* Laravel
* APIs Google

## Librairies utilisée:
* Bouncer: https://github.com/JosephSilber/bouncer
* CORS Middleware for Laravel 5: https://github.com/barryvdh/laravel-cors
* Laravel Phone: https://github.com/Propaganistas/Laravel-Phone
* Intervention Validation Class: https://github.com/Intervention/validation
* Collection of Google Maps API Web Services for Laravel 5: https://github.com/alexpechkarev/google-maps

## Base de données

* Codage: UTF8_MB4_General_CI
* Moteur: MyISAM

## Configuration logiciel requise
Pour fonctionner correctement, le projet a besoin que les ressources ou logiciels  suivants soient présents et à jour.
APACHE
PHP 7
MySQL
Composer
Git

## Installation

Dans le dossier ou le projet doit être installé, lancer les commandes suivantes :

`git clone https://github.com/gabriel-lopez/ProjWeb-Back.git`  
`composer install `

Modifier le ficnier `.env`  pour refléter la configuration de votre base de données.
Par exemple : 


`DB_CONNECTION=mysql `  
`DB_HOST=127.0.0.1`  
`DB_PORT=8889`  
`DB_DATABASE=projetweb`  
`DB_USERNAME=root`  
`DB_PASSWORD=root`  

Régler également les paramètres du SMTP dans le fichier '.env' pour que les fonctionalités impliquant des e-mails fonctionnent correctement

Il faut ensuite générer la clé d'APP  
`php artisan key:generate`  

Puis peupler la base de données avec les données de test.  
`php artisan migrate:refresh --seed`