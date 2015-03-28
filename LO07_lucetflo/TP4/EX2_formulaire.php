<!DOCTYPE html>
<html>
    <head>
        <title>TP 4 : exercice 2, partie formulaire</title>
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
						<li><p><a href="./EX1_formulaire_action.php">Exercice précédent</a></p></li>
						<li><p><a href="./EX3_formulaire_action.php">Exercice suivant</a></p></li>
					</ul>
					<ul>
						<li><p><a href="./EX2_formulaire_action.php">Partie formulaire et action</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Site de développement de photos, partie formulaire</h2>
					<br/>

					Bonjour. Si vous le souhaitez, vous pouvez nous laisser jusqu'à trois photographies en même temps. <br/>
					Vous pouvez aussi nous laisser nom, prénom et adresse email qui seront attachés à vos photographies. <br/>
					Cela permettra à autrui de connaître l'auteur des photographies et de vous recontacter. <br/> <br/>
					<form method="post" action="EX2_action.php" enctype="multipart/form-data">
						<label>Photographie 1 :</label>
						<input type="file" name ="photo1" />
						<p/>
						<label>Photographie 2 :</label>
						<input type="file" name ="photo2" />
						<p/>
						<label>Photographie 3 :</label>
						<input type="file" name ="photo3" />
						<p/>

						<label>Nom :</label>
						<input type="text" name ="nom" />
						<p/>
						<label>Prénom :</label>
						<input type="text" name="prenom" />
						<p/>
						<label>Email :</label>
						<input type="text" name="email" />
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