<!DOCTYPE html>
<html>
    <head>
        <title>TP 7 : exercice 2, partie formulaire</title>
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
						<li><p><a href="./EX3_dictionnaireMain.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Gestion Web des modules, partie formulaire</h2>
					<br/>

					Bonjour. Si vous le souhaitez, vous pouvez saisir un nouveau module remplissant les champs présents ci-dessous. <br/> <br/>
					<form method="get" action="EX2_action.php">
						<label>Sigle du module :</label>
						<input type="text" name="sigle" />
						<p/>
						
						<label>Label du module :</label>
						<input type="text" name="label" />
						<p/>

						<label>Catégorie du module :</label><p/>
						<select name="categorie">
							<option>CS</option>
							<option>TM</option>
							<option>EC</option>
							<option>ME</option>
							<option>CT</option>
						</select>
						<p/>
						
						<label>Effectif du module :</label>
						<input type="text" name="effectif" />
						<p/>
						
						<input type="submit" value="transmettre" />
						<input type="reset" value="annuler" />
					</form>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>