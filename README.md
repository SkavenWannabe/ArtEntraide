# Projet M3301 (dépôt de rendu)

Ce dépôt est le dépôt de référence de votre équipe pour le module M3301.
Vos rendus se feront en déposant tous les fichiers pertinents pour chaque itération ici.

Ce dépôt organisé comme suit :
```console
rendus
├── .gitattributes
├── .gitignore
├── .gitlab
│   └── …
├── art-entraide/
|   ├── controler/
|   |   └── *.ctrl.php
|   ├── data/
|   |   ├── create.sql
|   |   ├── drop.sql
|   |   ├── insert.sql
|   |   ├── reset.sql
|   |   └── trigger.sql
|   ├── framework/
|   |   └── view.class.php
|   ├── model/
|   |   ├── Annonce.class.php
|   |   ├── Categorie.class.php
|   |   ├── Certificateur.class.php
|   |   ├── DAO.class.php
|   |   ├── Message.class.php
|   |   ├── Reponse.class.php
|   |   └── Utilisateur.class.php
|   ├── test/
|   |   ├── Annonce.test.php
|   |   ├── Categorie.test.php
|   |   ├── Certificateur.test.php
|   |   ├── Message.test.php
|   |   ├── Reponse.test.php
|   |   └── Utilisateur.test.php
|   ├── view/
|   |   ├── css/
|   |   |   └── *.css
|   |   ├── design/
|   |   |   ├── *.png
|   |   |   ├── *.jpg
|   |   |   └── *.svg
|   |   ├── js/
|   |   |   └── accueil.js
|   |   └── *.view.php
|   └── index.php
├── conception/
|   ├── BDD/
|   |   ├── bdd.tex
|   |   └── Schema-relationnel-BDD.png
|   ├── PHP/
|   |   ├── DC.png
|   |   └── DC.xml
|   ├── maquette/
|   |   └── maquette-*.png
|   ├── DCU
|   └── DS
├── docs/
|   ├── Iteration1-Diapo.pdf
|   ├── Iteration1-Rapport.pdf
|   ├── Iteration2-Rapport.pdf
|   ├── Iteration3-Diapo.pdf
|   ├── Iteration3-Rapport.pdf
│   └── README.md
├── Evaluation/
|   ├── Critères-ergp.pdf
|   ├── evaluation-ergo-[prenom].txt
│   └── senario.txt
├── rapport/
|   ├── images/
|   |   └── *.png
|   ├── rapport.tex
│   └── README.md
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
Pour les fichiers `.drawio` ou `.xml` (le promat à changer durant le projet mais reste compatible), il faut les ouvrir avec [draw.io](https://app.diagrams.net/), e choisissant "Open from device". Un [package Atom](https://atom.io/packages/atom-drawio) permet également de visualiser ces fichiers directement dans l'éditeur.

- `BDD/` : schéma relationnel de la base de données
- `PHP/` : diagramme de classes uniquement de modèle
- `Vue/` : schémas concernant le site (plan,...)

### Répertoire `rapport` et LaTeX
Le rapport est rédigé en LaTeX, un langage de préparation de documents en texte simple, ce qui facilite la collaboration via Git. Ce texte est ensuite interprété pour générer un PDF.\
Le répertoire `rapport` contient le fichier source `rapport.tex`, le fichier généré `rapport.pdf` (en `.gitignore` pour éviter les conflits Git), les nombreux fichiers intermédiaires laissés par la génération (eux aussi ignorés) ainsi que le répertoire `images/` qui contient les images à insérer dans le rapport.\
Lors des rendus, le `rapport.pdf` est copié dans `docs/` pour ne plus être "gitignoré".

Voir [le README dédié](https://gricad-gitlab.univ-grenoble-alpes.fr/iut2-info/m3301/2020-s3/team-9/rendus/-/blob/master/rapport/README.md) dans `rapport/` pour la syntaxe LaTeX.

### Acces au site

Le lien du site : https://art-entraide.ddns.net:8080

Les identifiants des comptes utilisateurs sont pour le login "prenom.nom@iut2.univ-grenoble-alpes.fr" et le mot de passe est "ens".
L'identifiant du comptes certificateur unique a pour login "ens@iut2.univ-grenoble-alpes.fr" et comme mot de passe "ens".

### Machine virtuelle

Une machine virtuelle VirtualBox est mise à disposition pour tester le code
Utilisateur: `vealem`
Mot de passe: `vealem` (le même pour la base de données)

La machine est pourvue d'une base de données PostgreSQL et d'un serveur web NGINX
Il suffit de lancer le navigateur et de se rendre sur http://localhost pour accéder au site
Le repository git est cloné dans le homedir de vealem
Tous les changements faits au code dans ce dossier sont automatiquement effectifs

Lien du fichier de la machine virtuelle: [ici](https://cloud.legendre.tech/s/QWcdENBAYY8cBxJ)

### Acces à la base de donnée

<details>
<summary>Utilisation en local</summary>

Utilisation de la base de données pré-remplie (avec les scripts dans `art-entraide/data`)

OU


Création d'une base de données PostgreSQL:
  1.  En tant qu'administrateur: `CREATE EXTENSION pgcrypto;`
  2.  En étant dans le répertoire `art-entraide/data`: `\i reset.sql`

</details>

<details>
<summary>Accès à la base de données de production</summary>

Avec PostgreSQL: `psql -d projets3 -U projets3 -h art-entraide.ddns.net -p 23455`
Mot de passe: `vealemS3`

</details>

### Logiciels nécéssaires à la mise en place du site

 - PostgreSQL
 - NGINX
 - php-fpm (>= 7.4)

### Configuration du serveur (NGINX)

```Nginx
server {

	root PROJECT_ROOT/art-entraide;

	# Add index.php to the list if you are using PHP
	index index.php;

	error_log /var/log/nginx/error.log;

	server_name localhost 127.0.0.1;

	location / {
		# First attempt to serve request as file, then
		# as directory, then fall back to displaying a 404.
		try_files $uri $uri/ =404;
	}

	error_page 404 /view/erreur.view.php;

	# pass PHP scripts to FastCGI server
	#
	location ~ \.php$ {
		include snippets/fastcgi-php.conf;

		# With php-fpm (or other unix sockets):
		fastcgi_pass unix:/run/php/php7.4-fpm.sock;
	}

}
```
