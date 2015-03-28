<!DOCTYPE html>
<html>
    <head>
        <title>TP 9 : PHP et MySQL</title>
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
						<li><p><a href="../TP8/plan.php">TP précédent</a></p></li>
						<li><p><a href="../TP10/plan.php">TP suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>TP 9 : PHP et MySQL</h2>
					<br/>

					<a href="./EX1.php" title="Exercice 1">Exercice 1 : Création d'une table avec l'outil phpMyAdmin</a><br/>
					<a href="./EX2.php" title="Exercice 2">Exercice 2 : Quelques requêtes avec PHP et mysqli</a><br/>
					<a href="./EX3.php" title="Exercice 3">Exercice 3 : Création d'un livre d'or et approche PDO</a><br/>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>