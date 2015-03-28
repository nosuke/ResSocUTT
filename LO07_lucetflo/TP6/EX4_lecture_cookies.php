<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 4, partie lecture de cookies</title>
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
						<li><p><a href="./EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX5_formulaire_action_session.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX4.php">Partie formulaire</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Cookies (formulaire de sondage), partie lecture de cookies</h2>
					<br/>
					
					<?php
						echo ("Nom : " . $_COOKIE["nom"] . ".<br/>");
						echo ("Prénom : " . $_COOKIE["prenom"] . ".<br/>");
						echo ("Sexe : " . $_COOKIE["sexe"] . ".<br/><br/>");
						
						$operateurs = unserialize($_COOKIE["operateurs"]);
						echo ("Opérateurs :");
						echo ("<ul>");
						foreach ($operateurs as $cle => $valeur)
							echo ("<li>" . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						$services = unserialize($_COOKIE["services"]);
						echo ("Services :");
						echo ("<ul>");
						foreach ($services as $cle => $valeur)
							echo ("<li>" . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						echo ("Prix : " . $_COOKIE["prix"] . ".<br/>");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>