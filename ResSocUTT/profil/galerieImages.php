<!DOCTYPE html>
<html>
    <head>
        <title>Gestion de la galerie d'images</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/boutons.css" media="screen" />
    </head>

    <body>

        <div id="global">
            
            <?php
                session_start();
    
                if(!isset($_SESSION['identifiant']) || $_SESSION['identifiant'] == "") header('Location: ../general/accesRefuse.php');
                else {
                    if (isset($_GET['pageIdentifiant']) && $_GET['pageIdentifiant'] <> "") $pageIdentifiant = $_GET['pageIdentifiant'];
                    else $pageIdentifiant = $_SESSION['identifiant'];
            ?>
            
                    <?php include "../general/entete.html"; ?>
                    <br/>
                    
                    <div id="centre">
                        <div id="navigation" class="coin">
                            <ul>
                                <li><p><a href="./affichageProfil.php">Afficher votre profil</a></p></li>
                                <li><p><a href="./modificationProfil.php">Modifier votre profil</a></p></li>
                                <li><p><a href="./galerieImages.php">Gérer votre galerie d'images</a></p></li>
                                <li><p><a href="./rechercheProfil.php">Rechercher un membre</a></p></li>
                            </ul>
                            <ul>
                            <?php if ($_SESSION['identifiant'] == "admin") { ?>
                                <li><p><a href="../administration/tableTracageAdministration.php">Table de traçage (administration)</a></p></li>
                                <li><p><a href="../administration/informationsTracageAdministration.php">Informations de traçage (administration)</a></p></li>
                            <?php } ?>
                                <li><p><a href="./deconnexion.php">Se déconnecter</a></p></li>
                            </ul>
                        </div><!-- #navigation -->

                        <div id="contenu" class="coin">
                            <?php
                                require('../bdd/connexionBDD.php');
                                
                                $resultatAffichage = mysqli_query($bdd, "SELECT * FROM compte WHERE identifiant='" . $pageIdentifiant . "';");
                                if ($resultatAffichage) {
                                    if (mysqli_num_rows($resultatAffichage) == 1)
                                        while ($ligne = mysqli_fetch_row($resultatAffichage)) {
                                            $idCompteAffichage = $ligne[0];
                                        }
                                }
                                
                                
                                echo ("<h2>Galerie d'images de " . $pageIdentifiant . "</h2>");
                                echo ("<p/><br/>");
                                
                                $resultatAffichagePhotos = mysqli_query($bdd, "SELECT * FROM photo WHERE idCompte='" . $idCompteAffichage . "';");
                                if ($resultatAffichagePhotos) {
                                    if (mysqli_num_rows($resultatAffichagePhotos) >= 1) {
                                        while ($ligne = mysqli_fetch_row($resultatAffichagePhotos))
                                            echo "<img src='" . $ligne[2] . "' />";
                                    } else echo "Aucune photo n'est présente dans cette galerie.";
                                }
                                echo ("<p/><br/>");
                            ?>
                            
                            <form method="POST" action="validationPhoto.php" enctype="multipart/form-data">
                                <label>Fichier de la photographie (tous formats | max. 10 Mo) :</label>
                                <input type="file" name="photo" />
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <div align="right"><input type="submit" name="envoiPhoto" value="Téléverser" class="button blue glossy glass xs" />
                            </form>
                                
                        </div><!-- #contenu -->
                    </div><!-- #centre -->

                    <?php include "../general/pied.html"; ?>

            <?php
                }
            ?>
            
	</div><!-- #global -->
    </body>
</html>