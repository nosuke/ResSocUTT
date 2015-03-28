<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Validation de la connexion…</title>
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
                            // On teste si le visiteur a soumis le formulaire de connexion…
                            if (isset($_POST['connexion'])) {
                                if ((isset($_POST['identifiantConnexion']) && !empty($_POST['identifiantConnexion'])) && (isset($_POST['motDePasseConnexion']) && !empty($_POST['motDePasseConnexion']))) {

                                    // Ouverture de la base de données.
                                    require('../bdd/connexionBDD.php');

                                    // On teste si une entrée de la base contient ce couple identifiant-motDePasse.
                                    $requeteConnexion = 'SELECT count(*) FROM compte WHERE identifiant="'.mysqli_escape_string($bdd, $_POST['identifiantConnexion']).'" AND motDePasse="'.mysqli_escape_string($bdd, $_POST['motDePasseConnexion']).'"';
                                    $resultatConnexion = mysqli_query($bdd, $requeteConnexion) or die('Erreur SQL !<br />' . $requeteConnexion . '<br />' . mysqli_error($bdd));
                                    $data = mysqli_fetch_row($resultatConnexion);

                                    mysqli_free_result($resultatConnexion);
                                    mysqli_close($bdd);

                                    // Si on obtient une réponse, alors l'utilisateur est un membre.
                                    if ($data[0] == 1) {
                                        session_start();
                                        $_SESSION['identifiant'] = $_POST['identifiantConnexion'];
                                        header('Location: ../profil/affichageProfil.php');
                                        exit();
                                    }
                                    // Si on ne trouve aucune réponse, alors le visiteur s'est trompé soit dans son identifiant, soit dans son mot de passe.
                                    elseif ($data[0] == 0) {
                                        $erreur = "Compte non reconnu. Vous vous êtes trompé soit dans votre identifiant, soit dans votre mot de passe.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a>";
                                    }
                                    // Sinon, plusieurs membres ont les mêmes identifiants de connexion, ce qui n'est pas censé arriver.
                                    else {
                                        $erreur = "Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a>";
                                    }
                                }
                                else {
                                    $erreur = "Au moins un des champs est vide.<br/> <a href='./accueil.php'>Retourner à la page d'accueil</a>";
                                }
                                echo ("<big>$erreur</big>");
                            }
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->

    </body>
</html>