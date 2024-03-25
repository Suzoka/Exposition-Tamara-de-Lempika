# Projet Exposition Tamara de Lempicka - Les années folles

## Pour installer les sites en local:

- Installez XAMPP avec au minimum les modules Apache et MySQL.

- Ouvrez votre XAMPP et activer les serveurs Apache et MySQL.

- Ouvrir le dossier `htdocs`. (Dans XAMPP qui se trouve à la racine de votre disque).

- Déposer dans celui ci le dossier `resaexpo` qui contient le code du site ainsi que le fichier de Base de Données.


## Pour installer la Base de Données en Local :

- Dans la barre d'URL de votre navigateur, tapez : [localhost/phpMyAdmin](localhost/phpMyAdmin).

- Créez une nouvelle base de donnée en cliquant sur `Nouvelle base de données`, en haut de la liste de vos bases de données, à gauche de la page.

- Cliquez sur la base de donnée que vous venez de créer.

- Allez dans l'onglet `Importer`.

- Sélectionnez le fichier `database.sql` qui se trouve dans le dossier `resaexpo`.

- Cliquez sur `Importer`, en bas de la page.

- Ouvrez les fichiers `database-sample.php`, qui se trouvent dans le dossier `script` du dossier "reservationWebsite" et dans le dossier `api`, avec un éditeur de texte quelquonque.

- Modifiez les valeurs des variables PHP avec le serveur de base de donnée (normalement localhost en local), le nom d'utilisateur phpMyAdmin, le mot de passe de l'utilisateur, et enfin le nom de la base de donnée que vous venez de créer.

- Renommez les fichiers `database-sample.php` en `database.php`.


## Aller sur le site :

- Allez à l'adresse [http://localhost/resaexpo/reservationWebsite/index.php/](http://localhost/resaexpo/reservationWebsite/index.php/) dans votre navigateur pour arriver sur le site de réservation.

- La page d'accueil du site s'affichera.

### **<span style="color: #dc3545">Warning : En utilisant le site en local, vous verez réguliérement des messages d'erreurs PHP avec certaines fonctionnalités du site. Cela est dû à l'impossibilité d'envoyer des mails depuis un serveur local. Pour éviter ces messages, il est conseillé de tester le site en ligne.</span>**

## Pour utiliser l'API :

- Envoyez des requêtes à l'adresse [http://localhost/resaexpo/api/](http://localhost/resaexpo/api/).

La documentation complète de l'API est disponible à [cette adresse (https://shrub-persimmon-7df.notion.site/API-c296db2c451c40af9a5b9e6b7f6fd049?pvs=4)](https://shrub-persimmon-7df.notion.site/API-c296db2c451c40af9a5b9e6b7f6fd049?pvs=4).

## Pour accéder au back-office buildé :

- Allez à l'adresse [http://localhost/resaexpo/backoffice/out](http://localhost/resaexpo/backoffice/out) dans votre navigateur pour arriver sur le back-office buildé.

### Pour accéder au back-office avec le code de développement:

- Ouvrez le dossier `backoffice` qui se trouve dans le dossier `resaexpo`.

- Installez npm et node.js si vous ne les avez pas déjà.

- Ouvrez un terminal dans le dossier `backoffice`.

- Tapez la commande `npm install` pour installer les dépendances.

- Tapez la commande `npm start` pour lancer le serveur.

- Allez à l'adresse [http://localhost:3000](http://localhost:3000) dans votre navigateur pour arriver sur le back-office.

### Utiliser l'API locale avec le backoffice :

- Ouvrez le dossier `backoffice` qui se trouve dans le dossier `resaexpo` avec visual studio code.

- Cliquez sur la loupe sur votre barre latérale gauche pour ouvrir la fonction de recherche.

- Tapez `https://api.sinyart.fr` dans la barre de recherche.

- Développez la flèche à gauche du champ de recherche pour ouvrir la fonction de remplacement.

- Remplacez toutes les occurences de `https://api.sinyart.fr` par `http://localhost/resaexpo/api`.

#### **<span style="color: #dc3545">Warning : Si vous faites en sorte d'utiliser l'API locale avec le backoffice, aucun mail ne sera envoyé, car l'envoie de mail n'est pas possible avec un serveur local.</span>**

## Pour accéder à l'exposition virtuelle :
//TODO : Ajouter les instructions pour accéder à l'exposition virtuelle.