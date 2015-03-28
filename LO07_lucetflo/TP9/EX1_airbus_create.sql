-- 1) Rédiger dans un fichier (tp08_exo1_airbus_create.sql) l'instruction SQL
-- permettant la création de la table avions dont les attributs sont : id, label,
-- annee et passagers. L'attribut id est la clé primaire de la relation. 
CREATE TABLE AVION (
	id INTEGER(10) NOT NULL,
	label VARCHAR(35) NOT NULL,
	annee INTEGER(10) NOT NULL,
	passagers INTEGER(10) NOT NULL,
	PRIMARY KEY(id)
);