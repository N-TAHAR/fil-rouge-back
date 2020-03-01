# fil-rouge-back

## Back-end du projet fil rouge du groupe 16

+ Najib TAHAR
+ Carlo BERNI

## Les technos utilisées

+ Php 
+ Symfony
+ Postgresql 

## Créer un fichier .env.local
Renseigner vos identifiants postgresql

```
DB_USER=postgre
DB_PASSWORD=password
```


## Lancer l'application

Dans la console

```
composer install

./bin/console doctrine:database:create

./bin/console doctrine:schema:create

./bin/console doctrine:fixture:load

symfony server:start
```

## Modélisation de la BDD

!Diagramme (https://i.goopics.net/1qeww.jpg)
