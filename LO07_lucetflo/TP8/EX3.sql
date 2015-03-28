-- 1) Rédigez l’instruction de création d’une table vehicules possédant les
-- attributs suivants : no_plaque, marque, modele, couleur. Validez en créant la
-- table avec phpMyAdmin.
CREATE TABLE VEHICULE (
	no_plaque VARCHAR(25) NOT NULL,
	marque VARCHAR(35) NOT NULL,
	modele VARCHAR(35) NOT NULL,
	couleur VARCHAR(25) NOT NULL,
	PRIMARY KEY(no_plaque)
);

-- 2) Rédigez l’instruction de création d’une table proprietaires possédant les
-- attributs suivants : no_ss, nom, prenom, adresse. Validez en créant la table
-- avec phpMyAdmin.
CREATE TABLE PROPRIETAIRE (
	no_ss INTEGER NOT NULL,
	nom VARCHAR(45) NOT NULL,
	prenom VARCHAR(45) NOT NULL,
	adresse VARCHAR(95) NOT NULL
	PRIMARY KEY(no_ss)
);

-- 3) On suppose que chaque véhicule n’a qu’un seul propriétaire. Proposez une
-- solution pour faire le lien entre les véhicules et les propriétaires. Validez
-- en modifiant les tables avec phpMyAdmin.
ALTER TABLE VEHICULE (
	CONSTRAINT VEH_FK FOREIGN KEY(no_proprietaire) REFERENCES PROPRIETAIRE(no_ss)
);

-- 4) Rédigez les instructions d’insertion dans second fichier. Applications avec
-- les données suivantes : Attention ici les données sont mélangées.
-- 123 AF 10, renault, clio, vert avec pour propriétaire : 100, marc, lemercier, Troyes
-- 345 FDE 75, citroen, ax, bleu avec pour propriétaire : 200, alain, ploix, Chalons
-- 657 DE 88, peugeot, 404, rouge avec pour propriétaire : 300, guillaume, doyen, Nancy
-- 89 GT 10, renault, twingo, bleu avec pour propriétaire : 100, marc, lemercier, Troyes
INSERT INTO PROPRIETAIRE VALUES (100, "marc", "lemercier", "Troyes");
INSERT INTO PROPRIETAIRE VALUES (200, "alain", "ploix", "Chalons");
INSERT INTO PROPRIETAIRE VALUES (300, "guillaume", "doyen", "Nancy");
INSERT INTO VEHICULE VALUES ("123 AF 10", "renault", "clio", "vert", 100);
INSERT INTO VEHICULE VALUES ("345 FDE 75", "citroen", "ax", "bleu", 200);
INSERT INTO VEHICULE VALUES ("657 DE 88", "peugeot", "404", "rouge", 300);
INSERT INTO VEHICULE VALUES ("89 GT 10", "renault", "twingo", "bleu", 100);

-- 5) On suppose maintenant que chaque véhicule peut avoir plusieurs
-- propriétaires. Proposez une solution pour faire le lien entre les véhicules
-- et les propriétaires.
CREATE TABLE POSSESSION (
	no_proprietaire INTEGER NOT NULL,
	no_vehicule VARCHAR(25) NOT NULL,
	PRIMARY KEY(no_proprietaire, no_vehicule),
	CONSTRAINT POS_FK1 FOREIGN KEY(no_proprietaire) REFERENCES PROPRIETAIRE(no_ss),
	CONSTRAINT POS_FK2 FOREIGN KEY(no_vehicule) REFERENCES VEHICULE(no_plaque)
);
ALTER TABLE VEHICULE (
	DROP CONSTRAINT VEH_FK
);

-- 6) Proposez une liste d’insertion dans un fichier pour valider votre approche.
-- Liste d'instructions insert into .....
INSERT INTO POSSESSION VALUES (100, "123 AF 10");
INSERT INTO POSSESSION VALUES (200, "345 FDE 75");
INSERT INTO POSSESSION VALUES (300, "657 DE 88");
INSERT INTO POSSESSION VALUES (100, "89 GT 10");
INSERT INTO POSSESSION VALUES (200, "123 AF 10");

-- 7) Rédigez une requête SQL présentant la liste des véhicules d’un propriétaire.
SELECT * FROM PROPRIETAIRE, POSSESSION, VEHICULE
WHERE PROPRIETAIRE.no_ss = POSSESSION.no_proprietaire
AND POSSESSION.no_vehicule = VEHICULE.no_plaque
GROUP BY PROPRIETAIRE.no_ss;