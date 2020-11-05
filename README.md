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
|   ├── framework/
|   |   └── view.class.php
|   ├── model/
|   |   ├── DAO.class.php
|   |   ├── Annonce.class.php
|   |   ├── Utilisateur.class.php
|   |   └── Reponse.class.php
|   ├── test/
|   |   └── test.php
|   └── view/
|       └── design/
|           └── style.css
├── conception/
|   └── PHP/
|       └── DC.drawio
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
**model/** contient classe php.<br>
**test/** contient tout les tests.<br>
**view/** contient tout le visuel.<br>

### conception
Dossier de conseption pour les diagramme UML par example.

PHP :
Il reste la classe Reponse à faire


### Base de données
Utilisateur(id, nom, prenom, password, adresse)<br>
Annonce(id, nom, description, adresse, #id_createur) id_createur clef étrangère de Utilisateur<br>
Reponse(#id_annonce, #id_repondeur, chat) id_annonce clef étrangère de Annonce, id_repondeur clef étrangère de Utilisateur<br>
