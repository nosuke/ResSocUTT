<!DOCTYPE html>
<html>
    <head>
        <title>TP 9 : exercice 1</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
    </head>

    <body>

		<div id="global">

			<?php include "../general/entete.html"; ?>

			<div id="centre">
				<div id="navigation">
					<ul>
						<li><p><a href="./plan.php">Accueil du TP</a></p></li>
						<li><p><a href="../TP8/EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Création d'une table avec l'outil phpMyAdmin</h2>
					<br/>
					
					<a href="./EX1_airbus_create.sql">Lien du fichier des requêtes de création de table</a><br/>
					<a href="./EX1_airbus_insert.sql">Lien du fichier des requêtes d'insertion de valeurs dans la table</a><br/>
					<a href="./EX1_airbus_delete.sql">Lien du fichier des requêtes de suppressions de valeurs dans la table</a>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>