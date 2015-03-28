<!DOCTYPE html>
<html>
    <head>
        <title>TP 2 : Langage HTML et styles CSS (2/2)</title>
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
						<li><p><a href="../TP1/plan.php">TP précédent</a></p></li>
						<li><p><a href="../TP3/plan.php">TP suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>TP 2 : Langage HTML et styles CSS (2/2)</h2>
					<br/>

					<a href="./EX1.html" title="Exercice 1">Exercice 1 : Ajoutons des styles CSS à notre CV</a><br/>
					<a href="./EX2.php" title="Exercice 2">Exercice 2 : Structuration de page HTML avec des règles CSS</a><br/>
					<a href="./EX3.php" title="Exercice 3">Exercice 3 : Formulaire de contact et tableau</a><br/>
					<a href="./EX4.php" title="Exercice 4">Exercice 4 : Formulaire de sondage et CSS</a><br/>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>