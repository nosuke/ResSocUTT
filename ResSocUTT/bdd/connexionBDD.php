<?php
    // Ouverture de la base de données.
    define ('LO07_DB_USER', 'root');
    define ('LO07_DB_PASSWORD', '');
    define ('LO07_DB_HOST', 'localhost');
    define ('LO07_DB_NAME', 'ressocutt');
    
    $bdd = mysqli_connect (LO07_DB_HOST, LO07_DB_USER, LO07_DB_PASSWORD, LO07_DB_NAME) or
    die ('Impossible de se connecter à MySQL : ' + mysqli_connect_error());
?>
