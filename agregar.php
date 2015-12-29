<?php 

$fichero='output.txt';
$actual = file_get_contents($fichero);
$actual .= print_r($_POST,true);
file_put_contents($fichero, $actual);
?>