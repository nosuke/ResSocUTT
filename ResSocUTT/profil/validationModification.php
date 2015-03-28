<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Validation de la modification…</title>
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
                            
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Public".
                            $resultatPublic = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Public';");
                            if ($resultatPublic) {
                                while ($ligne = mysqli_fetch_row($resultatPublic)) $idPublic = $ligne[0];
                            } else echo ("<big>La modification n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Amis".
                            $resultatAmis = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Amis';");
                            if ($resultatAmis) {
                                while ($ligne = mysqli_fetch_row($resultatAmis)) $idAmis = $ligne[0];
                            } else echo ("<big>La modification n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            // Recherche de l'identifiant correspondant au type de visibilité "Privé".
                            $resultatPrive = mysqli_query($bdd, "SELECT idTypeVisibilite FROM type_visibilite WHERE nomTypeVisibilite = 'Prive';");
                            if ($resultatPrive) {
                                while ($ligne = mysqli_fetch_row($resultatPrive)) $idPrive = $ligne[0];
                            } else echo ("<big>La modification n'a pas pu aboutir.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a></big>");
                            
                            // Sauvegarde d'un compte dans la base de données.
                            $requeteCompte = miseAJourCompteBDD('compte', $idPublic, $idAmis, $idPrive, $_SESSION['identifiant']);
                            
                            // Récupération du résultat de la requête via la base de données.
                            $resultatCompte = mysqli_query ($bdd, $requeteCompte);
                            
                            
                            // Recherche de l'identifiant correspondant au compte de l'utilisateur actuel du site.
                            $resultatIdCompte = mysqli_query($bdd, "SELECT idCompte FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                            if ($resultatIdCompte) {
                                if (mysqli_num_rows($resultatIdCompte) == 1)
                                    while ($ligne = mysqli_fetch_row($resultatIdCompte)) {
                                        $idCompte = $ligne[0];
                                    }
                            }
                            
                            foreach ($_POST['competences'] as $idTypeCompetence) {
                                $resultatCompetence = mysqli_query($bdd, "SELECT * FROM competence WHERE idCompte=" . $idCompte . " AND idTypeCompetence=" . $idTypeCompetence . ";");
                                if ($resultatCompetence) {
                                    if (mysqli_num_rows($resultatCompetence) == 0) {
                                        // Sauvegarde des compétences d'un compte dans la base de données.
                                        $requeteCompetences = miseAJourCompetencesBDD('competence', $idCompte, $idTypeCompetence);

                                        // Récupération du résultat de la requête via la base de données.
                                        $resultatCompetences = mysqli_query ($bdd, $requeteCompetences);
                                    }
                                }
                            }
                            
                            $resultatCompetencesASupprimer = mysqli_query($bdd, "SELECT * FROM competence WHERE idCompte=" . $idCompte . ";");
                            if ($resultatCompetencesASupprimer) {
                                if (mysqli_num_rows($resultatCompetencesASupprimer) >= 1) {
                                    while ($ligne = mysqli_fetch_row($resultatCompetencesASupprimer)) {
                                        if (!in_array($ligne[2], $_POST['competences']))
                                            $resultatCompetenceASupprimer = mysqli_query($bdd, "DELETE FROM competence WHERE idCompte=" . $idCompte . " AND idTypeCompetence =" . $ligne[2] . ";");
                                    }
                                }
                            }
                            
                            // Si la modification d'un compte de la base de données a été entièrement réalisée…
                            if ($resultatCompte && $resultatCompetencesASupprimer) {
                                $requeteEvenement = ajoutEvenementBDD("evenement", $idCompte, 1, "");
                                $resultatEvenement = mysqli_query ($bdd, $requeteEvenement);
                                
                                echo ("<big>La modification a été réalisée !<br/>\nVeuillez cliquer sur le lien suivant pour retourner sur la page d'affichage de votre profil :<br/>\n<a href='../profil/affichageProfil.php'>Afficher le profil du compte</a></big>");
                            
                            // Sinon…
                            } else {
                                echo ("<big>La modification n'a pas pu aboutir.<br/>\nLa raison est la suivante :<br/>\n");
                                echo (mysqli_error($bdd) . "<br/>");
                                echo ("<a href='./modificationProfil.php'>Retourner à la page de modification du profil</a></big>");
                            }
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->

    </body>
</html>