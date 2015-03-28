<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 3, partie formulaire et action</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../styles/styleTP4EX3.css" media="screen" />
    </head>

    <body>

		<div id="global">

			<?php include "../general/entete.html"; ?>

			<div id="centre">
				<div id="navigation">
					<ul>
						<li><p><a href="./plan.php">Accueil du TP</a></p></li>
						<li><p><a href="./EX2_formulaire_action.php">Exercice précédent</a></p></li>
						<li><p><a href="../TP5/EX1_formulaire_action_persistance.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX3_formulaire_action.php">Partie formulaire et action</a></p></li>
						<li><p><a href="./EX3_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Traitement PHP du formulaire de contact, partie formulaire et action</h2>
					<br/>

					<?php
						function formulaire() {
							print <<<END
							Bonjour. Si vous le souhaitez, vous pouvez répondre à un sondage sur les téléphones portables en remplissant les champs présents ci-dessous. <br/> <br/>
							<form method="get" action="EX3_formulaire_action.php">
								<label>Nom :</label>
								<input type="text" name="nom" />
								<p/>
								<label>Prénom :</label>
								<input type="text" name="prenom" />
								<p/>

								<label>Sexe :</label><p/>
								<input type="radio" name="sexe" value="homme" />Homme
								<input type="radio" name="sexe" value="femme" />Femme
								<p/>

								<label>Opérateur(s) :</label><p/>
								<input type="checkbox" name="operateurs[]" value="orange" />Orange
								<input type="checkbox" name="operateurs[]" value="sfr" />SFR
								<input type="checkbox" name="operateurs[]" value="bouygues" />Bouygues
								<input type="checkbox" name="operateurs[]" value="free" />Free
								<input type="checkbox" name="operateurs[]" value="virgin" />Virgin
								<input type="checkbox" name="operateurs[]" value="autres" />Autres
								<p/>

								<label>Service(s) :</label><p/>
								<select name="services[]" multiple="10">
									<option>Présentation du numéro</option>
									<option>Forfait illimité</option>
									<option>SMS illimités</option>
									<option>MMS illimités</option>
									<option>Clé 3G</option>
									<option>Internet</option>
									<option>Photographie</option>
									<option>Musique</option>
									<option>Vidéo</option>
									<option>Jeux vidéo</option>
								</select>
								<p/>

								<label>Prix mensuel le plus proche (en euros) :</label><p/>
								<select name="prix">
									<option>10</option>
									<option>20</option>
									<option>30</option>
									<option>40</option>
									<option>50</option>
									<option>60</option>
								</select>
								<p/>

								<input type="submit" value="transmettre" />
								<input type="reset" value="annuler" />
							</form>
END;
						}
					?>

					<?php
						function champsValides() {
							$tousValides = true;
							if (!isset($_GET["nom"]) || $_GET["nom"] == "") {
								echo ("Veuillez saisir votre nom. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_GET["prenom"]) || $_GET["prenom"] == "") {
								echo ("Veuillez saisir votre prénom. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_GET["sexe"]) || $_GET["sexe"] == "") {
								echo ("Veuillez sélectionner votre sexe. <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_GET["operateur"]) || $_GET["operateur"] == "") {
								echo ("Veuillez sélectionner votre/vos opérateur(s). <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_GET["service"]) || $_GET["service"] == "") {
								echo ("Veuillez sélectionner votre/vos service(s). <br/><br/>");
								$tousValides = false;
							}
							if (!isset($_GET["prix"]) || $_GET["prix"] == "") {
								echo ("Veuillez sélectionner votre prix mensuel le plus proche (en euros). <br/><br/>");
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
							printf("Merci d'avoir répondu à ce sondage, <b>%s</b> <b>%s</b>.<br/><br/><br/>", $_GET["prenom"], $_GET["nom"]);
							printf("Nous avons pris en compte les différentes informations vous concernant : <br/><br/>");
							printf("<li>Votre sexe : <b>%s</b>.</li><br/>", $_GET["sexe"]);
							printf("<li>Votre/vos opérateur(s) : <br/><br/>");

							echo ('<table border="1" cellspacing="2" cellspading="5">');
							echo ("<tbody>");
							echo ("<tr>");
							foreach ($_GET["operateur"] as $valeur) {
									printf ("<td><b>%s</b></td>", $valeur);
							}
							echo ("</tr>");
							echo ("</tbody>");
							echo ("</table> </li><br/>");

							printf("<li>Votre/vos service(s) : <br/><br/>");
							echo ('<table border="1" cellspacing="2" cellspading="5">');
							echo ("<tbody>");
							echo ("<tr>");
							foreach ($_GET["service"] as $valeur) {
									printf ("<td><b>%s</b></td>", $valeur);
							}
							echo ("</tr>");
							echo ("</tbody>");
							echo ("</table> </li><br/>");

							printf("<li>Le prix mensuel le plus proche que vous payez (en euros) : <b>%s</b>.</li>", $_GET["prix"]);
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