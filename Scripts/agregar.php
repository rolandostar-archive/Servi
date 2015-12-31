<?php 
include_once ('../cpanel/dbconnect.php');

// ENVIARA EMAIL EN 1 MINUTO

//$fichero='output.txt';
//$actual = file_get_contents($fichero);
//$actual .= print_r($_POST,true);
$query = "INSERT INTO notify (id,lang,correo,salon,tiempo,enviado) VALUES (NULL,'".$_POST['lang']."','".$_POST['email']."','".$_POST['Salon']."',NOW(),0)";
//$actual .= $query;
mysql_query($query);


//file_put_contents($fichero, $actual);
?>