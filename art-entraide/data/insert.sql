set datestyle to EUROPEAN;

INSERT INTO Utilisateur VALUES(DEFAULT, 'jean.patrik@yahoo.fr', 'motdepassesuperfort', 'Jean', 'Partrik', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'koin.kanar@yahoo.fr', 'coincoin', 'Karen', 'Smith', 'Carcanard', FALSE, -100);
INSERT INTO Utilisateur VALUES(DEFAULT, 'michel.fauraiveur@yahoo.fr', '2night', 'Michel', 'Fauraiveur', 'Brasil', TRUE, 100);
INSERT INTO Utilisateur VALUES(DEFAULT, 'jean.neymar@yahoo.fr', 'gonnaGoFast', 'Jean', 'Neymar', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'bob.more@yahoo.fr', 'anne', 'Bob', 'Maure', 'Faceauvent', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'tu.plante@yahoo.fr', '', '', '', '', TRUE, -101);
INSERT INTO Utilisateur VALUES(DEFAULT, 'tu.plante@yahoo.fr', 'aussi', '', '', '', TRUE, 101);

INSERT INTO Categorie VALUES(DEFAULT, 'Baby-sitting');
INSERT INTO Categorie VALUES(DEFAULT, 'Location');
INSERT INTO Categorie VALUES(DEFAULT, 'Aide au devoir');
INSERT INTO Categorie VALUES(DEFAULT, 'Autre');

INSERT INTO Annonce VALUES(DEFAULT, 'Recherche une personne pour garder notre enfant', 'Nous avons une réunion ce jour là. Nous avons donc besoin de quelqu''un pour garder notre enfant toute la journée.', 'Grenoble', DEFAULT,DEFAULT,'10/11/2020', NULL, 4, 1);
INSERT INTO Annonce VALUES(DEFAULT, 'Location camionnette', 'Je possède une camionnette qui ne me sert pas, je peux donc vous la prêter en échange d''un service', 'Grenoble', DEFAULT,DEFAULT,'11/11/2020', NULL, 2, 2);
INSERT INTO Annonce VALUES(DEFAULT, 'Professeur particulier', 'Dans le cadre de ma formation d''enseignant, je cherche des étudiants à aider pour donner un plus à mon CV. Je peux aider du collège au Lycée.', 'Grenoble', DEFAULT,DEFAULT,'13/11/2020', NULL, 5, 3);
INSERT INTO Annonce VALUES(DEFAULT, 'Recherche covoiturage régulier', 'Je recherche quelqu''un avec le permis pour faire du covoiturage régulierement de Chambéry à Grenoble','Chambéry', DEFAULT,DEFAULT,'10/11/2020', NULL, 5, 4);

INSERT INTO Message VALUES(DEFAULT, 'Bonjour, mon enfant est actuellement en 3ème. Êtes-vous capable de l''aider en histoire ?', '12/11/2020', 2);
INSERT INTO Message VALUES(DEFAULT, 'Bonjour, je peux aider votre enfant en histoire. Je suis disponible le Mercredi après-midi et le Samedi toute la journée.', '13/11/2020', 5);
INSERT INTO Message VALUES(DEFAULT, 'Alors je vous propose le Mercredi après-midi.', '13/11/2020', 2);
INSERT INTO Message VALUES(DEFAULT, 'Très bien, à Mercredi après-midi.', '13/11/2020', 5);

INSERT INTO Reponse VALUES(4, 2, 1);
INSERT INTO Reponse VALUES(4, 2, 2);
INSERT INTO Reponse VALUES(4, 2, 3);
INSERT INTO Reponse VALUES(4, 2, 4);
