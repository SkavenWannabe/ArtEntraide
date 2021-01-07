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

### Répertoire `art-entraide`

Ce répertoire contient le code de l'application elle-même.

- `controler/` contient les contrôleurs PHP ;
- `data/` contient les fichiers de la base de données ;
- `framework/` contient la vue générale (micro-framework) ;
- `model/` contient les classes PHP ;
- `test/` contient tous les tests ;
- `view/` contient les vues.

### Répertoire `conception`
Ce répertoire contient le matériel le conception, notamment les diagrammes UML par exemple.
Pour les fichiers `.drawio`, il faut les ouvrir avec [draw.io](https://app.diagrams.net/), e choisissant "Open from device". Un [package Atom](https://atom.io/packages/atom-drawio) permet également de visualiser ces fichiers directement dans l'éditeur.

- `BDD/` : schéma relationnel de la base de données
- `PHP/` : diagramme de classes uniquement de modèle
- `Vue/` : schémas concernant le site (plan,...)

### Répertoire `rapport` et LaTeX
Le rapport est rédigé en LaTeX, un langage de préparation de documents en texte simple, ce qui facilite la collaboration via Git. Ce texte est ensuite interprété pour générer un PDF.\
Le répertoire `rapport` contient le fichier source `rapport.tex`, le fichier généré `rapport.pdf` (en `.gitignore` pour éviter les conflits Git), les nombreux fichiers intermédiaires laissés par la génération (eux aussi ignorés) ainsi que le répertoire `images/` qui contient les images à insérer dans le rapport.\
Lors des rendus, le `rapport.pdf` est copié dans `docs/` pour ne plus être "gitignoré".

Voir [le README dédié](https://gricad-gitlab.univ-grenoble-alpes.fr/iut2-info/m3301/2020-s3/team-9/rendus/-/blob/master/rapport/README.md) dans `rapport/` pour la syntaxe LaTeX.

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

### Reste à faire :
non fonctionnel :
 - global : //
  []  mettre la police en gris plutôt que noir//
  []  fond en blanc cassé plutôt que blanc//
  []  page trop grande !//
  []  vérification lors de suppression (compte + annonce)//
 - header :
  []  recherche annonce (renvoie pas au bon endroit)
  []  gestion de la liste catégorie (transfo en bouton / utiliter ?)
  []  bar de recherche en plus long
  []  fil d’Ariane
 - page accueil :
  []  titre annonce souligner, mettre le lien pour cliquer
  []  clique sur catégorie sous une annonce - recherche ou non ?

- footer :
  []  page mention légal + politique de confidentialité
  []  refaire design (aligner + rajout barre)
  []  haut de page - mettre une image
  []  fb + insta mettre image + savoir a quoi on renvoi
 - nous contacter
  []  changer le texte !

 - connexion :
  []  connexion avec google
  []  bouton "ici" renvoie page accueil plutôt création de compte
 - création compte :
  []  faire rédaction de la page
  []  password pas passwd

 - création annonce
  []  changer font détails + block texte pas aligné
  []  date a rendre non obligatoire
  []  catégorie mise a vide ou sur autre
 - modification annonce
  []  passer par un deuxième ctrl pour éviter l'affichage des erreurs
 - description annonce :
  []  refaire design
  []  ajout bouton signalez (renvoi éventuellement vers contactez nous)

 - voir plus d'annonce
  []  la recherche à vérifier / changer
  []  + gestion affichage pr bcp annonce, gestion de page ?

 - voir ses annonce
  []  mettre un petit mot quand il n'y a pas d'annonce
 - conversation
  []  design a changer
  []  paragraphe au lieu d'une ligne
 - voir réponses à faire
 - suppression compte ne fonctionne pas
