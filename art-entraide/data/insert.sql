set datestyle to EUROPEAN;

INSERT INTO Utilisateur VALUES(DEFAULT, 'alexandre.legendre@etu.univ-grenoble-alpes.fr', 'foxxyfox', 'Alexandre', 'Legendre', 'SMH', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'eliott.sammier@etu.univ-grenoble-alpes.fr', 'bigbrain', 'Eliott', 'Sammier', 'Gière', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'marion.chauvineau@etu.univ-grenoble-alpes.fr', 'dogydogo', 'Marion', 'Chauvineau', 'Fontanil', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'elian.loraux@etu.univ-grenoble-alpes.fr', 'michel4ever', 'Elian', 'Loraux', 'Lyon', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'lucas.lacouture@etu.univ-grenoble-alpes.fr', '1uc42', 'Lucas', 'Lacouture', 'Saint-Denis', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'vincenzo.carminati@etu.univ-grenoble-alpes.fr', 'tacos', 'Vincenzo', 'Carminati', 'Pontcharra-Sur-Bréda', TRUE, 0);

INSERT INTO Utilisateur VALUES(DEFAULT, 'gaelle.blanco-laine@iut2.univ-grenoble-alpes.fr', 'ens', 'Gaëlle', 'Blanco-Lainé', 'Grenoble', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'sophie.dupuy-chessa@iut2.univ-grenoble-alpes.fr', 'ens', 'Sophie', 'Dupuy-Chessa', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'jerome.goulian@iut2.univ-grenoble-alpes.fr', 'ens', 'Jérôme', 'Goulian', 'Grenoble', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'aous.karoui@iut2.univ-grenoble-alpes.fr', 'ens', 'Aous', 'Karoui', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'herve.blanchon@iut2.univ-grenoble-alpes.fr', 'ens', 'Hervé', 'Blanchon', 'Grenoble', TRUE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'tanguy.giuffrida@iut2.univ-grenoble-alpes.fr', 'ens', 'Tanguy', 'Giuffrida', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'francis.brunet-manquat@iut2.univ-grenoble-alpes.fr', 'ens', 'Francis', 'Brunet-Manquat', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'raphel.bleuse@iut2.univ-grenoble-alpes.fr', 'ens', 'Raphaël', 'Bleuse', 'Grenoble', TRUE, 0);

INSERT INTO Certificateur VALUES(DEFAULT, 'ens@iut2.univ-grenoble-alpes.fr', 'ens', 'Certificateur', 'Certificateur');
INSERT INTO Certificateur VALUES(DEFAULT, 'vealem@yopmail.com', 'bacher-bézou', 'Vealem', 'Vealem');

INSERT INTO Categorie VALUES(DEFAULT, 'Baby-sitting');
INSERT INTO Categorie VALUES(DEFAULT, 'Location');
INSERT INTO Categorie VALUES(DEFAULT, 'Aide aux devoirs');
INSERT INTO Categorie VALUES(DEFAULT, 'Bricolage');
INSERT INTO Categorie VALUES(DEFAULT, 'Covoiturage');
INSERT INTO Categorie VALUES(DEFAULT, 'Autre');

INSERT INTO Annonce VALUES(DEFAULT, 'Recherche une personne pour garder notre enfant', 'Nous avons une réunion ce jour là. Nous avons donc besoin de quelqu''un pour garder notre enfant toute la journée.', 'Grenoble', DEFAULT,DEFAULT,'10/11/2020', '22/02/2021', 4, 1);
INSERT INTO Annonce VALUES(DEFAULT, 'Location camionnette', 'Je possède une camionnette qui ne me sert pas, je peux donc vous la prêter en échange d''un service', 'Grenoble', DEFAULT,DEFAULT,'11/11/2020', '18/12/2021', 3, 2);
INSERT INTO Annonce VALUES(DEFAULT, 'Professeur particulier', 'Dans le cadre de ma formation d''enseignant, je cherche des étudiants à aider pour donner un plus à mon CV. Je peux aider du collège au Lycée.', 'Grenoble', DEFAULT,DEFAULT,'13/11/2020', '03/03/2021', 5, 3);
INSERT INTO Annonce VALUES(DEFAULT, 'Recherche covoiturage régulier', 'Je recherche quelqu''un avec le permis pour faire du covoiturage régulierement de Chambéry à Grenoble','Chambéry', DEFAULT,DEFAULT,'10/11/2020', '06/12/2021', 6, 5);

--annonce enseignant
INSERT INTO Annonce VALUES(DEFAULT, 'Recherche peintre pour garde mon enfant', 'Je recherche un peintre pour garder mon enfant et l''éveiller à la peinture', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', '25/01/2021', 7, 1);
INSERT INTO Annonce VALUES(DEFAULT, 'Recherche bricoleur pour monter mon étagère', 'Je recherche un bricoleur pour m''aider à construire mon étagère Ikea (référence VITTSJÖ)', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', NULL, 8, 4);
INSERT INTO Annonce VALUES(DEFAULT, 'Cherche voisin pour jogging', 'Je cherche un voisin pour apprendre à faire du jogging', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', NULL, 9, 6);
INSERT INTO Annonce VALUES(DEFAULT, 'Cherche soutien scolaire en maths', 'Je recherche un professeur de math particulier pour ma nièce. Elle passe le bac cette année et je manque de temps pour l''aider. Elle se trouve en Bac STI.', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', '10/05/2021', 10, 3);
INSERT INTO Annonce VALUES(DEFAULT, 'Cherche guide de montagne', 'je recherche un guide pour faire de la randonnée en raquette.', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', NULL, 11, 6);
INSERT INTO Annonce VALUES(DEFAULT, 'Aide déménagement', 'Je change de logement, mais j''ai beaucoup de carton, ceci ne sont pas lourd, mais une pair de bras en plus ne sera pas de refus.', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', '01/02/2021', 12, 6);
INSERT INTO Annonce VALUES(DEFAULT, 'Recherche boulanger', 'Je recherche quelqu''un pour m''apprendre à faire du pain.', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', NULL , 13, 5);
INSERT INTO Annonce VALUES(DEFAULT, 'Arroser le jardin', 'Je recherche un jardinier, pour que mes fleurs guardent leur beauté le plus longtemps possible.', 'Grenoble', DEFAULT, DEFAULT, '10/10/2020', '29/04/2021', 14, 6);


--discution enseignant
INSERT INTO Message VALUES(DEFAULT, 'Bonjour, je fais du jogging tous les samedi. Voulez-vous vous joindre à moi ?', '17/01/2021', 10);
INSERT INTO Message VALUES(DEFAULT, 'Bonjour, cela me convient, mais je suis débutant, j''ai peur d''avoir du mal à vous suivre.', '17/01/2021', 9);
INSERT INTO Message VALUES(DEFAULT, 'Ne vous inquiétez pas, je vous attendrais.', '17/01/2021', 10);
INSERT INTO Message VALUES(DEFAULT, 'Très bien alors, à Samedi alors.', '17/01/2021', 9);

INSERT INTO Reponse VALUES(7, 10, 1);
INSERT INTO Reponse VALUES(7, 10, 2);
INSERT INTO Reponse VALUES(7, 10, 3);
INSERT INTO Reponse VALUES(7, 10, 4);
