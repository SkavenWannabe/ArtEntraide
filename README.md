# Projet M3301 (dépôt de rendu)

Ce dépôt est le dépôt de référence de votre équipe pour le module M3301.
Vos rendus se feront en déposant tous les fichiers pertinents pour chaque itération ici.

Ce dépôt organisé comme suit :
```console
rendus
├── docs/
│   └── README.md
├── art-entraide/
|   └── controler/
|       └── start.ctrl.php
|   └── data/
|       └── create.sql
|   └── framework/
|       └── view.class.php
|   └── model/
|       └── DAO.class.php
|   └── test/
|       └── test.php
|   └── view/
|       └── design/
|           └── style.css
├── .gitattributes
├── .gitignore
├── .gitlab
│   └── …
└── README.md
```

**Vous déposerez vos rendus textuel au format `pdf` dans le dossier `docs/`.<br>
Tout document textuel dans un autre format ne sera pas considéré.**


##### Fichiers particuliers

Les deux fichiers `.gitattributes` et `.gitignore` sont liés à la configuration de git.<br>
Vous pouvez modifier le fichier `.gitignore` en fonction des technologies utilisées et de l'organisation du dépôt choisie.<br>
Il est vivement déconseillé de modifier le fichier `.gitattributes`.

Le dossier `.gitlab` contient la configuration spécifique à GitLab.

##### art-entraide

**art-entraide** contient le code.
**controler/** contient les contrôleurs en php.
**data/** contient les fichiers de la base de données.
**framework/** contient la vue général.
**model/** contient classe php.
**test/** contient tout les tests.
**view/** contient tout le visuel.
