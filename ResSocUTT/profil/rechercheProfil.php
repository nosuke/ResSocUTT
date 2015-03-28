<!DOCTYPE html>
<html>
    <head>
        <title>Rechercher un membre</title>
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
                            <form method="POST" action="./resultatRechercheProfil.php">
                                <h1>Recherche de membres</h1>
                                <br>
                                
                                <label><b>Sexe</b></label><p/>
                                <input type="radio" name="sexe" value="Tous" checked="" />Tous
                                <input type="radio" name="sexe" value="Homme" />Homme
                                <input type="radio" name="sexe" value="Femme" />Femme
                                <p/>
                                <br/>

                                <label><b>Programme</b></label><p/>
                                <select name="programme">
                                    <option> </option>
                                    <option>ISI</option>
                                    <option>MTE</option>
                                    <option>PMOM</option>
                                    <option>SI</option>
                                    <option>SIT</option>
                                    <option>SM</option>
                                    <option>SRT</option>
                                    <option>TC</option>
                                </select>
                                <p/>
                                <label><b>Semestre</b></label><p/>
                                <select name="semestre">
                                    <option> </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                                <p/>
                                <br/>
                                
                                <label><b>Relations</b></label><p/>
                                <input type="radio" name="relations" value="Peu importe" checked="" />Peu importe
                                <input type="radio" name="relations" value="Toutes mes relations" />Toutes mes relations
                                <input type="radio" name="relations" value="Toutes mes non-relations" />Toutes mes non-relations
                                <br/>
                                <input type="radio" name="relations" value="Je le connais" />Je le connais
                                <input type="radio" name="relations" value="Je travaille avec" />Je travaille avec
                                <input type="radio" name="relations" value="Je suis ami avec" />Je suis ami avec
                                <input type="radio" name="relations" value="Je flashe sur" />Je flashe sur
                                <p/>
                                <br/>
                                
                                <div align="right"><input type="submit" name="recherche" value="Rechercher" class="button blue glossy glass xs" />
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
