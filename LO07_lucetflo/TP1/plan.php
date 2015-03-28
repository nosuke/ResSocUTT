<!DOCTYPE html>
<html>
    <head>
        <title>TP 1 : Langage HTML et styles CSS (1/2)</title>
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
						<li><p><a href="../general/accueil.php">Accueil</a></p></li>
						<li><p><a href="../TP2/plan.php">TP suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>TP 1 : Langage HTML et styles CSS (1/2)</h2>
					<br/>

					<a href="./EX1.html" title="Exercice 1">Exercice 1 : Ma première page HTML</a><br/>
					<a href="./EX2.html" title="Exercice 2">Exercice 2 : Listes et hyperliens</a><br/>
					<a href="./EX3.html" title="Exercice 3">Exercice 3 : Images</a><br/>
					<a href="./EX4.html" title="Exercice 4">Exercice 4 : Introduction aux tableaux</a><br/>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>