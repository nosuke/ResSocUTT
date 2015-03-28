<!DOCTYPE html>
<html>
    <head>
        <title>TP 10 : exercice 1</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
		
		<script language="JavaScript" type="text/javascript">
			function champsValides() {
				if (document.formulaireJS.nom.value == "") return false;
				if (document.formulaireJS.prenom.value == "") return false;
				if (document.formulaireJS.age.value < 18) return false;
				return true;
			}
			function conversion() {
				document.formulaireJS.nom.value = document.formulaireJS.nom.value.toUpperCase();
				document.formulaireJS.prenom.value = document.formulaireJS.prenom.value.toLowerCase();
			}
			
			function validation() {
				if (champsValides()) {
					conversion();
					alert("Bienvenue " + document.formulaireJS.prenom.value + " " + document.formulaireJS.nom.value + " (" + document.formulaireJS.age.value + " ans) !");
				} else {
					alert("La syntaxe est mauvaise ou la saisie problématique (nom vide, prénom vide ou âge inférieur à 18).");
				}
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
						<li><p><a href="../TP9/EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Validation et autocorrection de formulaires</h2>
					<br/>

					Bonjour. Veuillez saisir votre nom, prénom et âge. <br/> <br/>
					<form name="formulaireJS" method="post" action="" onsubmit="return validation(this)">
						<label>Nom :</label>
						<input type="text" name="nom" />
						<p/>
						<label>Prénom :</label>
						<input type="text" name="prenom" />
						<p/>
						<label>Âge :</label>
						<input type="number" name="age" />
						<p/>

						<input type="submit" value="Valider" />
						<input type="reset" value="Annuler" />
					</form>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>