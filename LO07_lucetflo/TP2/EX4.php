<!DOCTYPE html>
<html>
    <head>
        <title>TP 2 : exercice 4</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../styles/styleTP2EX4.css" media="screen" />
    </head>

    <body>

		<div id="global">

			<?php include "../general/entete.html"; ?>

			<div id="centre">
				<div id="navigation">
					<ul>
						<li><p><a href="./plan.php">Accueil du TP</a></p></li>
						<li><p><a href="./EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="../TP3/EX1.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->
				
				<div id="contenu">
					<h2>Formulaire de sondage et CSS</h2>
					<br/>

					Bonjour. Si vous le souhaitez, vous pouvez répondre à un sondage sur les téléphones portables en remplissant les champs présents ci-dessous. <br/> <br/>
					<form method="get">
						<label>Nom :</label>
						<input type="text" name="nom" />
						<p/>
						<label>Prénom :</label>
						<input type="text" name="prenom" />
						<p/>

						<label>Sexe :</label><p/>
						<input type="radio" name="sexe" value="homme" />Homme
						<input type="radio" name="sexe" value="femme" />Femme
						<p/>

						<label>Opérateur(s) :</label><p/>
						<input type="checkbox" name="operateur" value="orange" />Orange
						<input type="checkbox" name="operateur" value="sfr" />SFR
						<input type="checkbox" name="operateur" value="bouygues" />Bouygues
						<input type="checkbox" name="operateur" value="free" />Free
						<input type="checkbox" name="operateur" value="virgin" />Virgin
						<input type="checkbox" name="operateur" value="autres" />Autres
						<p/>

						<label>Service(s) :</label><p/>
						<select name="service" multiple="10">
							<option>Présentation du numéro</option>
							<option>Forfait illimité</option>
							<option>SMS illimités</option>
							<option>MMS illimités</option>
							<option>Clé 3G</option>
							<option>Internet</option>
							<option>Photographie</option>
							<option>Musique</option>
							<option>Vidéo</option>
							<option>Jeux vidéo</option>
						</select>
						<p/>

						<label>Prix mensuel le plus proche (en euros) :</label><p/>
						<select name="prix">
							<option>10</option>
							<option>20</option>
							<option>30</option>
							<option>40</option>
							<option>50</option>
							<option>60</option>
						</select>
						<p/>

						<input type="submit" value="transmettre" />
						<input type="reset" value="annuler" />
					</form>

					<!-- 2) Par rapport au précédent exercice, nous pouvons remarquer
					deux nouveautés : les espaces à l'intérieur d'une valeur stockée
					sont représentés par des "+" dans la barre d'adresse et un choix
					multiple implique une répétition du nom de paramètre correspondant.
					5) HTML5 = HTML + CSS3 + JavaScript. Les nouveaux éléments de
					formulaire proposés par HTML5 sont assez nombreux : datetime,
					datetime-local, date, month, week, time, tel, number, range, email,
					url, search et enfin color.
					Les éléments les plus adaptés pour la saisie des informations sont
					les éléments les plus intuitifs, logiques et rapides à utiliser en
					fonction du contexte. Pour bien choisir, il faut donc s'adapter au
					contexte et se mettre à la place de l'utilisateur.
					6) On peut construire des formulaires dynamiques avec des listes qui
					peuvent dépendre de l'utilisateur ou d'autres critères en adaptant le
					formulaire à des données stockées dans une base de données, via, par
					exemple, aux choix réalisés dans un formulaire par un utilisateur. -->

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>