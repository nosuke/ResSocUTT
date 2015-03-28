<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Validation de l'ajout d'une photo…</title>
	<meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="Projet de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../styles/modeleMessage.css" media="all" />
    </head>

    <body>

        <table id="page-table"><tr><td id="page-td">
            <div id="global">
                <div id="centre">
                    <div id="contenu" class="coin">
                        <?php
                            session_start();
                            
                            // Ouverture de la base de données.
                            require('../bdd/connexionBDD.php');
                            
                            // Ouverture des fonctions concernant la base de données.
                            require('../bdd/fonctionsBDD.php');
                            
                            
                            // Recherche de l'identifiant correspondant au compte de l'utilisateur actuel du site.
                            $resultatIdCompte = mysqli_query($bdd, "SELECT idCompte FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                            if ($resultatIdCompte) {
                                if (mysqli_num_rows($resultatIdCompte) == 1)
                                    while ($ligne = mysqli_fetch_row($resultatIdCompte)) {
                                        $idCompte = $ligne[0];
                                    }
                            }
                            
                            
                            /********************************************************
                             *** DÉFINITION DES CONSTANTES, TABLEAUX ET VARIABLES ***
                             ********************************************************/
                            
                            // Constantes.
                            define('TARGET', '../images/photos/'); // Répertoire cible.
                            define('MAX_SIZE', 10485760); // Taille max en octets du fichier.
                            define('WIDTH_MAX', 800); // Largeur max de l'image en pixels.
                            define('HEIGHT_MAX', 800); // Hauteur max de l'image en pixels.

                            // Tableaux de données.
                            $tabExt = array('jpg','gif','png','jpeg'); // Extensions autorisées.
                            $infosImg = array();
                            
                            // Variables.
                            $extension = '';
                            $message = '';
                            $nomImage = '';
                            
                            
                            /**************************************************
                             *** CRÉATION DU RÉPERTOIRE CIBLE SI INEXISTANT ***
                             **************************************************/
                            
                            if( !is_dir(TARGET.$idCompte) ) {
                                if( !mkdir(TARGET.$idCompte, 0755) )
                                    exit('Erreur : le répertoire cible ne peut être créé ! Vérifiez que vous disposez des droits suffisants pour le faire ou créez-le manuellement !');
                            }
                            
                            
                            /*******************************
                             *** SCRIPT DE TÉLÉVERSEMENT ***
                             *******************************/
                            
                            if(!empty($_POST)) {
                                // On vérifie si le champ est rempli.
                                if(!empty($_FILES['photo']['name'])) {
                                    // Récupération de l'extension du fichier.
                                    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                                    // On vérifie l'extension du fichier.
                                    if(in_array(strtolower($extension),$tabExt)) {
                                        // On récupère les dimensions du fichier.
                                        $infosImg = getimagesize($_FILES['photo']['tmp_name']);
                                        // On vérifie le type de l'image.
                                        if($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                                            // On vérifie les dimensions et la taille de l'image.
                                            if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE)) {
                                                // Parcours du tableau d'erreurs.
                                                if(isset($_FILES['photo']['error']) && UPLOAD_ERR_OK === $_FILES['photo']['error']) {
                                                    // On renomme le fichier.
                                                    $nomImage = md5(uniqid()) .'.'. $extension;
                                                    // Si c'est OK, on teste le téléversement.
                                                    if(move_uploaded_file($_FILES['photo']['tmp_name'], TARGET.$idCompte."/".$nomImage)) {
                                                        // Ajout d'une photo dans la base de données.
                                                        $requetePhoto = ajoutPhotoBDD('photo', $idCompte, TARGET.$idCompte."/".$nomImage);

                                                        // Récupération du résultat de la requête via la base de données.
                                                        $resultatPhoto = mysqli_query ($bdd, $requetePhoto);
                                                        
                                                        $message = 'La photographie a été téléversée sur le serveur.';
                                                    } else {
                                                        // Sinon, on affiche une erreur système.
                                                        $message = 'Problème lors du téléversement !';
                                                    }
                                                } else {
                                                    $message = 'Une erreur interne a empêché le téléversement de l\'image';
                                                }
                                            } else {
                                                // Sinon, erreur sur les dimensions et la taille de l'image.
                                                $message = 'Erreur dans les dimensions de l\'image !';
                                            }
                                        } else {
                                            // Sinon, erreur sur le type de l'image.
                                            $message = 'Le fichier à téléverser n\'est pas une image !';
                                        }
                                    } else {
                                        // Sinon, on affiche une erreur pour l'extension.
                                        $message = 'L\'extension du fichier est incorrecte !';
                                    }
                                } else {
                                    // Sinon, on affiche une erreur pour le champ vide.
                                    $message = 'Veuillez remplir le formulaire !';
                                }
                            }
                            
                            
                            // Si l'ajout d'une photo dans la base de données a été réalisé…
                            if ($resultatPhoto) {
                                $requeteEvenement = ajoutEvenementBDD("evenement", $idCompte, 3, "");
                                $resultatEvenement = mysqli_query ($bdd, $requeteEvenement);
                                
                                echo ("<big>L'ajout de l'image a été réalisé ! " . $message . "<br/>\nVeuillez cliquer sur le lien suivant pour retourner à la galerie d'images :<br/>\n<a href='./galerieImages.php'>Retourner à la galerie d'images</a></big>");
                            }
                            
                            // Sinon…
                            else {
                                echo ("<big>La modification n'a pas pu aboutir.<br/>\nLa raison est la suivante :<br/>\n");
                                echo ($message . "<br/>");
                                echo (mysqli_error($bdd) . "<br/>");
                                echo ("<a href='./galerieImages.php'>Retourner à la galerie d'images</a></big>");
                            }
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->

    </body>
</html>