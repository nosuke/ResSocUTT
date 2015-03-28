<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 1, partie formulaire</title>
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
						<li><p><a href="../TP3/EX4.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX2_formulaire_action.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX1_formulaire_action.php">Partie formulaire et action</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Traitement PHP du formulaire de contact, partie formulaire</h2>
					<br/>

					Bonjour. Si vous le souhaitez, vous pouvez nous laisser vos coordonnées dans les champs présents ci-dessous pour que nous permettre de vous recontacter à l'avenir. <br/> <br/>
					<form method="get" action="EX1_action.php">
						<label>Nom :</label>
						<input type="text" name ="nom" />
						<p/>
						<label>Prénom :</label>
						<input type="text" name="prenom" />
						<p/>
						<label>Email :</label>
						<input type="text" name="email" />
						<p/>
						<label>Login :</label>
						<input type="text" name="login" />
						<p/>
						<label>Mot de passe :</label>
						<input type="password" name="mdp" />
						<p/>

						<label>Que préférez-vous manger ?</label><p/>
						<select name="produit">
							<optgroup label="Fruits">
								<option>Citron</option>
								<option>Tomate</option>
								<option>Mangue</option>
								<option>Orange</option>
							</optgroup>
							<optgroup label="Légumes">
								<option>Courgette</option>
								<option>Carotte</option>
							</optgroup>
						</select>
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