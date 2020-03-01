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

![Diagramme](https://i.goopics.net/1qeww.jpg)

Dans le choix de notre base de données, nous nous sommes beaucoup concerté sur la notion de récuperer nos api.

Nous avons une table mère, donc la District qui va récupérer les arrondissements de chaque api avec le nombre de :
+ wifi
+ vélib
+ event
+ espace vert

Nous aurons donc pour le 1er arrondissement de Paris, 20 espaces vert, 3 bornes vélib, 2 wifi et 30 event par exemple.

Notre algorythme va calculer une moyenne suivant la superficie de l'arrondissement et le quota de ces derniers.

### Relation

Prenons exemple par rapport à la table district et wifi !
District -> Wifi : c'est une relation OneToMany puisque le 1 er arrondissement peut avoir plusieurs borne wifi.
Wifi -> District : c'est une relation ManyToOne puisque plusieurs borne wifi ont une possibilité de correspondre au 1er arrondissement.

## Symfony & API :

  ### API

  Nous avons utilisé API PLatform pour la documentation de notre API.
  
  La route GetID de la table District est ouverte car nous avons fait le choix de configurer que celle ci dans les entitées via :

    * @ApiResource(
    *  collectionOperations={"get"},
    *  itemOperations={"get"}
    * )

  c'est via cette route que nous récupérons nos données.


  ### Documentation

  En arrivant sur le localhost de notre API, notre swagger sera disponible en faisant /api

  Vous aurez donc accés à notre route ID et pourrez tester en mettant par exemple "2" dans l'ID ce qui correspond au 2eme arrondissement de Paris.

  Les données récupérées seront tous les events, wifis, velib, espaces vert de cet arrondissement en format Json.





