<!DOCTYPE html>
<html>
    <head>
        <title>Modification du profil</title>
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
            
                    <?php require('../general/fonctions.php');
                    
                    include "../general/entete.html"; ?>
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
                                
                                $resultatAffichage = mysqli_query($bdd, "SELECT * FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                                if ($resultatAffichage) {
                                    if (mysqli_num_rows($resultatAffichage) == 1)
                                        while ($ligne = mysqli_fetch_row($resultatAffichage)) {
                                            $idCompteAffichage = $ligne[0];
                                            $motDePasseAffichage = $ligne[2];
                                            $prenomAffichage = $ligne[3];
                                            $nomAffichage = $ligne[4];
                                            $sexeAffichage = $ligne[5];
                                            $programmeAffichage = $ligne[6];
                                            $semestreAffichage = $ligne[7];
                                            $idVisibiliteProgrammeAffichage = $ligne[8];
                                            $idVisibiliteSemestreAffichage = $ligne[9];
                                            $idVisibiliteCompetencesAffichage = $ligne[10];
                                            $idVisibilitePhotosAffichage = $ligne[11];
                                        }
                                }
                            ?>
                            
                            
                            <form method="POST" action="./validationModification.php">
                                <h1>Modification du profil 
                                
                                <?php echo ($_SESSION['identifiant'] . "</h1><br>"); ?>
                                
                                <label><b>Prénom :</b></label><p/>
                                <input type="text" name="prenom" size="20" maxlength="30" value ="<?php echo $prenomAffichage; ?>" required="" />
                                <p/>
                                
                                <label><b>Nom :</b></label><p/>
                                <input type="text" name="nom" size="20" maxlength="30" value ="<?php echo $nomAffichage; ?>" required="" />
                                <p/>
                                
                                <label><b>Sexe :</b></label><p/>
                                <?php if ($sexeAffichage == "Homme") {
                                    echo('<input type="radio" name="sexe" value="Homme" checked="" />Homme');
                                    echo('<input type="radio" name="sexe" value="Femme" />Femme');
                                } else {
                                    echo('<input type="radio" name="sexe" value="Homme" />Homme');
                                    echo('<input type="radio" name="sexe" value="Femme" checked="" />Femme');
                                }
                                ?>
                                <p/>
                                <br/>
                                
                                
                                <label><b>Programme :</b></label><p/>
                                <select name="programme">
                                    <?php
                                        if ($programmeAffichage == "ISI") echo('<option selected="selected">ISI</option>');
                                        else echo('<option>ISI</option>');
                                        if ($programmeAffichage == "MTE") echo('<option selected="selected">MTE</option>');
                                        else echo('<option>MTE</option>');
                                        if ($programmeAffichage == "PMOM") echo('<option selected="selected">PMOM</option>');
                                        else echo('<option>PMOM</option>');
                                        if ($programmeAffichage == "SI") echo('<option selected="selected">SI</option>');
                                        else echo('<option>SI</option>');
                                        if ($programmeAffichage == "SIT") echo('<option selected="selected">SIT</option>');
                                        else echo('<option>SIT</option>');
                                        if ($programmeAffichage == "SM") echo('<option selected="selected">SM</option>');
                                        else echo('<option>SM</option>');
                                        if ($programmeAffichage == "SRT") echo('<option selected="selected">SRT</option>');
                                        else echo('<option>SRT</option>');
                                        if ($programmeAffichage == "TC") echo('<option selected="selected">TC</option>');
                                        else echo('<option>TC</option>');
                                    ?>
                                </select><p/>
                                
                                <?php
                                    if ($idVisibiliteProgrammeAffichage == 0) {
                                        echo('<input type="radio" name="visibiliteProgramme" value="Public" checked="" />Public');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Privé" />Privé');
                                    } else if ($idVisibiliteProgrammeAffichage == 1) {
                                        echo('<input type="radio" name="visibiliteProgramme" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Amis" checked="" />Amis');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Privé" />Privé');
                                    } else {
                                        echo('<input type="radio" name="visibiliteProgramme" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteProgramme" value="Privé" checked="" />Privé');
                                    }
                                ?>
                                <p/>
                                
                                <label><b>Semestre :</b></label><p/>
                                <select name="semestre">
                                    <?php
                                        if ($semestreAffichage == 1) echo('<option selected="selected">1</option>');
                                        else echo('<option>1</option>');
                                        if ($semestreAffichage == 2) echo('<option selected="selected">2</option>');
                                        else echo('<option>2</option>');
                                        if ($semestreAffichage == 3) echo('<option selected="selected">3</option>');
                                        else echo('<option>3</option>');
                                        if ($semestreAffichage == 4) echo('<option selected="selected">4</option>');
                                        else echo('<option>4</option>');
                                        if ($semestreAffichage == 5) echo('<option selected="selected">5</option>');
                                        else echo('<option>5</option>');
                                        if ($semestreAffichage == 6) echo('<option selected="selected">6</option>');
                                        else echo('<option>6</option>');
                                        if ($semestreAffichage == 7) echo('<option selected="selected">7</option>');
                                        else echo('<option>7</option>');
                                        if ($semestreAffichage == 8) echo('<option selected="selected">8</option>');
                                        else echo('<option>8</option>');
                                    ?>
                                </select><p/>
                                
                                <?php
                                    if ($idVisibiliteSemestreAffichage == 0) {
                                        echo('<input type="radio" name="visibiliteSemestre" value="Public" checked="" />Public');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Privé" />Privé');
                                    } else if ($idVisibiliteSemestreAffichage == 1) {
                                        echo('<input type="radio" name="visibiliteSemestre" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Amis" checked="" />Amis');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Privé" />Privé');
                                    } else {
                                        echo('<input type="radio" name="visibiliteSemestre" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteSemestre" value="Privé" checked="" />Privé');
                                    }
                                ?>
                                <p/>
                                
                                
                                <?php
                                    $competencesAffichage = "";
                                    $resultatCompetencesAffichage = mysqli_query($bdd, "SELECT nomTypeCompetence FROM competence JOIN type_competence USING (idTypeCompetence) WHERE idCompte = " . $idCompteAffichage . ";");
                                    if ($resultatCompetencesAffichage) {
                                        while ($ligne = mysqli_fetch_row($resultatCompetencesAffichage))
                                            $competencesAffichage .= $ligne[0] . ", ";
                                        $competencesAffichage = substr($competencesAffichage, 0, strlen($competencesAffichage)-2) . ".";
                                    }
                                ?>
                                
                                <label><b>Compétences :</b></label><p/>
                                <select name="competences[]" size=16 multiple="">
                                    <?php
                                        echo '<optgroup label="Bases de données">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "Merise", 10);
                                        objetListeDeroulanteCompetences($competencesAffichage, "PL/SQL", 12);
                                        objetListeDeroulanteCompetences($competencesAffichage, "SQL", 13);
                                        
                                        echo '<optgroup label="Divers">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "Connaissance des materiaux", 18);
                                        objetListeDeroulanteCompetences($competencesAffichage, "LaTeX", 7);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Reseaux", 16);
                                        objetListeDeroulanteCompetences($competencesAffichage, "UML", 14);
                                        
                                        echo '<optgroup label="Interfaces particulières">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "Access", 0);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Linux", 8);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Shell", 17);
                                        
                                        echo '<optgroup label="Langages informatiques logiciels">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "ASM", 2);
                                        objetListeDeroulanteCompetences($competencesAffichage, "C", 3);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Java", 6);
                                        objetListeDeroulanteCompetences($competencesAffichage, "OCaml", 9);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Visual Basic", 15);
                                        
                                        echo '<optgroup label="Langages informatiques webs">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "Ajax", 1);
                                        objetListeDeroulanteCompetences($competencesAffichage, "CSS", 4);
                                        objetListeDeroulanteCompetences($competencesAffichage, "HTML", 5);
                                        objetListeDeroulanteCompetences($competencesAffichage, "PHP", 11);
                                        
                                        echo '<optgroup label="Management">';
                                        objetListeDeroulanteCompetences($competencesAffichage, "Creation d'entreprise", 21);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Droit", 23);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Economie", 20);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Gestion des organisations", 19);
                                        objetListeDeroulanteCompetences($competencesAffichage, "Mercatique", 22);
                                    ?>
                                </select><p/>
                                
                                <?php
                                    if ($idVisibiliteCompetencesAffichage == 0) {
                                        echo('<input type="radio" name="visibiliteCompetences" value="Public" checked="" />Public');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Privé" />Privé');
                                    } else if ($idVisibiliteCompetencesAffichage == 1) {
                                        echo('<input type="radio" name="visibiliteCompetences" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Amis" checked="" />Amis');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Privé" />Privé');
                                    } else {
                                        echo('<input type="radio" name="visibiliteCompetences" value="Public" />Public');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibiliteCompetences" value="Privé" checked="" />Privé');
                                    }
                                ?>
                                <p/>
                                <br/>
                                
                                
                                <label><b>Galerie d'images :</b></label><p/>
                                <?php
                                    if ($idVisibilitePhotosAffichage == 0) {
                                        echo('<input type="radio" name="visibilitePhotos" value="Public" checked="" />Public');
                                        echo('<input type="radio" name="visibilitePhotos" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibilitePhotos" value="Privé" />Privé');
                                    } else if ($idVisibilitePhotosAffichage == 1) {
                                        echo('<input type="radio" name="visibilitePhotos" value="Public" />Public');
                                        echo('<input type="radio" name="visibilitePhotos" value="Amis" checked="" />Amis');
                                        echo('<input type="radio" name="visibilitePhotos" value="Privé" />Privé');
                                    } else {
                                        echo('<input type="radio" name="visibilitePhotos" value="Public" />Public');
                                        echo('<input type="radio" name="visibilitePhotos" value="Amis" />Amis');
                                        echo('<input type="radio" name="visibilitePhotos" value="Privé" checked="" />Privé');
                                    }
                                ?>
                                <p/>
                                <br/>
                                
                                
                                <label><b>Mot de passe :</b></label><p/>
                                <input type="password" name="motDePasse" size="20" maxlength="30" value="<?php echo $motDePasseAffichage; ?>" required="" />
                                <p/>

                                <div align="right"><input type="submit" name="modification" value="Valider" class="button blue glossy glass xs" />
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
