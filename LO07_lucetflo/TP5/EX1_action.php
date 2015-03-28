<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 1, partie action</title>
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
						<li><p><a href="../TP4/EX3_formulaire_action.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2_formulaire_action_persistance.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX1_affichage_soutenances.php">Partie affichage des soutenances sauvegardées</a></p></li>
						<li><p><a href="./EX1_formulaire_action_persistance.php">Partie formulaire et action avec persistance des données</a></p></li>
						<li><p><a href="./EX1_formulaire_action.php">Partie formulaire et action</a></p></li>
						<li><p><a href="./EX1_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Planning des soutenances, partie action</h2>
					<br/>
										
					<?php
						echo ("La date de soutenance a bien été ajoutée.<br/><br/>");
						echo ("Elle a été fixée le <b>" . $_POST["jour"] . "</b>, en <b>" . $_POST["mois"] . " " . $_POST["annee"] . "</b>, à <b>" . $_POST["heure"] . "</b>, dans la salle <b>" . $_POST["salle"] . "</b>.");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>