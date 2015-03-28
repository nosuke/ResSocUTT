<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Accueil</title>
		<meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleAccueil.css" media="screen" />
	</head>

	<body>

		<div id="global">

			<?php include "./entete.html"; ?>

			<div id="centre">
				<div id="contenu">
					<h2>Accueil</h2>
					<br/>
					<br/>
					
					Bienvenue sur le site de Florent Lucet !
					<br/>
					<br/>
					
					Vous pouvez naviguer dans les divers accueils et exercices de TP avec la barre de menus présente en haut de votre écran.
					<br/>
					Celle-ci comporte l'accès à tous les TP et au projet de l'UV LO07.
					<br/>
					<br/>
					
					Vous pouvez également naviguer de TP en TP, et d'exercice en exercice, grâce à un menu de navigation qui s'affichera dès le premier TP, à gauche de votre écran.
					<br/>
					<br/>
					
					Bonne navigation !
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "./pied.html"; ?>

		</div><!-- #global -->

	</body>
</html>