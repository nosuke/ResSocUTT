<!DOCTYPE html>
<html>
    <head>
        <title>TP 3 : exercice 3</title>
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
						<li><p><a href="./EX2.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX4.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>Tableaux associatifs (les capitales d'Europe)</h2>
					<br/>

					<?php
					$hashCapitales = array(
						"France" => "Paris",
						"Italie" => "Rome",
						"Belgique" => "Bruxelles",
						"Espagne" => "Madrid",
						"Allemagne" => "Berlin",
						"Portugal" => "Lisbonne"
					);
					echo "Capitale de l'Allemagne : $hashCapitales[Allemagne] <br/> <br/>";

					$nbValue = 0;
					echo "Contenu du tableau associatif : <br/>";
					foreach ($hashCapitales as $cle => $value) {
						$nbValue++;
						echo "La capitale de $cle (clé $nbValue) est $value (valeur $nbValue).<br/>";
					}
					echo "<br/>";

					echo "Liste des clés : <br/>";
					print_r(array_keys($hashCapitales));
					echo "<br/> <br/>";

					echo "Liste des valeurs : <br/>";
					print_r(array_values($hashCapitales));
					?>
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>