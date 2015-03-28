<!DOCTYPE html>
<html>
    <head>
        <title>Informations de traçage des évènements</title>
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
            ?>
            
                    <?php include "../general/entete.html"; ?>
                    <br/>
                    
                    <div id="centre">
                        <div id="navigation" class="coin">
                            <ul>
                                <li><p><a href="../profil/affichageProfil.php">Afficher votre profil</a></p></li>
                                <li><p><a href="../profil/modificationProfil.php">Modifier votre profil</a></p></li>
                                <li><p><a href="../profil/galerieImages.php">Gérer votre galerie d'images</a></p></li>
                                <li><p><a href="../profil/rechercheProfil.php">Rechercher un membre</a></p></li>
                            </ul>
                            <ul>
                            <?php if ($_SESSION['identifiant'] == "admin") { ?>
                                <li><p><a href="../administration/tableTracageAdministration.php">Table de traçage (administration)</a></p></li>
                                <li><p><a href="../administration/informationsTracageAdministration.php">Informations de traçage (administration)</a></p></li>
                            <?php } ?>
                                <li><p><a href="../profil/deconnexion.php">Se déconnecter</a></p></li>
                            </ul>
                        </div><!-- #navigation -->

                        <div id="contenu" class="coin">
                            <h1>Informations de traçage des évènements</h1>
                            <br>
                            
                            <h2>Nombre d'évènements traçés par utilisateur (ordonné par occurrences décroissantes)</h2>
                            <br>
                            <?php
                                require('../bdd/connexionBDD.php');
                                
                                $resultatNombreOccurrences = mysqli_query($bdd, "SELECT identifiant, COUNT(*) AS nombreOccurrences FROM compte JOIN evenement USING (idCompte) GROUP BY idCompte ORDER BY nombreOccurrences DESC;");
                                if ($resultatNombreOccurrences) {
                                    if (mysqli_num_rows($resultatNombreOccurrences) >= 1) {
                            ?>
                                        <table border="1" cellspacing="2" cellspading="5">
                                            <thead>
                                                <tr>
                                                    <th>Identifiant du compte</th>
                                                    <th>Nombre d'occurrences</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <?php
                                        while ($ligne = mysqli_fetch_row($resultatNombreOccurrences)) {
                                            echo "<tr>";
                                            echo "<td><a href='../profil/affichageProfil.php?pageIdentifiant=" . $ligne[0] . "'>" . $ligne[0] . "</a></td>";
                                            echo "<td>" . $ligne[1] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    } else echo("Aucun profil n'a effectué d'évènement.");
                                } else echo("Aucun profil n'a effectué d'évènement.");
                            ?>
                            
                            
                            <br>
                            <h2>Réputation des profils (ordonnée par réputations décroissantes)</h2>
                            <br>
                            
                            <?php
                                $tableauAffichageReputations = false;
                                $resultatReputations = mysqli_query($bdd, "SELECT identifiant, ((SELECT COUNT(idRelation) FROM relation AS R1 WHERE R1.idCompteDestinataire = C.idCompte) / ((SELECT COUNT(idRelation) FROM relation AS R1 WHERE R1.idCompteDestinataire = C.idCompte) + (SELECT COUNT(idRelation) FROM relation AS R2 WHERE R2.idCompteSource = C.idCompte))) AS reputation FROM compte AS C ORDER BY reputation DESC;");
                                if ($resultatReputations) {
                                    if (mysqli_num_rows($resultatReputations) >= 1) {
                                        while ($ligne = mysqli_fetch_row($resultatReputations)) {
                                            if ($tableauAffichageReputations <> true) {
                                                $tableauAffichageReputations = true;
                            ?>
                                                <table border="1" cellspacing="2" cellspading="5">
                                                    <thead>
                                                        <tr>
                                                            <th>Identifiant du compte</th>
                                                            <th>Réputation du compte</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                            <?php
                                            }

                                            echo "<tr>";
                                            echo "<td><a href='../profil/affichageProfil.php?pageIdentifiant=" . $ligne[0] . "'>" . $ligne[0] . "</a></td>";
                                            echo "<td>" . $ligne[1] . "</td>";
                                            echo "</tr>";
                                        }
                                        if ($tableauAffichageReputations == true) {
                                            echo "</tbody>";
                                            echo "</table>";
                                        } else echo("Aucune relation n'a été trouvée, donc aucune réputation n'a pu être calculéea.");
                                    } else echo("Aucune relation n'a été trouvée, donc aucune réputation n'a pu être calculéeb.");
                                } else echo("Aucune relation n'a été trouvée, donc aucune réputation n'a pu être calculéec.");
                            ?>
                            
                            
                            <br>
                            <h2>Binômes travaillant ensemble</h2>
                            <br>
                            <?php
                                $tableauAffichage = false;
                                $resultatBinomesTravaillantEnsemble1 = mysqli_query($bdd, "SELECT idCompteSource, idCompteDestinataire FROM relation WHERE idTypeRelation=1;");
                                if ($resultatBinomesTravaillantEnsemble1) {
                                    if (mysqli_num_rows($resultatBinomesTravaillantEnsemble1) >= 1) {
                                        while ($ligne = mysqli_fetch_row($resultatBinomesTravaillantEnsemble1)) {
                                            $resultatBinomesTravaillantEnsemble2 = mysqli_query($bdd, "SELECT idCompteSource, idCompteDestinataire FROM relation WHERE idTypeRelation=1 AND idCompteSource =" . $ligne[1] . " AND idCompteDestinataire =" . $ligne[0] . ";");
                                            if ($resultatBinomesTravaillantEnsemble2) {
                                                if ($tableauAffichage <> true) {
                                                    $tableauAffichage = true;
                            ?>
                                                    <table border="1" cellspacing="2" cellspading="5">
                                                        <thead>
                                                            <tr>
                                                                <th>Identifiant du compte 1</th>
                                                                <th>Identifiant du compte 2</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                            <?php
                                                }
                                                
                                                
                                                $idCompteSource = $ligne[0];
                                                $idCompteDestinataire = $ligne[1];
                                                $resultatBinomesTravaillantEnsemble3 = mysqli_query($bdd, "SELECT identifiant FROM compte WHERE idCompte =" . $idCompteSource . ";");
                                                $resultatBinomesTravaillantEnsemble4 = mysqli_query($bdd, "SELECT identifiant FROM compte WHERE idCompte =" . $idCompteDestinataire . ";");
                                                while ($ligne = mysqli_fetch_row($resultatBinomesTravaillantEnsemble3) )
                                                        $compteSource = $ligne[0];
                                                while ($ligne = mysqli_fetch_row($resultatBinomesTravaillantEnsemble4) )
                                                        $compteDestinataire = $ligne[0];
                                                
                                                if ($compteSource > $compteDestinataire) {
                                                    echo "<tr>";
                                                    echo "<td><a href='../profil/affichageProfil.php?pageIdentifiant=" . $compteSource . "'>" . $compteSource . "</a></td>";
                                                    echo "<td><a href='../profil/affichageProfil.php?pageIdentifiant=" . $compteDestinataire . "'>" . $compteDestinataire . "</a></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        if ($tableauAffichage == true) {
                                            echo "</tbody>";
                                            echo "</table>";
                                        } else echo("Aucun binôme de travail n'a été trouvé.");
                                    } else echo("Aucun binôme de travail n'a été trouvé.");
                                } else echo("Aucun binôme de travail n'a été trouvé.");
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