set datestyle to EUROPEAN;

INSERT INTO Utilisateur(1, 'jean.patrik@yahoo.fr', 'motdepassesuperfort', 'Jean', 'Partrik', 'Grenoble', F, 0);
INSERT INTO Utilisateur(2, 'koin.kanar@yahoo.fr', 'coincoin', 'Koin', 'Kanar', 'Carcanard', F, -100);
INSERT INTO Utilisateur(3, 'michel.fauraiveur@yahoo.fr', '2night', 'Michel', 'Fauraiveur', 'Brasil', T, 100);
INSERT INTO Utilisateur(4, 'jean.neymar@yahoo.fr', 'gonnaGoFast', 'Jean', 'Neymar', 'Grenoble', F, 0);
INSERT INTO Utilisateur(5, 'bob.more@yahoo.fr', 'anne', 'Bob', 'More', 'Faceauvent', F, 0);
INSERT INTO Utilisateur(6, 'tu.plante@yahoo.fr', '', '', '', '', T, -101);
INSERT INTO Utilisateur(7, 'tu.plante@yahoo.fr', 'aussi', '', '', '', T, 101);

INSERT INTO Categorie(1, 'Garde bébé');
INSERT INTO Categorie(2, 'Location');
INSERT INTO Categorie(3, 'Peinture');
INSERT INTO Categorie(4, 'Autre');

INSERT INTO Annonce(1, 'Cherche garde bébé particuler', 'J\'ai partiel ce jour là', 'Grenoble', '10/11/2020', '16/11/2020', 4, 1);
INSERT INTO Annonce(2, 'Location bébé', 'Bébé pas cher', 'Grenoble', '11/11/2020', '11/11/2020', 2, 2);
INSERT INTO Annonce(3, 'Peinture bébé', 'Je peind bébé pas cher', 'Grenoble', '13/11/2020', '18/11/2020', 5, 3);
INSERT INTO Annonce(4, 'Je mange votre bébé', 'Je mange les bébés facilement et sans faille', 'Grenoble', '10/11/2020', '16/11/2020', 5, 4);

INSERT INTO Message(1, 'Je ne suis pas d\'accord', '12/11/2020', 2);
INSERT INTO Message(2, 'Alors que faites vous là ?', '13/11/2020', 5);
INSERT INTO Message(3, 'Je ne sais pas moi, je cherche à savoir les gouts de mon bébé, mais votre méthode n\'est pas la bonne.', '13/11/2020', 2);
INSERT INTO Message(4, 'Ok Zoomer.', '13/11/2020', 5);

INSERT INTO Reponse(4, 2, 1);
INSERT INTO Reponse(4, 2, 2);
INSERT INTO Reponse(4, 2, 3);
INSERT INTO Reponse(4, 2, 4);
