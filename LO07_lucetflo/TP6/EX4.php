<!DOCTYPE html>
<html>
    <head>
        <title>TP 6 : exercice 4, partie formulaire</title>
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
						<li><p><a href="./EX5_formulaire_action_session.php">Exercice suivant</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Cookies (formulaire de sondage), partie formulaire</h2>
					<br/>
					
					Bonjour. Si vous le souhaitez, vous pouvez répondre à un sondage sur les téléphones portables en remplissant les champs présents ci-dessous. <br/> <br/>
					<form method="POST" action="EX4_ecriture_cookies.php">
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
						<input type="checkbox" name="operateurs[]" value="orange" />Orange
						<input type="checkbox" name="operateurs[]" value="sfr" />SFR
						<input type="checkbox" name="operateurs[]" value="bouygues" />Bouygues
						<input type="checkbox" name="operateurs[]" value="free" />Free
						<input type="checkbox" name="operateurs[]" value="virgin" />Virgin
						<input type="checkbox" name="operateurs[]" value="autres" />Autres
						<p/>

						<label>Service(s) :</label><p/>
						<select name="services[]" multiple="10">
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
					
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>