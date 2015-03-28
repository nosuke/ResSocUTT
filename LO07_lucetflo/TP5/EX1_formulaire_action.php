<!DOCTYPE html>
<html>
    <head>
        <title>TP 5 : exercice 1, partie formulaire et action</title>
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
					<h2>Planning des soutenances, partie formulaire et action</h2>
					<br/>
					
					<?php
						function formulaire() {
							print <<<END
							Bonjour. Si vous le souhaitez, vous pouvez définir une date de soutenance en sélectionnant un élément par liste, dans les listes déroulantes présentes ci-dessous. <br/> <br/>
							<form method="POST" action="EX1_formulaire_action.php">

								<p/>
END;
							
							formulaire_select_unique ("Jour de la semaine :", "jour", 1, listeJours() );
							formulaire_select_unique ("Mois de l'année :", "mois", 1, listeMois() );
							formulaire_select_unique ("Année :", "annee", 1, listeAnnees() );
							formulaire_select_unique ("Heure de la journée :", "heure", 1, listeHeures() );
							formulaire_select_unique ("Salle de la soutenance :", "salle", 1, listeSalles() );
							
							print <<<END
								<p/><br/>

								<input type="submit" value="transmettre" />
								<input type="reset" value="annuler" />
							</form>
END;
						}
					?>
					
					<?php
						function formulaire_select_unique ($etiquette, $nom, $taille, $tableau) {
							echo ("<label>" . $etiquette . "</label><p/>");
							echo ("<select name='" . $nom . "' size='" . $taille . "' />\n");
							foreach ($tableau as $valeur)
								echo ("<option>" . $valeur . "</option>\n");
							echo ("</select>\n");
							echo ("<p/>\n");
						}
						
						function listeJours() {
							return array (
								"Lundi",
								"Mardi",
								"Mercredi",
								"Jeudi",
								"Vendredi",
								"Samedi",
								"Dimanche"
							);
						}
						
						function listeMois() {
							return array (
								"Janvier",
								"Février",
								"Mars",
								"Avril",
								"Mai",
								"Juin",
								"Juillet",
								"Août",
								"Septembre",
								"Octobre",
								"Novembre",
								"Décembre"
							);
						}
						
						function listeAnnees() {
							return array (
								1994,
								1995,
								1996,
								1997,
								1998,
								1999,
								2000,
								2001,
								2002,
								2003,
								2004,
								2005,
								2006,
								2007,
								2008,
								2009,
								2010,
								2011,
								2012,
								2013,
								2014,
								2015,
								2016,
								2017,
								2018,
								2019,
								2020
							);
						}
						
						function listeHeures() {
							return array (
								"08h00",
								"08h20",
								"08h40",
								"09h00",
								"09h20",
								"09h40",
								"10h00",
								"10h20",
								"10h40",
								"11h00",
								"11h20",
								"11h40",
								"12h00",
								"12h20",
								"12h40",
								"13h00",
								"13h20",
								"13h40",
								"14h00",
								"14h20",
								"14h40",
								"15h00",
								"15h20",
								"15h40",
								"16h00",
								"16h20",
								"16h40",
								"17h00",
								"17h20",
								"17h40",
								"18h00"
							);
						}
						
						function listeSalles() {
							return array (
								"A207",
								"P204",
								"SO04",
								"T115",
								"T216"
							);
						}
					?>
					
					<?php
						function champsValides() {
							$tousValides = true;
							if (!isset($_POST["jour"]) || $_POST["jour"] == "") {
								echo ("Veuillez sélectionner le jour de la soutenance. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_POST["mois"]) || $_POST["mois"] == "") {
								echo ("Veuillez sélectionner le mois de la soutenance. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_POST["annee"]) || $_POST["annee"] == "") {
								echo ("Veuillez sélectionner l'année de la soutenance. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_POST["heure"]) || $_POST["heure"] == "") {
								echo ("Veuillez sélectionner l'heure de la soutenance. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_POST["salle"]) || $_POST["salle"] == "") {
								echo ("Veuillez sélectionner la salle de la soutenance. <br/><br/>");
								$tousValides = false;
							}
							if ($tousValides == false) {
								echo ("<br/>");
							}
							return $tousValides;
						}
					?>

					<?php
						function action() {
							echo ("La date de soutenance a bien été ajoutée.<br/><br/>");
							echo ("Elle a été fixée le <b>" . $_POST["jour"] . "</b>, en <b>" . $_POST["mois"] . " " . $_POST["annee"] . "</b>, à <b>" . $_POST["heure"] . "</b>, dans la salle <b>" . $_POST["salle"] . "</b>.");
						}
					?>
					
					<?php
						if (champsValides()) {
							action();
						} else {
							formulaire();
						}
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>