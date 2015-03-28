<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 2</title>
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
						<li><p><a href="./EX1.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX3.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Transmission discrète de données par un formulaire</h2>
					<br/>
					
					<form method="GET" action="./EX1.php">
						<input type="hidden" name="ville" value="Troyes" />
						<input type="hidden" name="effectif" value="3000" />
						<input type="submit" value="UTT" />
					</form>
					
					<form method="GET" action="./EX1.php">
						<input type="hidden" name="ville" value="Compiègne" />
						<input type="hidden" name="effectif" value="3200" />
						<input type="submit" value="UTC" />
					</form>
					
					<form method="GET" action="./EX1.php">
						<input type="hidden" name="ville" value="Belfort" />
						<input type="hidden" name="effectif" value="3100" />
						<input type="submit" value="UTBM" />
					</form>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>