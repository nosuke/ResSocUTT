<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 5, partie affichage des soutenances sauvegardées</title>
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
						<li><p><a href="./EX4.php">Exercice précédent</a></p></li>
						<li><p><a href="../TP7/EX1.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX5_formulaire_action_session.php">Partie formulaire et action avec persistance des données</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Sauvegarde de données complexes, partie affichage des soutenances sauvegardées</h2>
					<br/>
					
					Liste des soutenances sauvegardées :<br/>
					<?php
						session_start();
						
						echo ("<ul>");
						for ($i=1; $i<=count($_SESSION); $i++)
							echo ("<li>La soutenance numéro <b>" . $i . "</b> aura lieu le <b>" . $_SESSION["'" . $i . "'"]["jour"] . "</b>, en <b>" . $_SESSION["'" . $i . "'"]["mois"] . " " . $_SESSION["'" . $i . "'"]["annee"] . "</b>, à <b>" . $_SESSION["'" . $i . "'"]["heure"] . "</b>, dans la salle <b>" . $_SESSION["'" . $i . "'"]["salle"] . "</b>.</li>");
						echo ("</ul>");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>