<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 2, partie action</title>
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
						<li><p><a href="./EX1_formulaire_action_persistance.php">Exercice précédent</a></p></li>
						<li><p><a href="../TP6/EX1.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX2_affichage_inscriptions.php">Partie affichage des inscriptions sauvegardées</a></p></li>
						<li><p><a href="./EX2_formulaire_action_persistance.php">Partie formulaire et action avec persistance des données</a></p></li>
						<li><p><a href="./EX2_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Inscription des étudiants aux soutenances, partie action</h2>
					<br/>
										
					<?php
						$nbLigne = 0;
						$dateSoutenance = array();
						$fichier = fopen ("soutenances.csv", "r");
						while ($ligne = fgetcsv ($fichier, 200, ";")) {
							if ($_POST["numeroDateSoutenance"] == $nbLigne) {
								$dateSoutenance["numero"] = $nbLigne;
								$dateSoutenance["jour"] = $ligne[0];
								$dateSoutenance["mois"] = $ligne[1];
								$dateSoutenance["annee"] = $ligne[2];
								$dateSoutenance["heure"] = $ligne[3];
								$dateSoutenance["salle"] = $ligne[4];
							}
							
							$nbLigne++;
						}
						fclose ($fichier);
						
						echo ("L'étudiant <b>" . $_POST["prenomEtudiant"] . " " . $_POST["nomEtudiant"] . "</b> a bien été inscrit(e) à une date de soutenance.<br/>");
						echo ("Celle-ci est la date de soutenance <b>numéro " . ($dateSoutenance["numero"]+1) . " (" . $dateSoutenance["jour"] . ", " . $dateSoutenance["mois"] . ", " . $dateSoutenance["annee"] . ", " . $dateSoutenance["heure"] . ", " . $dateSoutenance["salle"] . ")</b>.");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>