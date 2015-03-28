<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 2, partie affichage des inscriptions sauvegardées</title>
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
						<li><p><a href="./EX2_formulaire_action_persistance.php">Partie formulaire et action avec persistance des données</a></p></li>
						<li><p><a href="./EX2_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Inscription des étudiants aux soutenances, partie affichage des inscriptions sauvegardées</h2>
					<br/>
					
					Liste des inscriptions sauvegardées :<br/>
					<?php
						$nbLigne = 0;
						$inscriptions = array();
						$fichier = fopen ("inscriptions.csv", "r");
						while ($ligne = fgetcsv ($fichier, 200, ";") ) {
							$inscriptions[$nbLigne]["numero"] = $nbLigne;
							$inscriptions[$nbLigne]["nomEtudiant"] = $ligne[0];
							$inscriptions[$nbLigne]["prenomEtudiant"] = $ligne[1];
							$inscriptions[$nbLigne]["jourSoutenance"] = $ligne[2];
							$inscriptions[$nbLigne]["moisSoutenance"] = $ligne[3];
							$inscriptions[$nbLigne]["anneeSoutenance"] = $ligne[4];
							$inscriptions[$nbLigne]["heureSoutenance"] = $ligne[5];
							$inscriptions[$nbLigne]["salleSoutenance"] = $ligne[6];
							$nbLigne++;
						}
						fclose ($fichier);
						
						echo ("<ul>");
						foreach ($inscriptions as $inscription)
							echo ("<li>L'inscription numéro <b>" . ($inscription["numero"]+1) . "</b> concerne la soutenance de l'étudiant <b>" . $inscription["prenomEtudiant"] . " " . $inscription["nomEtudiant"] . "</b>, laquelle aura lieu le <b>" . $inscription["jourSoutenance"] . "</b>, en <b>" . $inscription["moisSoutenance"] . " " . $inscription["anneeSoutenance"] . "</b>, à <b>" . $inscription["heureSoutenance"] . "</b>, dans la salle <b>" . $inscription["salleSoutenance"] . "</b>.</li>");
						echo ("</ul>");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>