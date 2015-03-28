<?php
    function sauveCompteBDD($tableCompte, $idPublic, $idAmis, $idPrive) {
        $requete = "INSERT INTO " . $tableCompte . " (identifiant, motDePasse, prenom, nom, sexe, programme, semestre, idVisibiliteProgramme, idVisibiliteSemestre) VALUES (";
        $requete .= "'" . $_POST['identifiant'] . "',";
        $requete .= "'" . $_POST['motDePasse'] . "',";
        $requete .= "'" . $_POST['prenom'] . "',";
        $requete .= "'" . $_POST['nom'] . "',";
        if ($_POST['sexe'] == "Homme") $requete .= "'Homme',"; 
        else $requete .= "'Femme',";
        $requete .= "'" . $_POST['programme'] . "',";
        $requete .= "" . $_POST['semestre'] . ",";
        
        if ($_POST['visibiliteProgramme'] == "Public") $requete .= "" . $idPublic . ",";
        else if ($_POST['visibiliteProgramme'] == "Amis") $requete .= "" . $idAmis . ",";
        else $requete .= "" . $idPrive . ",";
        if ($_POST['visibiliteSemestre'] == "Public") $requete .= "" . $idPublic . ");";
        else if ($_POST['visibiliteSemestre'] == "Amis") $requete .= "" . $idAmis . ");";
        else $requete .= "" . $idPrive . ");";
        
        return $requete;
    }

    function miseAJourCompteBDD($tableCompte, $idPublic, $idAmis, $idPrive, $identifiant) {
        $requete = "UPDATE " . $tableCompte . " SET ";
        $requete .= "motDePasse ='" . $_POST['motDePasse'] . "',";
        $requete .= "prenom ='" . $_POST['prenom'] . "',";
        $requete .= "nom ='" . $_POST['nom'] . "',";
        if ($_POST['sexe'] == "Homme") $requete .= "sexe ='Homme',"; 
        else $requete .= "sexe='Femme',";
        $requete .= "programme='" . $_POST['programme'] . "',";
        $requete .= "semestre=" . $_POST['semestre'] . ",";
        
        if ($_POST['visibiliteProgramme'] == "Public") $requete .= "idVisibiliteProgramme =" . $idPublic . ",";
        else if ($_POST['visibiliteProgramme'] == "Amis") $requete .= "idVisibiliteProgramme =" . $idAmis . ",";
        else $requete .= "idVisibiliteProgramme =" . $idPrive . ",";
        if ($_POST['visibiliteSemestre'] == "Public") $requete .= "idVisibiliteSemestre =" . $idPublic . ",";
        else if ($_POST['visibiliteSemestre'] == "Amis") $requete .= "idVisibiliteSemestre =" . $idAmis . ",";
        else $requete .= "idVisibiliteSemestre =" . $idPrive . ",";
        if ($_POST['visibiliteCompetences'] == "Public") $requete .= "idVisibiliteCompetences =" . $idPublic . ",";
        else if ($_POST['visibiliteCompetences'] == "Amis") $requete .= "idVisibiliteCompetences =" . $idAmis . ",";
        else $requete .= "idVisibiliteCompetences =" . $idPrive . ",";
        if ($_POST['visibilitePhotos'] == "Public") $requete .= "idVisibilitePhotos =" . $idPublic . " ";
        else if ($_POST['visibilitePhotos'] == "Amis") $requete .= "idVisibilitePhotos =" . $idAmis . " ";
        else $requete .= "idVisibilitePhotos =" . $idPrive . " ";
        
        $requete .= "WHERE identifiant ='" . $identifiant . "';";
        
        return $requete;
    }
    
    function miseAJourCompetencesBDD($tableCompetences, $idCompte, $idTypeCompetence) {
        $requete = "INSERT INTO " . $tableCompetences . " (idCompetence, idCompte, idTypeCompetence) VALUES (";
        $requete .= "NULL,";
        $requete .= "" . $idCompte . ",";
        $requete .= "" . $idTypeCompetence . ");";
        
        return $requete;
    }
    
    function miseAJourRelationsBDD($tableRelations, $idCompteSource, $idCompteDestinataire, $idTypeRelation) {
        $requete = "INSERT INTO " . $tableRelations . " (idRelation, idCompteSource, idCompteDestinataire, idTypeRelation) VALUES (";
        $requete .= "NULL,";
        $requete .= "" . $idCompteSource . ",";
        $requete .= "" . $idCompteDestinataire . ",";
        $requete .= "" . $idTypeRelation . ");";

        return $requete;
    }
    
    function ajoutPhotoBDD($tablePhotos, $idCompte, $lien) {
        $requete = "INSERT INTO " . $tablePhotos . " (idPhoto, idCompte, lien) VALUES (";
        $requete .= "NULL,";
        $requete .= "" . $idCompte . ",";
        $requete .= "'" . $lien . "');";

        return $requete;
    }
    
    function ajoutEvenementBDD($tableEvenements, $idCompte, $idTypeEvenement, $descriptionEvenement) {
        $requete = "INSERT INTO " . $tableEvenements . " (idEvenement, idCompte, idTypeEvenement, descriptionEvenement, dateEvenement) VALUES (";
        $requete .= "NULL,";
        $requete .= "" . $idCompte . ",";
        $requete .= "" . $idTypeEvenement . ",";
        $requete .= "'" . $descriptionEvenement . "',";
        $requete .= "NOW());";

        return $requete;
    }
?>
