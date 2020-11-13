CREATE TABLE IF NOT EXISTS Utilisateur (
  id INTEGER PRIMARY KEY,
  email VARCHAR NOT NULL,
  password VARCHAR NOT NULL,
  nom VARCHAR NOT NULL,
  prenom VARCHAR NOT NULL,
  adresse VARCHAR,
  certif BOOLEAN NOT NULL,
  reputation INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS Categorie (
  id INTEGER PRIMARY KEY,
  nom VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS Annonce (
  id INTEGER PRIMARY KEY,
  nom VARCHAR NOT NULL,
  description VARCHAR,
  adresse VARCHAR,
  date_creation DATE NOT NULL,
  date_service DATE,
  id_createur INTEGER NOT NULL,
  id_categorie INTEGER NOT NULL,

  FOREIGN KEY(id_categorie) REFERENCES Categorie(id),
  FOREIGN KEY(id_createur) REFERENCES Utilisateur(id)
);

CREATE TABLE IF NOT EXISTS Message (
  id INTEGER PRIMARY KEY,
  contenue VARCHAR NOT NULL,
  date_message TIMESTAMP NOT NULL,
  id_auteur INTEGER NOT NULL,

  FOREIGN KEY(id_auteur) REFERENCES Utilisateur(id)
);

CREATE TABLE IF NOT EXISTS Reponse (
  id_annonce INTEGER,
  id_repondeur INTEGER,
  id_message INTEGER,

  FOREIGN KEY(id_annonce) REFERENCES Annonce(id),
  FOREIGN KEY(id_repondeur) REFERENCES Utilisateur(id),
  FOREIGN KEY(id_message) REFERENCES Message(id),

  PRIMARY KEY(id_annonce, id_repondeur, id_message)
);
