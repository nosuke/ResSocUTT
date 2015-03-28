<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 3, partie action</title>
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
					<h2>Traitement PHP du formulaire de sondage, partie action</h2>
					<br/>

					<?php
						printf("Merci d'avoir répondu à ce sondage, <b>%s</b> <b>%s</b>.<br/><br/><br/>", $_GET["prenom"], $_GET["nom"]);
						printf("Nous avons pris en compte les différentes informations vous concernant : <br/><br/>");
						printf("<li>Votre sexe : <b>%s</b>.</li><br/>", $_GET["sexe"]);
						printf("<li>Votre/vos opérateur(s) : <br/><br/>");

						echo ('<table border="1" cellspacing="2" cellspading="5">');
						echo ("<tbody>");
						echo ("<tr>");
						foreach ($_GET["operateurs"] as $valeur) {
								printf ("<td><b>%s</b></td>", $valeur);
						}
						echo ("</tr>");
						echo ("</tbody>");
						echo ("</table> </li><br/>");

						printf("<li>Votre/vos service(s) : <br/><br/>");
						echo ('<table border="1" cellspacing="2" cellspading="5">');
						echo ("<tbody>");
						echo ("<tr>");
						foreach ($_GET["services"] as $valeur) {
								printf ("<td><b>%s</b></td>", $valeur);
						}
						echo ("</tr>");
						echo ("</tbody>");
						echo ("</table> </li><br/>");

						printf("<li>Le prix mensuel le plus proche que vous payez (en euros) : <b>%s</b>.</li>", $_GET["prix"]);
					?>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>