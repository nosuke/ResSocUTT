<!DOCTYPE html>
<html>
    <head>
        <title>TP 3 : exercice 1</title>
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
						<li><p><a href="../TP2/EX4.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Premiers pas</h2>
					<br/>

					<?php
					echo "Bonjour à tous ! <br/> <br/>";

					define("NOM", "LUCET");
					define("PRENOM", "Florent");
					define("AGE", 20);
					echo(PRENOM . " " . NOM . " a " . AGE . " ans. <br/>");

					$mot1 = "Bonjour";
					$mot2 = "à";
					$mot3 = "tous";
					$mot4 = "!";
					?>
					<br/>

					<ul>
						<li><?php echo $mot1; ?></li>
						<li><?php echo $mot2; ?></li>
						<li><?php echo $mot3; ?></li>
						<li><?php echo $mot4; ?></li>
					</ul>

					<!-- 5) Cette URL est :
					http://dev-isi.utt.fr/~lucetflo/LO07_lucetflo/TP3/EX1.php .
					6) Les instructions PHP n'apparaissent pas parce qu'elles sont
					exécutées sur le serveur avant que la page soir transmise au client. -->
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>