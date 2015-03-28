<!DOCTYPE html>
<html>
    <head>
        <title>Table de tra&#231;age des &#233;v&#232;nements</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/menuAccordeon.css" media="screen" />
    </head>

    <body>

        <div id="global">
            
            <?php
                session_start();
    
                if(!isset($_SESSION['identifiant']) || $_SESSION['identifiant'] == "") header('Location: ../general/accesRefuse.php');
                else {
            ?>
            
                    <?php include "../general/entete.html"; ?>
                    <br/>
                    
                    <div id="centre">
                        <div id="navigation" class="coin">
                            <ul>
                                <li><p><a href="../profil/affichageProfil.php">Afficher votre profil</a></p></li>
                                <li><p><a href="../profil/modificationProfil.php">Modifier votre profil</a></p></li>
                                <li><p><a href="../profil/galerieImages.php">G&#233;rer votre galerie d'images</a></p></li>
                                <li><p><a href="../profil/rechercheProfil.php">Rechercher un membre</a></p></li>
                            </ul>
                            <ul>
                            <?php if ($_SESSION['identifiant'] == "admin") { ?>
                                <li><p><a href="../administration/tableTracageAdministration.php">Table de tra&#231;age (administration)</a></p></li>
                                <li><p><a href="../administration/informationsTracageAdministration.php">Informations de tra&#231;age (administration)</a></p></li>
                            <?php } ?>
                                <li><p><a href="../profil/deconnexion.php">Se d&#233;connecter</a></p></li>
                            </ul>
                        </div><!-- #navigation -->

                        <div id="contenu" class="coin">
                            <h1>Table de tra&#231;age des &#233;v&#232;nements</h1>
                            <br>
                            
                            <?php
                                require('../bdd/connexionBDD.php');
                                
                                //$resultatListeEvenements = mysqli_query($bdd, "SELECT * FROM evenement ORDER BY idEvenement;");
                                $resultatListeEvenements = mysqli_query($bdd, "SELECT idEvenement, identifiant, nomTypeEvenement, descriptionEvenement, dateEvenement FROM compte JOIN evenement USING (idCompte) JOIN type_evenement USING (idTypeEvenement) ORDER BY idEvenement;");
                                if ($resultatListeEvenements) {
                                    if (mysqli_num_rows($resultatListeEvenements) >= 1) {
                            ?>
                                        <table border="1" cellspacing="2" cellspading="5">
                                            <thead>
                                                <tr>
                                                    <th>Identifiant de l'&#233;v&#232;nement</th>
                                                    <th>Compte de l'&#233;v&#232;nement</th>
                                                    <th>Type de l'&#233;v&#232;nement</th>
                                                    <th>Description de l'&#233;v&#232;nement</th>
                                                    <th>Date de l'&#233;v&#232;nement</th>
                                                    <th>Heure de l'&#233;v&#232;nement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                                        while ($ligne = mysqli_fetch_row($resultatListeEvenements)) {
                                            echo "<tr>";
                                            echo "<td>" . $ligne[0] . "</td>";
                                            echo "<td><a href='../profil/affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></td>";
                                            echo "<td>" . $ligne[2] . "</td>";
                                            echo "<td>" . $ligne[3] . "</td>";
                                            echo "<td>" . date("d/m/Y", strtotime($ligne[4])) . "</td>";
                                            echo "<td>" . date("H:i:s", strtotime($ligne[4])) . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    } else echo("Aucun profil n'a effectué d'évènement.");
                                } else echo("Aucun profil n'a effectué d'évènement.");
                            ?>
                            
                        </div><!-- #contenu -->
                    </div><!-- #centre -->

                    <?php include "../general/pied.html"; ?>

            <?php
                }
            ?>
            
	</div><!-- #global -->
    </body>
</html>