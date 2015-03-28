<!DOCTYPE html>
<html>
    <head>
        <title>TP 3 : Bases de PHP</title>
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
						<li><p><a href="../TP2/plan.php">TP précédent</a></p></li>
						<li><p><a href="../TP4/plan.php">TP suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>TP 3 : Bases de PHP</h2>
					<br/>

					<a href="./EX1.php" title="Exercice 1">Exercice 1 : Premiers pas</a><br/>
					<a href="./EX2.php" title="Exercice 2">Exercice 2 : Tableaux en PHP</a><br/>
					<a href="./EX3.php" title="Exercice 3">Exercice 3 : Tableaux associatifs (les capitales d'Europe)</a><br/>
					<a href="./EX4.php" title="Exercice 4">Exercice 4 : Liste, chaîne et tableau associatif</a><br/>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>