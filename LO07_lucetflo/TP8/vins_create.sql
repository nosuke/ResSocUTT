CREATE TABLE VIN (
  id INTEGER NOT NULL,
  cru Varchar(45) NOT NULL,
  annee INTEGER  NOT NULL,
  degre FLOAT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE PRODUCTEUR (
  id INTEGER NOT NULL,
  nom Varchar(45) NOT NULL,
  prenom Varchar(45) NOT NULL,
  region Varchar(45) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE RECOLTE (
  PRODUCTEUR_id INTEGER  NOT NULL,
  VIN_id INTEGER NOT NULL,
  quantite INTEGER NOT NULL,
  PRIMARY KEY(VIN_id, PRODUCTEUR_id),
  FOREIGN KEY(VIN_id)
    REFERENCES VIN(id)
      ON DELETE CASCADE
      ON UPDATE RESTRICT,
  FOREIGN KEY(PRODUCTEUR_id)
    REFERENCES PRODUCTEUR(id)
      ON DELETE CASCADE
      ON UPDATE RESTRICT
);


