<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 1</title>
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
						<li><p><a href="../TP5/EX2.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Contenu des variables SuperGlobales</h2>
					<br/>
					
					<?php
						session_start();
						
						echo ("Contenu de la superglobale GET :");
						echo ("<ul>");
						foreach ($_GET as $cle => $valeur)
							echo ("<li>" . $cle . " : " . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						echo ("Contenu de la superglobale POST :");
						echo ("<ul>");
						foreach ($_POST as $cle => $valeur)
							echo ("<li>" . $cle . " : " . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						echo ("Contenu de la superglobale COOKIE :");
						echo ("<ul>");
						foreach ($_COOKIE as $cle => $valeur)
							echo ("<li>" . $cle . " : " . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						echo ("Contenu de la superglobale REQUEST :");
						echo ("<ul>");
						foreach ($_REQUEST as $cle => $valeur)
							echo ("<li>" . $cle . " : " . $valeur . ".</li>");
						echo ("</ul><br/>");
						
						echo ("Contenu de la superglobale SESSION :");
						echo ("<ul>");
						foreach ($_SESSION as $cle => $valeur)
							echo ("<li>" . $cle . " : " . $valeur . ".</li>");
						echo ("</ul><br/>");
					?>
					
					<!-- 2) Fonctionne avec :
					- salle=A007&cours=LO07&enseignant=lemercier
					- prog=ISI&semestre=2&uv=LO07&uv=NF19 -->
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>