<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Validation de la modification des relations…</title>
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
                            
                            foreach ($_POST['relations'] as $idTypeRelation) {
                                $resultatRelation = mysqli_query($bdd, "SELECT * FROM relation WHERE idCompteSource=" . $idCompte . " AND idCompteDestinataire=" . $_POST['idCompteDestinataire'] ." AND idTypeRelation=" . $idTypeRelation . ";");
                                if ($resultatRelation) {
                                    if (mysqli_num_rows($resultatRelation) == 0) {
                                        // Sauvegarde des relations d'un compte dans la base de données.
                                        $requeteRelations = miseAJourRelationsBDD('relation', $idCompte, $_POST['idCompteDestinataire'], $idTypeRelation);
                                        
                                        // Récupération du résultat de la requête via la base de données.
                                        $resultatRelations = mysqli_query ($bdd, $requeteRelations);
                                    }
                                }
                            }
                            
                            $resultatRelationsASupprimer = mysqli_query($bdd, "SELECT * FROM relation WHERE idCompteSource=" . $idCompte . " AND idCompteDestinataire=" . $_POST['idCompteDestinataire'] .";");
                            if ($resultatRelationsASupprimer) {
                                if (mysqli_num_rows($resultatRelationsASupprimer) >= 1) {
                                    while ($ligne = mysqli_fetch_row($resultatRelationsASupprimer)) {
                                        if (!in_array($ligne[3], $_POST['relations']))
                                            $resultatRelationASupprimer = mysqli_query($bdd, "DELETE FROM relation WHERE idCompteSource=" . $idCompte . " AND idCompteDestinataire=" . $_POST['idCompteDestinataire'] ." AND idTypeRelation =" . $ligne[3] . ";");
                                    }
                                }
                            }
                            
                            // Si la modification des relations d'un compte de la base de données a été entièrement réalisée…
                            if ($resultatRelationsASupprimer) {
                                $requeteEvenement = ajoutEvenementBDD("evenement", $idCompte, 2, "");
                                $resultatEvenement = mysqli_query ($bdd, $requeteEvenement);
                                
                                echo ("<big>La modification a été réalisée !<br/>\nVeuillez cliquer sur le lien suivant pour retourner sur la page d'affichage de votre profil :<br/>\n<a href='../profil/affichageProfil.php'>Afficher le profil du compte</a></big>");
                                
                            // Sinon…
                            } else {
                                echo ("<big>La modification n'a pas pu aboutir.<br/>\nLa raison est la suivante :<br/>\n");
                                echo (mysqli_error($bdd) . "<br/>");
                                echo ("<a href='../profil/affichageProfil.php'>Afficher le profil du compte</a></big>");
                            }
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->

    </body>
</html>