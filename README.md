# Projet M3301 (dépôt de rendu)

Ce dépôt est le dépôt de référence de votre équipe pour le module M3301.
Vos rendus se feront en déposant tous les fichiers pertinents pour chaque itération ici.

Ce dépôt organisé comme suit :
```console
rendus
├── docs/
│   └── README.md
├── rapport/
|   ├── images/
|   |   ├── maquette-accueil.png
|   |   ├── maquette-recherche.png
|   |   ├── maquette-criticite.png
|   |   └── tableau-ergo.png
|   └── rapport.tex
├── art-entraide/
|   ├── controler/
|   |   └── start.ctrl.php
|   ├── data/
|   |   └── create.sql
|   |   └── drop.sql
|   |   └── insert.sql
|   |   └── reset.sql
|   ├── framework/
|   |   └── view.class.php
|   ├── model/
|   |   ├── DAO.class.php
|   |   ├── Utilisateur.class.php
|   |   ├── Categorie.class.php
|   |   ├── Annonce.class.php
|   |   ├── Message.class.php
|   |   └── Reponse.class.php
|   ├── test/
|   |   ├── Utilisateur.test.php
|   |   ├── Categorie.test.php
|   |   ├── Annonce.test.php
|   |   ├── Message.test.php
|   |   └── Reponse.test.php
|   └── view/
|       ├── design/
|       |   ├── design.txt
|       |   ├── logo.png
|       |   ├── logo2.png
|       |   └── style.css
|       ├── accueil.view.php
|       ├── creationAnnonce.view.php
|       ├── footer.php
|       ├── header.php
|       └── inscription.view.php
├── conception/
|   └── PHP/
|       ├── DC.png
|       └── DC.drawio
|   └── BDD/
|       ├── bdd.tex
|       ├── Schema-relationnel-BDD.png
├── art-entraide/
├── .gitattributes
├── .gitignore
├── .gitlab
│   └── …
└── README.md
```

**Vous déposerez vos rendus textuel au format `pdf` dans le dossier `docs/`.<br>
Tout document textuel dans un autre format ne sera pas considéré.**


### Fichiers particuliers

Les deux fichiers `.gitattributes` et `.gitignore` sont liés à la configuration de git.<br>
Vous pouvez modifier le fichier `.gitignore` en fonction des technologies utilisées et de l'organisation du dépôt choisie.<br>
Il est vivement déconseillé de modifier le fichier `.gitattributes`.

Le dossier `.gitlab` contient la configuration spécifique à GitLab.

### art-entraide

**art-entraide** contient le code.<br>
**controler/** contient les contrôleurs en php.<br>
**data/** contient les fichiers de la base de données.<br>
**framework/** contient la vue général.<br>
**model/** contient les classes PHP.<br>
**test/** contient tout les tests.<br>
**view/** contient tout le visuel.<br>

### conception
Dossier de conception pour les diagramme UML par exemple.
Pour les fichier .drawio il faut les ouvrir avec draw.io (https://app.diagrams.net/), "Open from device". Un package Atom permet également de visualiser ces diagrammes.

PHP :
diagramme de classes uniquement de modèle
diagramme de classes uniquement view (option)
diagramme de sequence
=> diagrammes sert a communiquer !
Il reste la classe Reponse à faire pour l'iteration 3


### .tex
Voir [le README dédié](https://gricad-gitlab.univ-grenoble-alpes.fr/iut2-info/m3301/2020-s3/team-9/rendus/-/blob/master/rapport/README.md) dans rapport/.

### Schéma base de données
**Utilisateur(<u>id</u>, nom, prenom, reputation, certif, email, password, adresse)**

**Categorie(<u>id</u>, nom)**

**Annonce(<u>id</u>, nom, description, adresse, date_creation, date_service, #id_createur, #id_categorie)**
id_createur clé étrangère de Utilisateur
id_categorie clé étrangère de Categorie

**Message(<u>id</u>, contenue, date_message, #id_auteur)**
id_auteur clé 2trangère de Utilisateur

**Reponse(<u>#id_annonce, #id_repondeur, #id_message</u>)**
id_annonce clé étrangère de Annonce
id_repondeur clé étrangère de Utilisateur
id_message clé étrangère de Message
