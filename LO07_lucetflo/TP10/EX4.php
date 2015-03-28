<!DOCTYPE html>
<html>
    <head>
        <title>TP 10 : exercice 4</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!-- La feuille de styles "base.css" doit être appelée en premier. -->
		<link rel="stylesheet" type="text/css" href="../styles/base.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />

		<script language="JavaScript" type="text/javascript">
			function ajoutUTSEUS() {
				var liste = document.getElementById("universite");
				var nouveauNoeud = document.createElement("li");
				nouveauNoeud.innerHTML = "UTSEUS";
				liste.appendChild(nouveauNoeud);
			}
			
			function suppressionPremierElement() {
				var liste = document.getElementById("universite");
				if (liste.childNodes.length > 0) {
					liste.removeChild(liste.firstChild);
				}
			}
			
			function modificationContenuUTT() {
				document.getElementById("utt").innerHTML = "bonjour à tous les lo07";
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
						<li><p><a href="./EX3.php">Exercice précédent</a></p></li>
						<li><p><a href="../../ResSocUTT/">Projet</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>JavaScript et DOM</h2>
					<br/>

					<ul id="universite">
						<li id ="utt">UTT</li>
						<li>UTC</li>
						<li>UTBM</li>
					</ul>
					
					<input type="button" onclick="ajoutUTSEUS();" value="Ajout de l'élément UTSEUS à la liste" />
					<br/>
					<input type="button" onclick="suppressionPremierElement();" value="Suppression du premier élément de la liste" />
					<br/>
					<input type="button" onclick="modificationContenuUTT();" value="Modification du contenu de l'élément UTT" />
				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>