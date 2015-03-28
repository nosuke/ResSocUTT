<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 2, partie formulaire et action</title>
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
					<h2>Site de développement de photos, partie formulaire et action</h2>
					<br/>

					<?php
						function formulaire() {
							print <<<END
							Bonjour. Si vous le souhaitez, vous pouvez nous laisser jusqu'à trois photographies en même temps. <br/>
							Vous pouvez aussi nous laisser nom, prénom et adresse email qui seront attachés à vos photographies. <br/>
							Cela permettra à autrui de connaître l'auteur des photographies et de vous recontacter. <br/> <br/>
							<form method="post" action="EX2_formulaire_action.php" enctype="multipart/form-data">
								<label>Photographie 1 :</label>
								<input type="file" name ="photo1" />
								<p/>
								<label>Photographie 2 :</label>
								<input type="file" name ="photo2" />
								<p/>
								<label>Photographie 3 :</label>
								<input type="file" name ="photo3" />
								<p/>

								<label>Nom :</label>
								<input type="text" name ="nom" />
								<p/>
								<label>Prénom :</label>
								<input type="text" name="prenom" />
								<p/>
								<label>Email :</label>
								<input type="text" name="email" />
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
							if (empty($_FILES) || (($_FILES["photo1"]["error"] != 0) && ($_FILES["photo2"]["error"] != 0) && ($_FILES["photo3"]["error"] != 0))) {
								echo ("Veuillez télécharger au moins une photographie. <br/><br/>");
								$tousValides = false;
							}
							if (isset($_POST["email"]) && $_POST["email"] == "") {
								$email_valide = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
								if (($email_valide) === false) {
									echo ("Veuillez saisir une adresse email valide. <br/> Rappel : la formalisation d'une adresse email est '***@adresse du serveur de messagerie électronique.fr/com/net/org/etc. <br/><br/>");
									$tousValides = false;
								}
							}
							return $tousValides;
						}
					?>

					<?php
						function action() {
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

							if ((isset($_POST["prenom"]) && $_POST["prenom"] != "") || (isset($_POST["nom"]) && $_POST["nom"] != "")) {
								printf("Merci de nous avoir répondu, <b>%s</b> <b>%s</b>.<br/>", $_POST["prenom"], $_POST["nom"]);
							}
							if (isset($_POST["email"]) && $_POST["email"] != "") {
								printf("Nous laisserons votre adresse email <b>%s</b> sur notre site.<br/>", $_POST["email"]);
							}
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