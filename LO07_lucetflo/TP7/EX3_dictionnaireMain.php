<!DOCTYPE html>
<html>
    <head>
        <title>TP 7 : exercice 3</title>
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
						<li><p><a href="./EX2_formulaire.php">Exercice précédent</a></p></li>
						<li><p><a href="../TP8/EX1.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>Structure de données complexe et objets</h2>
					<br/>

					<?php
						require_once 'EX3_CDictionnaire.php';
						
						$dictionnaire = new Dictionnaire();
						$dictionnaire->init();
						$dictionnaire->affiche();
					?>
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>