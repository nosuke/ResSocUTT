<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
	<title>Accès refusé</title>
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
                            
                            echo ("<big><h1>Accès refusé</h1><br/>\n");
                            echo ("Vous entrez sur une zone réservée (soit aux membres en général, soit uniquement à l'administrateur).<br/>\nSon accès est restreint et vous n'êtes pas autorisé à y accéder.<br/><br/>\n\n");
                            echo ("Veuillez cliquer sur le lien suivant pour revenir à la page d'accueil :<br/>\n<a href='../accueil/accueil.php'>Revenir à la page d'accueil</a></big>");
                        ?>
                    </div><!-- #contenu -->
                </div><!-- #centre -->
            </div><!-- #global -->
        </td></tr></table><!--#page-table-->
    </body>
</html>