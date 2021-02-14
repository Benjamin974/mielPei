### Mise en ligne heroku

CREER UN PROCFILE ET Y METTRE : 
web: vendor/bin/heroku-php-apache2 public/

## Ligne de commande 

- git init
- git add . 
- git commit -m "commit"
- heroku create
- git push heroku master
- heroku config:add APP_NAME=
- heroku config:add APP_ENV=production
- heroku config:add APP_KEY=

## Dans heroku

* Cliquez sur Resources -> dans 'add-ons' taper 'post' et choississez :
- heroku postgres

## Ligne de commande 
- heroku pg:credentials:url

Prendre les infos et remplir : 

- heroku config:add DB_CONNECTION=pgsql
- heroku config:add DB_HOST=
- heroku config:add DB_HOST=
- heroku config:add DB_DATABASE=
- heroku config:add DB_USERNAME=
- heroku config:add DB_PASSWORD=

-> composer.json : rajouter dans la parti scripts: 
"post-install-cmd": [ 
            "php artisan clear-compiled",
            "chmod -R 777 storage", 
            "php artisan passport:keys"
        ],

- git add .
- git commit -m 'commit' 
- git push heroku master
- heroku run php artisan migrate:refresh --seed 


LANCER https://secret-caverns-39341.herokuapp.com/