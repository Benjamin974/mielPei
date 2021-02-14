# MielPei

Miel pei est une application permettant aux apiculteurs réunionnais de vendre en ligne leur production. L'application a été réalisé avec le framework Laravel ainsi que le framework front-end vueJs (avec son matérial design - Vuetify).

<strong>VOUS TROUVEREZ LES WIREFRAMES DE L'APPLICATION DANS LE DOSSIER .docs/ QUI SE SITUE À LA RACINE DU PROJET.</strong>

## Installation du projet

- cloner le projet depuis le repos sur github : ```git clone https://github.com/Benjamin974/mielPei.git```
- Installer les dépendances de composer (LARAVEL) : ```composer install```
- Installer les dépendances de npm (VUE JS) : ```npm install```

Définissez correctement la partie base de donnée de votre fichier .env : 

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mielpei
DB_USERNAME=root
DB_PASSWORD=password
```

- Effectuer la migration de la base de donnée ainsi que ses seeders (données factices) : ```php artisan migrate:refresh --seed```
- Effectuer cette commande pour créer les clés de chiffrement nécessaires pour générer des jetons d'accès sécurisés (LARAVEL PASSPORT) : ```php artisan passport:install```
- Effectuer un build des composants vue js : ```npm run build```
- Vous pouvez désormais lancer le projet en exécutant : ```php artisan serve```

## Lien de l'application en ligne 

L'application ayant été déployé sur la plateforme HEROKU, vous pouvez accédez à l'application grâce au lien suivant : https://secret-caverns-39341.herokuapp.com/
## Les liens de connexions 

L'application qui est toujours en phase de test possède des données factice pour permettre au client de tester l'application avec les différents utilisateurs.

### Le client

Le client a la possibilité de voir les produits disponibles sur le site et de passer des commandes. Il peut aussi voir la liste des producteurs.

- email du client factice : george@client.com
- mot de passe : <strong>client</strong> 

### Le producteur

Le producteur peut ajouter, modifier ou supprimer ses produits et il peut voir l'historique de ses produits commandés.

- email du producteur factice : henry@producteur.com
- mot de passe : <strong>producteur</strong> 

### L'administrateur

L'administrateur gère les utilisateurs du site, il peut modifier le role des utilisateurs ou les suspendres.

- email de l'administrateur factice : maintenance@admin.com
- mot de passe : <strong>admin</strong> 
