<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 1, partie affichage des soutenances sauvegardées</title>
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
						<li><p><a href="./EX1_formulaire_action_persistance.php">Partie formulaire et action avec persistance des données</a></p></li>
						<li><p><a href="./EX1_formulaire_action.php">Partie formulaire et action</a></p></li>
						<li><p><a href="./EX1_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Planning des soutenances, partie affichage des soutenances sauvegardées</h2>
					<br/>
					
					Liste des soutenances sauvegardées :<br/>
					<?php
						$nbLigne = 0;
						$soutenances = array();
						$fichier = fopen ("soutenances.csv", "r");
						while ($ligne = fgetcsv ($fichier, 200, ";") ) {
							$soutenances[$nbLigne]["numero"] = $nbLigne;
							$soutenances[$nbLigne]["jour"] = $ligne[0];
							$soutenances[$nbLigne]["mois"] = $ligne[1];
							$soutenances[$nbLigne]["annee"] = $ligne[2];
							$soutenances[$nbLigne]["heure"] = $ligne[3];
							$soutenances[$nbLigne]["salle"] = $ligne[4];
							$nbLigne++;
						}
						fclose ($fichier);
						
						echo ("<ul>");
						foreach ($soutenances as $soutenance)
							echo ("<li>La soutenance numéro <b>" . ($soutenance["numero"]+1) . "</b> aura lieu le <b>" . $soutenance["jour"] . "</b>, en <b>" . $soutenance["mois"] . " " . $soutenance["annee"] . "</b>, à <b>" . $soutenance["heure"] . "</b>, dans la salle <b>" . $soutenance["salle"] . "</b>.</li>");
						echo ("</ul>");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>