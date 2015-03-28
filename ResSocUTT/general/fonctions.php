<?php

function objetListeDeroulanteCompetences ($chaineCompetences, $nomCompetence, $idBDD) {
    if ((strlen($nomCompetence) <> 1 && strstr($chaineCompetences, $nomCompetence)) || (strlen($nomCompetence) == 1 && strstr($chaineCompetences, " " . $nomCompetence . ", "))) echo('<option selected="selected" value="' . $idBDD . '">' . $nomCompetence . '</option>');
    else echo('<option value="' . $idBDD . '">' . $nomCompetence . '</option>');
}

function objetBoiteACocherRelations ($chaineRelations, $nomRelation, $idBDD) {
    if (strstr($chaineRelations, ", " . $idBDD . " ,")) echo('<input type="checkbox" name="relations[]" value=' . $idBDD . ' checked=""> ' . $nomRelation);
    else echo('<input type="checkbox" name="relations[]" value=' . $idBDD . '> ' . $nomRelation);
}

?>
