<!DOCTYPE html>
<html>
    <head>
        <title>TP 10 : exercice 3</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
		
		<script language="JavaScript" type="text/javascript" src="./europays.js"></script>
		<script language="JavaScript" type="text/javascript">
			function affichageFrance() {
				document.getElementById("label").value = france.label;
				document.getElementById("capitale").value = france.capitale;
				document.getElementById("habitants").value = france.habitants;
			}
			
			function affichageItalie() {
				document.getElementById("label").value = italie.label;
				document.getElementById("capitale").value = italie.capitale;
				document.getElementById("habitants").value = italie.habitants;
			}
			
			function affichageAllemagne() {
				document.getElementById("label").value = allemagne.label;
				document.getElementById("capitale").value = allemagne.capitale;
				document.getElementById("habitants").value = allemagne.habitants;
			}
		</script>
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
					
					<ul>
						<li><input type="button" onclick="affichageFrance();" value="France" /></li>
						<li><input type="button" onclick="affichageItalie();" value="Italie" /></li>
						<li><input type="button" onclick="affichageAllemagne();" value="Allemagne" /></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Frame, EuroPays et Formulaires</h2>
					<br/>

					<script language="JavaScript" type="text/javascript">
						var france = new EuroPays("France", "Paris", 58);
						var italie = new EuroPays("Italie", "Rome", 57);
						var allemagne = new EuroPays("Allemagne", "Berlin", 81);
					</script>
					
					<form name="formulaireEuropays">
						<label>Label :</label>
						<input type="text" id="label" name="label" disabled="disabled" />
						<p/>
						<label>Capitale :</label>
						<input type="text" id="capitale" name="capitale" disabled="disabled" />
						<p/>
						<label>Nombre d'habitants :</label>
						<input type="text" id="habitants" name="habitants" disabled="disabled" />
						<p/>
					</form>
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>