<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 2, partie formulaire</title>
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
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Inscription des étudiants aux soutenances, partie formulaire</h2>
					<br/>
					
					Bonjour. Si vous le souhaitez, vous pouvez associer des étudiants à des dates de soutenance en remplissant les champs présents ci-dessous. <br/> <br/>
					<form method="POST" action="EX2_action.php">
						
						<p/>
						
						<?php
							formulaire_input_texte ("Nom de l'étudiant : ", "nomEtudiant");
							formulaire_input_texte ("Prénom de l'étudiant : ", "prenomEtudiant");
							formulaire_select_date_soutenance ("Date de la soutenance :", "numeroDateSoutenance", 1, listeDatesSoutenance() );
						?>
						
						<p/><br/>
						
						<input type="submit" value="transmettre" />
						<input type="reset" value="annuler" />
					</form>
					
					<?php
						function formulaire_input_texte ($etiquette, $nom) {
							echo ("<label>" . $etiquette . "</label>");
							echo ("<input name='" . $nom . "' type='text' value='' />\n");
							echo ("<p/><br/>\n");
						}
						
						function formulaire_select_date_soutenance ($etiquette, $nom, $taille, $tableau) {
							echo ("<label>" . $etiquette . "</label><p/>");
							echo ("<select name='" . $nom . "' size='" . $taille . "' />\n");
							foreach ($tableau as $valeur)
								echo ("<option value='" . $valeur["numero"] . "'>" . ($valeur["numero"]+1) . " : " . $valeur["jour"] . ", " . $valeur["mois"] . ", " . $valeur["annee"] . ", " . $valeur["heure"] . ", " . $valeur["salle"] . "</option>\n");
							echo ("</select>\n");
							echo ("<p/><br/>\n");
						}
						
						function listeDatesSoutenance() {
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
							
							return $soutenances;
						}
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>