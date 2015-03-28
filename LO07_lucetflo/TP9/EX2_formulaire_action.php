<!DOCTYPE html>
<html>
    <head>
        <title>TP 9 : exercice 2, partie ajout d'avion</title>
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
						<li><p><a href="./EX1.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX3.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX2.php">Partie liste des avions</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Quelques requêtes avec PHP et mysqli</h2>
					<br/>

					<?php

					function formulaire() {
						print <<<END
					Bonjour. Si vous le souhaitez, vous pouvez ajouter un nouvel avion à la base de données. <br/> <br/>
					<form method="post" action="EX2_formulaire_action.php" enctype="multipart/form-data">
						<label>Label :</label>
						<input type="text" name ="label" />
						<p/>
						<label>Année :</label>
						<input type="text" name="annee" />
						<p/>
						<label>Nombre de passagers :</label>
						<input type="text" name="passagers" />
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
						if (!isset($_POST["label"]) || $_POST["label"] == "") {
							$tousValides = false;
						}
						if (!isset($_POST["annee"]) || $_POST["anne"] == "") {
							$tousValides = false;
						}
						if (!isset($_POST["passagers"]) || $_POST["passagers"] == "") {
							$tousValides = false;
						}
						return $tousValides;
					}
					?>

					<?php

					function action() {
						printf("Ajout de l'avion terminé.");
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