<!DOCTYPE html>
<html>
    <head>
        <title>TP 10 : exercice 2</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
		
		<style type="text/css">
			definition {
				color: red;
				font-size: 16pt;
			}
			
			titre {
				color: navy;
				font-weight: bold;
			}
			
			pays {
				color: silver;
				font-style: italic;
			}
		</style>
		
		<script language="JavaScript" type="text/javascript" src="./europays.js"></script>
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
					<h2>Définition des EuroPays (objet JavaScript)</h2>
					<br/>

					<script language="JavaScript" type="text/javascript">
						var france = new EuroPays("France", "Paris", 58);
						var italie = new EuroPays("Italie", "Rome", 57);
						france.affiche();
						italie.affiche();
						
						var allemagne = new EuroPays("", "", 0);
						allemagne.init();
						allemagne.affiche();
					</script>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>