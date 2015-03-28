<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 4, partie écriture de cookies</title>
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
						<li><p><a href="./EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX5_formulaire_action_session.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX4.php">Partie formulaire</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Cookies (formulaire de sondage), partie écriture de cookies</h2>
					<br/>
					
					<?php
						setcookie("nom", $_POST["nom"]);
						setcookie("prenom", $_POST["prenom"]);
						setcookie("sexe", $_POST["sexe"]);
						
						if (empty($_POST["operateurs"]))
							$operateur = array();
						$operateur = serialize($_POST["operateurs"]);
						setcookie("operateurs", $operateur, time()+3600);
						
						if (empty($_POST["services"]))
							$operateur = array();
						$service = serialize($_POST["services"]);
						setcookie("services", $service, time()+3600);
						
						setcookie("prix", $_POST["prix"]);
						
						echo ("Les six cookies 'nom', 'prenom', 'sexe', 'operateur[]', 'service[]' et 'prix' ont été enregistrés sur votre ordinateur !<br/>");
						echo ("<a href='./EX4_lecture_cookies.php'>Afficher les cookies</a>");
					?>
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>