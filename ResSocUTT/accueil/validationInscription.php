<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Validation de l'inscription…</title>
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
                            // Ouverture de la base de données.
                            require('../bdd/connexionBDD.php');
                            
                            // Ouverture des fonctions concernant la base de données.
                            require('../bdd/fonctionsBDD.php');
                            
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Public".
                            $resultatPublic = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Public';");
                            if ($resultatPublic) {
                                while ($ligne = mysqli_fetch_row($resultatPublic)) $idPublic = $ligne[0];
                            } else echo ("<big>L'inscription n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Amis".
                            $resultatAmis = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Amis';");
                            if ($resultatAmis) {
                                while ($ligne = mysqli_fetch_row($resultatAmis)) $idAmis = $ligne[0];
                            } else echo ("<big>L'inscription n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Privé".
                            $resultatPrive = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Prive';");
                            if ($resultatPrive) {
                                while ($ligne = mysqli_fetch_row($resultatPrive)) $idPrive = $ligne[0];
                            } else echo ("<big>L'inscription n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            
                            // Sauvegarde d'un compte dans la base de données.
                            $requeteCompte = sauveCompteBDD('compte', $idPublic, $idAmis, $idPrive);
                            
                            // Récupération du résultat de la requête via la base de données.
                            $resultatCompte = mysqli_query ($bdd, $requeteCompte);
                            
                            
                            // Si la sauvegarde d'un compte dans la base de données a été réalisée…
                            if ($resultatCompte) {
                                session_start();
                                $_SESSION['identifiant'] = $_POST['identifiant'];
                                
                                $resultatAffichage = mysqli_query($bdd, "SELECT * FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                                if ($resultatAffichage) {
                                    if (mysqli_num_rows($resultatAffichage) == 1)
                                        while ($ligne = mysqli_fetch_row($resultatAffichage)) {
                                            $idCompte = $ligne[0];
                                        }
                                }
                                
                                $requeteEvenement = ajoutEvenementBDD("evenement", $idCompte, 0, "");
                                $resultatEvenement = mysqli_query ($bdd, $requeteEvenement);
                                
                                echo ("<big>L'inscription a été réalisée !<br/>\nVeuillez cliquer sur le lien suivant pour vous connecter sur votre compte :<br/>\n<a href='../profil/affichageProfil.php'>Afficher le profil du compte</a></big>");
                            
                            // Sinon…
                            } else {
                                echo ("<big>L'inscription n'a pas pu aboutir.<br/>\nLa raison est la suivante :<br/>\n");
                                if (mysqli_error($bdd) == "Duplicate entry '" . $_POST['identifiant'] . "' for key 'login'")
                                    echo ("L'identifiant '" . $_POST['identifiant'] . "' est déjà pris ! Veuillez choisir un autre identifiant.<br/>");
                                else echo (mysqli_error($bdd) . "<br/>");
                                echo ("<a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            }
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->

    </body>
</html>