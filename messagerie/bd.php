<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'registration');

// Connexion � la base de donn�es MySQL
$con = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// V�rifier la connexion
if($con === false){
    die("ERREUR : Impossible de se connecter. " . mysql_connect_error());
}
?>
