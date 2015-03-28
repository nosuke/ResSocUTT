<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Erreur 404</title>
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
                            
                            // Définition des variables.
                            $email_webmaster = 'florent.lucet@utt.fr';

                            // Information à personnaliser.
                            $email_sujet = 'Erreur 404 sur le site';
                            $email_message = 'Bonjour. Une erreur 40 viens de se produire sur le site web que vous gérez.'."n";
                            $email_message .= 'Voici des informations sur ce site :'."n";
                            $email_message .= 'Heure : '.date("d/m/Y H:i")."n";
                            $email_message .= 'Page concernée : '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."n";
                            if(isset($_SERVER['HTTP_REFERER'])) $email_message .= 'Page précédente : '.$_SERVER['HTTP_REFERER']."n";
                            $email_message .= 'Adresse IP du visiteur : '.$_SERVER['REMOTE_ADDR']."n";
                            $email_message .= 'User agent : '.$_SERVER['HTTP_USER_AGENT'];

                            // Envoyer l'email.
                            @mail($email_webmaster, $email_sujet, $email_message, "FROM: Erreur_404");

                            echo ("<big><h1>Erreur 404</h1><br/>\n");
                            echo ("Cette page n'a pas été trouvée sur le serveur.<br/>\nElle n'existe pas ou n'existe plus.<br/>\nCe problème a été signalé à l'administrateur du site.<br/><br/>\n\n");
                            echo ("Veuillez cliquer sur le lien suivant pour revenir à la page d'accueil :<br/>\n<a href='../accueil/accueil.php'>Revenir à la page d'accueil</a></big>");
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->
    </body>
</html>