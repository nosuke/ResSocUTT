<!DOCTYPE html>
<html>
    <head>
        <title>Affichage du profil</title>
        <meta name="auteur" content="Florent LUCET" />
        <meta name="sujet" content="TP de LO07" />
        <meta name="mots-cles" content="Programmation,Web,HTML,PHP" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../styles/modeleGeneral.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../styles/menuAccordeon.css" media="screen" />
    </head>

    <body>

        <div id="global">
            
            <?php
                session_start();
    
                if(!isset($_SESSION['identifiant']) || $_SESSION['identifiant'] == "") header('Location: ../general/accesRefuse.php');
                else {
                    if (isset($_GET['pageIdentifiant']) && $_GET['pageIdentifiant'] <> "") $pageIdentifiant = $_GET['pageIdentifiant'];
                    else $pageIdentifiant = $_SESSION['identifiant'];
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
                            <?php
                                include "../general/menuAccordeon.php";
                                require('../general/fonctions.php');
                                
                                require('../bdd/connexionBDD.php');
                                
                                $resultatAffichage = mysqli_query($bdd, "SELECT * FROM compte WHERE identifiant='" . $pageIdentifiant . "';");
                                if ($resultatAffichage) {
                                    if (mysqli_num_rows($resultatAffichage) == 1)
                                        while ($ligne = mysqli_fetch_row($resultatAffichage)) {
                                            $idCompteAffichage = $ligne[0];
                                            $prenomAffichage = $ligne[3];
                                            $nomAffichage = $ligne[4];
                                            $sexeAffichage = $ligne[5];
                                            $programmeAffichage = $ligne[6];
                                            $semestreAffichage = $ligne[7];
                                            $idVisibiliteProgrammeAffichage = $ligne[8];
                                            $idVisibiliteSemestreAffichage = $ligne[9];
                                            $idVisibiliteCompetencesAffichage = $ligne[10];
                                        }
                                }
                                
                                
                                echo ("<h2>" . $pageIdentifiant . "</h2>");
                                echo ("<h3>" . $prenomAffichage . " " . $nomAffichage . "</h3>");
                                echo ("Sexe : " . $sexeAffichage .".<br/>\n");
                                
                                if ($idVisibiliteProgrammeAffichage == 0) echo ("Programme : " . $programmeAffichage .".<br/>\n");
                                else if  ($idVisibiliteProgrammeAffichage == 1) echo ("<font color='blue'>Programme : " . $programmeAffichage .".</font><br/>\n");
                                else echo ("<font color='red'>Programme : " . $programmeAffichage .".</font><br/>\n");
                                
                                if ($idVisibiliteSemestreAffichage == 0) echo ("Semestre : " . $semestreAffichage .".<br/>\n");
                                else if  ($idVisibiliteSemestreAffichage == 1) echo ("<font color='blue'>Semestre : " . $semestreAffichage .".</font><br/>\n");
                                else echo ("<font color='red'>Semestre : " . $semestreAffichage .".</font><br/>\n");
                                
                                $competencesAffichage = "";
                                $resultatCompetencesAffichage = mysqli_query($bdd, "SELECT nomTypeCompetence FROM competence JOIN type_competence USING (idTypeCompetence) WHERE idCompte = " . $idCompteAffichage . ";");
                                if ($resultatCompetencesAffichage) {
                                    while ($ligne = mysqli_fetch_row($resultatCompetencesAffichage))
                                        $competencesAffichage .= $ligne[0] . ", ";
                                    if ($competencesAffichage == "")
                                        $competencesAffichage .= "aucune compétence saisie.";
                                    else
                                        $competencesAffichage = substr($competencesAffichage, 0, strlen($competencesAffichage)-2) . ".";
                                }
                                if ($idVisibiliteCompetencesAffichage == 0) echo ("Compétences : " . $competencesAffichage . "<br/>\n");
                                else if  ($idVisibiliteCompetencesAffichage == 1) echo ("<font color='blue'>Compétences : " . $competencesAffichage . "</font><br/>\n");
                                else echo ("<font color='red'>Compétences : " . $competencesAffichage . "</font><br/>\n");
                                echo ("<p/>\n");
                            ?>
                            
                            
                            <ul class="relations">
                                <li class="relation"><span>Je connais...</span>
                                    <ul class="sousMenuRelation">
                                        <?php
                                            $resultatRelations1 = mysqli_query($bdd, "SELECT * FROM compte, relation WHERE compte.idCompte = relation.idCompteDestinataire AND idCompteSource =" . $idCompteAffichage . " AND idTypeRelation = 0;");
                                            if ($resultatRelations1) {
                                                if (mysqli_num_rows($resultatRelations1) >= 1) {
                                                    while ($ligne = mysqli_fetch_row($resultatRelations1))
                                                        echo "<li><a href='./affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></li>";
                                                } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                            } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                        ?>
                                    </ul>
                                </li>
                                
                                <li class="relation"><span>Je travaille avec...</span>
                                    <ul class="sousMenuRelation">
                                        <?php
                                            $resultatRelations2 = mysqli_query($bdd, "SELECT * FROM compte, relation WHERE compte.idCompte = relation.idCompteDestinataire AND idCompteSource =" . $idCompteAffichage . " AND idTypeRelation = 1;");
                                            if ($resultatRelations2) {
                                                if (mysqli_num_rows($resultatRelations2) >= 1) {
                                                    while ($ligne = mysqli_fetch_row($resultatRelations2))
                                                        echo "<li><a href='./affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></li>";
                                                } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                            } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                        ?>
                                    </ul>
                                </li>
                                
                                <li class="relation"><span> <?php if ($sexeAffichage == "Homme") echo ("Je suis ami avec..."); else echo ("Je suis amie avec..."); ?> </span>
                                    <ul class="sousMenuRelation">
                                        <?php
                                            $resultatRelations3 = mysqli_query($bdd, "SELECT * FROM compte, relation WHERE compte.idCompte = relation.idCompteDestinataire AND idCompteSource =" . $idCompteAffichage . " AND idTypeRelation = 2;");
                                            if ($resultatRelations3) {
                                                if (mysqli_num_rows($resultatRelations3) >= 1) {
                                                    while ($ligne = mysqli_fetch_row($resultatRelations3))
                                                        echo "<li><a href='./affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></li>";
                                                } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                            } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                        ?>
                                    </ul>
                                </li>
                                
                                <li class="relation"><span>Je flashe sur...</span>
                                    <ul class="sousMenuRelation">
                                        <?php
                                            $resultatRelations4 = mysqli_query($bdd, "SELECT * FROM compte, relation WHERE compte.idCompte = relation.idCompteDestinataire AND idCompteSource =" . $idCompteAffichage . " AND idTypeRelation = 3;");
                                            if ($resultatRelations4) {
                                                if (mysqli_num_rows($resultatRelations4) >= 1) {
                                                    while ($ligne = mysqli_fetch_row($resultatRelations4))
                                                        echo "<li><a href='./affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></li>";
                                                } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                            } else echo("<li><a href='#'>Aucun membre n'a été ajouté dans cette section pour l'instant.</a></li>");
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                            
                            <?php
                                if ($pageIdentifiant <> $_SESSION['identifiant']) {
                                    
                                    // Recherche de l'identifiant correspondant au compte de l'utilisateur actuel du site.
                                    $resultatIdCompte = mysqli_query($bdd, "SELECT idCompte, sexe FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                                    if ($resultatIdCompte) {
                                        if (mysqli_num_rows($resultatIdCompte) == 1)
                                            while ($ligne = mysqli_fetch_row($resultatIdCompte)) {
                                                $idCompteConnecte = $ligne[0];
                                                $sexeCompteConnecte = $ligne[1];
                                            }
                                    }

                                    $relationsAffichage = "";
                                    $resultatRelationsAffichage = mysqli_query($bdd, "SELECT idTypeRelation FROM relation WHERE idCompteSource=" . $idCompteConnecte . " AND idCompteDestinataire=" . $idCompteAffichage .";");
                                    if ($resultatRelationsAffichage) {
                                        $relationsAffichage .= ", ";
                                        while ($ligne = mysqli_fetch_row($resultatRelationsAffichage))
                                            $relationsAffichage .= $ligne[0] . " , ";
                                        $relationsAffichage = substr($relationsAffichage, 0, strlen($relationsAffichage)-1);
                                    }
                            ?>
                                    <h3> Vos relations avec cette personne :</h3>
                                    <form method="POST" action="./validationModificationRelations.php">
                                        <?php
                                            objetBoiteACocherRelations($relationsAffichage, "Je la connais", 0);
                                            objetBoiteACocherRelations($relationsAffichage, "Je travaille avec elle", 1);
                                            if ($sexeCompteConnecte == "Homme") objetBoiteACocherRelations($relationsAffichage, "Je suis ami avec elle", 2);
                                            else objetBoiteACocherRelations($relationsAffichage, "Je suis amie avec elle", 2);
                                            objetBoiteACocherRelations($relationsAffichage, "Je flashe sur elle", 3);
                                        ?>
                                        
                                        <input type="hidden" name="idCompteDestinataire" value=<?php echo $idCompteAffichage; ?>>
                                        
                                        <div align="right"><input type="submit" name="modificationRelations" value="Valider relations" class="button blue glossy glass xs" />
                                    </form>
                            <?php
                                }
                            ?>
                            
                        </div><!-- #contenu -->
                    </div><!-- #centre -->

                    <?php include "../general/pied.html"; ?>

            <?php
                }
            ?>
            
	</div><!-- #global -->
    </body>
</html>
