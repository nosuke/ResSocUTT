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
                            <h1>Résultat de la recherche</h1>
                            <br>
                            
                            <?php
                                require('../bdd/connexionBDD.php');
                                
                                // Recherche de l'identifiant correspondant au compte de l'utilisateur actuel du site.
                                $resultatIdCompte = mysqli_query($bdd, "SELECT idCompte, sexe FROM compte WHERE identifiant='" . $_SESSION['identifiant'] . "';");
                                if ($resultatIdCompte) {
                                    if (mysqli_num_rows($resultatIdCompte) == 1)
                                        while ($ligne = mysqli_fetch_row($resultatIdCompte))
                                            $idCompteConnecte = $ligne[0];
                                }
                                
                                
                                $requeteRecherche = "SELECT * FROM compte WHERE ";
                                if (isset($_POST['sexe']) && $_POST['sexe'] <> "" && $_POST['sexe'] <> "Tous") $requeteRecherche .= "sexe = '" . $_POST['sexe'] . "'";
                                else $requeteRecherche .= "(sexe = 'Homme' || sexe = 'Femme')";
                                if (isset($_POST['programme']) && $_POST['programme'] <> "" ) $requeteRecherche .= " AND programme = '" . $_POST['programme'] . "'";
                                if (isset($_POST['semestre']) && $_POST['semestre'] <> "" ) $requeteRecherche .= " AND semestre = " . $_POST['semestre'];
                                if (isset($_POST['relations']) && $_POST['relations'] <> "" && $_POST['relations'] <> "Peu importe") {
                                    if ($_POST['relations'] == "Toutes mes relations") $requeteRecherche .= " AND idCompte IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . ")";
                                    if ($_POST['relations'] == "Toutes mes non-relations") $requeteRecherche .= " AND idCompte NOT IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . ")";
                                    if ($_POST['relations'] == "Je le connais") $requeteRecherche .= " AND idCompte IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . " AND idTypeRelation = 0)";
                                    if ($_POST['relations'] == "Je travaille avec") $requeteRecherche .= " AND idCompte IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . " AND idTypeRelation = 1)";
                                    if ($_POST['relations'] == "Je suis ami avec") $requeteRecherche .= " AND idCompte IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . " AND idTypeRelation = 2)";
                                    if ($_POST['relations'] == "Je flashe sur") $requeteRecherche .= " AND idCompte IN (SELECT idCompteDestinataire FROM relation WHERE idCompteSource = " . $idCompteConnecte . " AND idTypeRelation = 3)";
                                }
                                $requeteRecherche .= " ORDER BY identifiant, prenom, nom, sexe, programme, semestre;";
                                
                                $resultatRecherche = mysqli_query($bdd, $requeteRecherche);
                                if ($resultatRecherche) {
                                    if (mysqli_num_rows($resultatRecherche) >= 1) {
                            ?>
                                        <table border="1" cellspacing="2" cellspading="5">
                                            <thead>
                                                <tr>
                                                    <th>Identifiant</th>
                                                    <th>Prénom</th>
                                                    <th>Nom</th>
                                                    <th>Sexe</th>
                                                    <th>Programme</th>
                                                    <th>Semestre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                                        while ($ligne = mysqli_fetch_row($resultatRecherche)) {
                                            echo "<tr>";
                                            echo "<td><a href='./affichageProfil.php?pageIdentifiant=" . $ligne[1] . "'>" . $ligne[1] . "</a></td>";
                                            echo "<td>" . $ligne[3] . "</td>";
                                            echo "<td>" . $ligne[4] . "</td>";
                                            echo "<td>" . $ligne[5] . "</td>";
                                            echo "<td>" . $ligne[6] . "</td>";
                                            echo "<td>" . $ligne[7] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    } else echo("Aucun profil ne correspond à vos critères de recherche.");
                                } else echo("Aucun profil ne correspond à vos critères de recherche.");
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
