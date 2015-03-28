<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 1, partie action</title>
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
						<li><p><a href="../TP3/EX4.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2_formulaire_action.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX1_formulaire_action.php">Partie formulaire et action</a></p></li>
						<li><p><a href="./EX1_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Traitement PHP du formulaire de contact, partie action</h2>
					<br/>

					<?php
						printf("Merci de nous avoir répondu, <b>%s</b> <b>%s</b>.<br/>", $_GET["prenom"], $_GET["nom"]);
						printf("Nous vous recontacterons prochainement à l'adresse email <b>%s</b>.<br/>", $_GET["email"]);
						printf("Pour vous connecter sur ce site, vous pourrez utiliser le login <b>%s</b> et le mot de passe <b>%s</b>.<br/><br/>", $_GET["login"], $_GET["mdp"]);
					?>

					<!-- 5) L'élément non rempli par le visiteur ne s'affiche pas dans
					la partie action de l'exercice.
					6) Si un élément du formulaire ne dispose pas de l'attribut name, il
					devient impossible d'afficher la valeur que cet élément contient. -->

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>