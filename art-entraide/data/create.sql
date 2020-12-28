CREATE TABLE IF NOT EXISTS Utilisateur (
  id SERIAL PRIMARY KEY,
  email VARCHAR NOT NULL UNIQUE,
  password VARCHAR NOT NULL,
  nom VARCHAR NOT NULL,
  prenom VARCHAR NOT NULL,
  adresse VARCHAR,
  certif BOOLEAN NOT NULL DEFAULT false,
  reputation INTEGER NOT NULL DEFAULT 0 CONSTRAINT reputation_intervalle CHECK (reputation>=-100 AND reputation<=100)
);

CREATE TABLE IF NOT EXISTS Categorie (
  id SERIAL PRIMARY KEY,
  nom VARCHAR NOT NULL
);

CREATE TABLE IF NOT EXISTS Annonce (
  id SERIAL PRIMARY KEY,
  nom VARCHAR NOT NULL,
  description VARCHAR,
  adresse VARCHAR,

  est_demande BOOLEAN NOT NULL DEFAULT true, -- vrai si l'annonce est une demande de service
  est_active BOOLEAN NOT NULL DEFAULT true, -- vrai si l'annonce est active, faux si elle est finit

  date_creation DATE NOT NULL,
  date_service DATE,
  id_createur INTEGER NOT NULL,
  id_categorie INTEGER NOT NULL,

  FOREIGN KEY(id_categorie) REFERENCES Categorie(id),
  FOREIGN KEY(id_createur) REFERENCES Utilisateur(id)
);

CREATE TABLE IF NOT EXISTS Message (
  id SERIAL PRIMARY KEY,
  contenue VARCHAR NOT NULL,
  date_message DATE NOT NULL,
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
