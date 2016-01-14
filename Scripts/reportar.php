<?php 
include('../cpanel/dbconnect.php');

$query = "INSERT INTO reporte (id,id_horario,ip_alumno,reported_on) VALUES (NULL,'".$_POST['salon']."','".$_POST['ip']."',CURTIME())";
mysql_query($query);
//file_put_contents("outputfile.txt", $query);
?>