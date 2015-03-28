<!DOCTYPE html>
<html>
    <head>
        <title>TP 3 : exercice 4</title>
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
						<li><p><a href="../TP4/EX1_formulaire_action.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>Liste, chaîne et tableau associatif</h2>
					<br/>

					<?php
					$chaine = "prof=lemercier,cours=web,salle=C01,date=23/02/2010,cours=php";
					$chaine_cle = "";
					$chaine_val = "";
					$tableau = explode(",", $chaine);
					foreach ($tableau as $cle => $value) {
						$tableau2 = explode("=", $value);
						$chaine_cle = $chaine_cle.$tableau2[0]." : ";
						$chaine_val = $chaine_val.$tableau2[1]." : ";
					}
					$chaine_cle = substr($chaine_cle, 0, -3);
					$chaine_val = substr($chaine_val, 0, -3);
					echo "Chaine_cle = $chaine_cle. <br/>";
					echo "Chaine_val = $chaine_val. <br/> <br/>";
					
					
					$elements = array(
						"prof" => "lermercier",
						"cours" => "web",
						"salle" => "P204",
						"date" => "25/04/2010",
						"cours" => "PHP"
					);

					$nbValue = 0;
					echo "Contenu du tableau associatif : <br/>";
					foreach ($elements as $cle => $value) {
						$nbValue++;
						echo "La valeur correspondant à $cle (clé $nbValue) est $value (valeur $nbValue).<br/>";
					}
					echo "<br/>";


					/* 4) La valeur "PHP" a remplacé la valeur "web" dans l'emplacement
					  "cours" du tableau.
					  Plusieurs solutions sont possibles :
					  - stocker un tableau dans l'emplacement "cours" ;
					  - faire un tableau de tableaux ;
					  - renommer l'un des emplacements "cours" ;
					  - intervertir les clés et les valeurs avec array_flip() ;
					  - etc. */

					$elements = array(
						"prof" => "lermercier",
						"cours" => "web",
						"salle" => "P204",
						"date" => "25/04/2010",
						"langage" => "PHP"
					);

					$nbValue = 0;
					echo "Contenu du tableau associatif : <br/>";
					foreach ($elements as $cle => $value) {
						$nbValue++;
						echo "La valeur correspondant à $cle (clé $nbValue) est $value (valeur $nbValue).<br/>";
					}
					?>
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>