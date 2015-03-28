<!DOCTYPE html>
<html>
    <head>
        <title>TP 2 : exercice 3</title>
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
					<h2>Formulaire de contact et tableau</h2>
					<br/>

					Bonjour. Si vous le souhaitez, vous pouvez nous laisser vos coordonnées dans les champs présents ci-dessous pour que nous permettre de vous recontacter à l'avenir. <br/> <br/>
					<form method="get">
						<label>Nom :</label>
						<input type="text" name="nom" />
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
					</form> <br/> <br/>
					
					<!-- 4) L'adresse du formulaire est suivi de "?nom=&prenom=&email=&login=&mdp=".
					5) Si un élément du formulaire n'est pas rempli par le visiteur, le signe "=" de
					l'élément correspondant dans la barre d'adresse est directement suivi du "&"
					indiquant le passage au prochaine élément du formulaire.
					6) La méthode "get" est dangereuse vis-à-vis du champ de saisie du mot de passe,
					parce que la saisie est retranscrite, à l'envoi, dans la barre d'adresse, ce qui
					fait que le mot de passe est visible en clair.
					7) Si un élément du formulaire ne dispose pas de l'attribut name, la saisie rentrée
					dans son champ n'apparaît pas, à l'envoi, dans la barre d'adresse.
					9) L'attribut value de la balise option sert à stocker une valeur différente au
					texte affiché. -->

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>