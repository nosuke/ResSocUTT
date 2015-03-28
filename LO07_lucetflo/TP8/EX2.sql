-- 1) Affichez les informations contenues dans la relation VIN.
SELECT * FROM VIN;

-- 2) Donnez la liste des régions de production de vins.
SELECT region FROM PRODUCTEUR;

-- 3) Donnez la liste des régions de production de vins sans les doublons.
SELECT DISTINCT region FROM PRODUCTEUR

-- 4) Donnez la liste des vins de 1980 ordonnée par degré.
SELECT * FROM VIN
WHERE annee = 1980
ORDER BY degre;

-- 5) Quel est le nombre de récoltes ?
SELECT COUNT(*) nombreRecoltes FROM RECOLTE;

-- 6) Donner la liste par ordre alphabétique des noms et des prénoms des
-- producteurs de vins n'appartenant pas aux régions suivantes : Corse,
-- Beaujolais, Bourgogne et Rhône.
SELECT nom, prenom FROM PRODUCTEUR
WHERE region NOT IN ('Corse', 'Beaujolais', 'Bourgogne', 'Rhône')
ORDER BY nom ASC, prenom ASC;

-- 7) Donner la liste ordonnée des crus.
SELECT * FROM VIN
ORDER BY cru ASC;

-- 8) Quel est le degré moyen des crus ?
SELECT AVG(degre) degreMoyen FROM VIN;

-- 9) Quels sont les crus (ordonnés par degré et année) de degré supérieur au
-- degré moyen des crus ?
-- Pas bon.
SELECT * FROM VIN
WHERE degre >
(
	SELECT AVG(degre) FROM VIN
)
ORDER BY degre ASC, annee ASC;

-- 10) Quelle est la quantité de vin produite de degré > 12 ?
SELECT SUM(quantite) quantiteVin FROM RECOLTE
WHERE vin_id IN
(
	SELECT id FROM VIN
	WHERE degre > 12
);

-- 11) Quels sont les noms des producteurs du cru 'Etoile', leurs régions et la
-- quantité de vins récoltés ?
SELECT nom, region, SUM(RECOLTE.quantite) quantiteVin FROM PRODUCTEUR, RECOLTE, VIN
WHERE PRODUCTEUR.id = RECOLTE.producteur_id
AND RECOLTE.vin_id = VIN.id
AND cru = "Etoile"
GROUP BY nom;

-- 12) Quelles sont les quantités de vin produites par région ? Donner la liste
-- ordonnée par quantité décroissante.
-- A tester.
SELECT region, SUM(quantite) quantiteVin FROM RECOLTE, PRODUCTEUR
WHERE RECOLTE.producteur_id = PRODUCTEUR.id
GROUP BY region
ORDER BY quantiteVin DESC;

-- 13) Donner la liste des noms et des prénoms des producteurs produisant au
-- moins trois crus.
SELECT nom, prenom, COUNT(cru) nombreCrus FROM PRODUCTEUR, RECOLTE, VIN
WHERE PRODUCTEUR.id = RECOLTE.producteur_id
AND RECOLTE.vin_id = VIN.id
AND COUNT(cru) >= 3
GROUP BY PRODUCTEUR.id;

-- 14) Retrouver toutes les paires de producteurs habitant la même région. Les
-- tuples du résultat seront de la forme id1, nom1, id2, nom2, région. La
-- présence d'un tuple avec id1 et id2 interdit la présence d'un tuple avec id2
-- et id1.
SELECT P1.id, P1.nom, P2.id, P2.nom, region FROM PRODUCTEUR P1, PRODUCTEUR P2
WHERE P1.region = P2.region;