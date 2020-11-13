set datestyle to EUROPEAN;

INSERT INTO Utilisateur VALUES(DEFAULT, 'jean.patrik@yahoo.fr', 'motdepassesuperfort', 'Jean', 'Partrik', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'koin.kanar@yahoo.fr', 'coincoin', 'Koin', 'Kanar', 'Carcanard', FALSE, -100);
INSERT INTO Utilisateur VALUES(DEFAULT, 'michel.fauraiveur@yahoo.fr', '2night', 'Michel', 'Fauraiveur', 'Brasil', TRUE, 100);
INSERT INTO Utilisateur VALUES(DEFAULT, 'jean.neymar@yahoo.fr', 'gonnaGoFast', 'Jean', 'Neymar', 'Grenoble', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'bob.more@yahoo.fr', 'anne', 'Bob', 'More', 'Faceauvent', FALSE, 0);
INSERT INTO Utilisateur VALUES(DEFAULT, 'tu.plante@yahoo.fr', '', '', '', '', TRUE, -101);
INSERT INTO Utilisateur VALUES(DEFAULT, 'tu.plante@yahoo.fr', 'aussi', '', '', '', TRUE, 101);

INSERT INTO Categorie VALUES(DEFAULT, 'Garde bébé');
INSERT INTO Categorie VALUES(DEFAULT, 'Location');
INSERT INTO Categorie VALUES(DEFAULT, 'Peinture');
INSERT INTO Categorie VALUES(DEFAULT, 'Autre');

INSERT INTO Annonce VALUES(DEFAULT, 'Cherche garde bébé particuler', 'J''ai partiel ce jour là', 'Grenoble', '10/11/2020', '16/11/2020', 4, 1);
INSERT INTO Annonce VALUES(DEFAULT, 'Location bébé', 'Bébé pas cher', 'Grenoble', '11/11/2020', '11/11/2020', 2, 2);
INSERT INTO Annonce VALUES(DEFAULT, 'Peinture bébé', 'Je peind bébé pas cher', 'Grenoble', '13/11/2020', '18/11/2020', 5, 3);
INSERT INTO Annonce VALUES(DEFAULT, 'Je mange votre bébé', 'Je mange les bébés facilement et sans faille', 'Grenoble', '10/11/2020', '16/11/2020', 5, 4);

INSERT INTO Message VALUES(DEFAULT, 'Je ne suis pas d''accord', '12/11/2020', 2);
INSERT INTO Message VALUES(DEFAULT, 'Alors que faites vous là ?', '13/11/2020', 5);
INSERT INTO Message VALUES(DEFAULT, 'Je ne sais pas moi, je cherche à savoir les gouts de mon bébé, mais votre méthode n''est pas la bonne.', '13/11/2020', 2);
INSERT INTO Message VALUES(DEFAULT, 'Ok Zoomer.', '13/11/2020', 5);

INSERT INTO Reponse VALUES(4, 2, 1);
INSERT INTO Reponse VALUES(4, 2, 2);
INSERT INTO Reponse VALUES(4, 2, 3);
INSERT INTO Reponse VALUES(4, 2, 4);
