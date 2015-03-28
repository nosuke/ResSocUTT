<!DOCTYPE html>
<html>
    <head>
        <title>TP 3 : exercice 2</title>
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
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>Tableaux en PHP</h2>
					<br/>

					<?php
					$tabCapitalesUSA = array("Montgomery", "Raleigh", "Tallahassee", "Atlanta", "Topeka", "Augusta", "Albany", "Nashville");
					echo "Capitales des USA :";
					?>

					<pre>
						<?php
						print_r($tabCapitalesUSA);
						?>
					</pre>
					<br/>

					<?php
					$nbValue = 0;
					echo "Capitales des USA : <br/>";
					foreach ($tabCapitalesUSA as $value) {
						$nbValue++;
						echo "$nbValue : $value <br/>";
					}
					echo "<br/>";
					?>

					<?php
					$chaine = implode(', ', $tabCapitalesUSA);
					echo "Capitales des USA : <br/> $chaine <br/>"
					?>
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>