<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
    <title>Bienvenue sur ResSocUTT !</title>
    <meta name="auteur" content="Florent LUCET" />
    <meta name="sujet" content="Projet de LO07" />
    <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../styles/modeleAccueil.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../styles/boutons.css" media="screen" />
    </head>

    <body>

        <div id="global">
            
            <?php
                session_start();
    
                if(!isset($_SESSION['identifiant']) || $_SESSION['identifiant'] == "") {
            ?>
            
                    <?php include "./enteteAccueil.html"; ?>
            
                    <div id="contenu">
                        <br/><br/>
                            <div id="cGauche">
                                <b><font size="3" color="#0F056B"> Vous êtes sur ResSocUTT, le premier réseau social de l'UTT !</font></b>
                                <br/><br/>
                                <img src="../images/diverses/UTT1.jpg"/>
                                <br/><br/>
                                <b><font size="3" color="#0F056B"> À l'UTT et toujours pas inscrit ?
                                <br/>
                                Il n'est jamais trop tard pour le faire !
                                <br/><br/>
                                Inscrivez-vous en remplissant le formulaire d'inscription.</font></b>
                            </div><!-- #gauche -->

                            <div id="cDroite" class="coin">
                                <font size ="1" color="#303030"><h1>Inscription</h1></font>
                                <br/>

                                <form method="POST" action="./validationInscription.php">
                                    <font size ="2" color="#303030">
                                    <input type="text" name="prenom" size="20" maxlength="30" placeholder="Prénom" required="" />
                                    <p/>
                                    <input type="text" name="nom" size="20" maxlength="30" placeholder="Nom de famille" required="" />
                                    <p/>
                                    <input type="radio" name="sexe" value="Homme" checked="" />Homme
                                    <input type="radio" name="sexe" value="Femme" />Femme
                                    <p/>
                                    <br/>

                                    <label>Programme</label><p/>
                                    <select name="programme">
                                        <option>ISI</option>
                                        <option>MTE</option>
                                        <option>PMOM</option>
                                        <option>SI</option>
                                        <option>SIT</option>
                                        <option>SM</option>
                                        <option>SRT</option>
                                        <option>TC</option>
                                    </select>
                                    <input type="radio" name="visibiliteProgramme" value="Public" checked="" />Public
                                    <input type="radio" name="visibiliteProgramme" value="Amis" />Amis
                                    <input type="radio" name="visibiliteProgramme" value="Privé" />Privé
                                    <p/>
                                    <label>Semestre</label><p/>
                                    <select name="semestre">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                    <input type="radio" name="visibiliteSemestre" value="Public" checked="" />Public
                                    <input type="radio" name="visibiliteSemestre" value="Amis" />Amis
                                    <input type="radio" name="visibiliteSemestre" value="Privé" />Privé
                                    <p/>
                                    <br/>

                                    <input type="text" name="identifiant" size="20" maxlength="30" placeholder="Identifiant" required="" />
                                    <p/>
                                    <input type="password" name="motDePasse" size="20" maxlength="30" placeholder="Mot de passe" required="" />
                                    <p/>

                                    <div align="right"><input type="submit" name="inscription" value="S'inscrire !" class="button blue glossy glass xs" />
                                </form>
                            </div><!-- #gauche -->
                    </div><!-- #centre -->
                    
                    <?php include "../general/pied.html"; ?>
                    
            <?php
                } else {
                    header('Location: ../profil/affichageProfil.php');
                }
            ?>
        </div><!-- #global -->
    </body>
</html>