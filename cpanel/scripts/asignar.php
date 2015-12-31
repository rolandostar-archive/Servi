<?php
include_once '../dbconnect.php';
for($i=0;$i<count($_POST['salon']);$i++){
   $query = "update horario SET salon=".$_POST['salon'][$i]." WHERE grupo='".$_POST['grupo'][$i]."';".PHP_EOL;
   mysql_query($query);
}

?>