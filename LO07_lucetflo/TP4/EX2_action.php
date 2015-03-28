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
						<li><p><a href="./EX1_formulaire_action.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX3_formulaire_action.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX2_formulaire_action.php">Partie formulaire et action</a></p></li>
						<li><p><a href="./EX2_formulaire.php">Partie formulaire uniquement</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Site de développement de photos, partie action</h2>
					<br/>

					<?php
						if (($_FILES["photo1"]["error"] == 0) || ($_FILES["photo2"]["error"] == 0) || ($_FILES["photo3"]["error"] == 0)) {
							printf("Vous avez téléchargé le(s) fichier(s) suivant(s) : <br/><br/>");
							foreach ($_FILES as $photo => $informationsPhoto) {
								if ($_FILES[$photo]["error"] == 0) {
									echo("<li>");
									// printf("<img src = %s></img>", $_FILES[$photo]["tmp_name"]);
									foreach ($informationsPhoto as $param => $valeur) {
										printf("<b>%s</b> = %s<br/>", $param, $valeur);
									}
									echo("</li>");
								}
								echo("<br/>");
							}
						}

						if ((isset($_POST["prenom"]) && $_POST["prenom"] != "") || (isset($_POST["nom"]) && $_POST["nom"] != "")) {
							printf("Merci de nous avoir répondu, <b>%s</b> <b>%s</b>.<br/>", $_POST["prenom"], $_POST["nom"]);
						}
						if (isset($_POST["email"]) && $_POST["email"] != "") {
							printf("Nous laisserons votre adresse email <b>%s</b> sur notre site.<br/>", $_POST["email"]);
						}
					?>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>