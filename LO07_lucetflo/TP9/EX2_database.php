<?php
define ('LO07_DB_HOST', 'dev-isi.utt.fr');
define ('LO07_DB_USER', 'lucetflo');
define ('LO07_DB_PASSWORD', 'iPRmdKiB');
define ('LO07_DB_NAME', 'LO07_TP9_2013');

$database = mysqli_connect(LO07_DB_HOST, LO07_DB_USER, LO07_DB_PASSWORD, LO07_DB_NAME) or
		die ('Impossible de se connecter à MySQL : ' + mysqli_connect_error());
?>