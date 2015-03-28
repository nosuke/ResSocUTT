<!DOCTYPE html>
<html>
    <head>
        <title>TP 7 : exercice 2, partie action</title>
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
					<ul>
						<li><p><a href="./EX2_formulaire.php">Partie formulaire</a></p></li>
					</ul>
				</div><!-- #navigation -->

				<div id="contenu">
					<h2>Gestion Web des modules, partie action</h2>
					<br/>

					<?php
						require_once 'EX1_WBCcharte.php';
						require_once 'EX1_Cmodule.php';
						
						$module = new Module();
						$module->setSigle($_GET["sigle"]);
						$module->setLabel($_GET["label"]);
						$module->setCategorie($_GET["categorie"]);
						$module->setEffectif($_GET["effectif"]);
						
						if ($module->valide()) {
							$module->pageOK();
							echo ($module->sauveTXT() . "<br />\n");
							echo ($module->sauveBDR("module") . "<br />\n");
							$module->pageFoot();
						} else {
							$module->pageKO();
						}
					?>

				</div><!-- #contenu -->
			</div><!-- #centre -->

			<?php include "../general/pied.html"; ?>

		</div><!-- #global -->

    </body>
</html>