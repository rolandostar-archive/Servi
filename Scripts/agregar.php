<?php 
include_once ('../cpanel/dbconnect.php');

switch ($_POST['lang']) {
    case "es": 
        $msg_pre = "Salon ";
        $msg_pos = " ya esta disponible";
    break;
    case "en":
        $msg_pre = "Room ";
        $msg_pos = " now available";
    break;
    case "jp":
        $msg_pre = "利用可能になりまし教室";
        $msg_pos = "";
    break;
    case "it":
        $msg_pre = "Aula ";
        $msg_pos = " ora disponibile";
    break;
    case "fr":
        $msg_pre = "Salle de classe ";
        $msg_pos = " maintenant disponible";
    break;
}
// ENVIARA EMAIL EN 1 MINUTO


$fichero='output.txt';
$actual = file_get_contents($fichero);
$actual .= print_r($_POST,true);
$query = "INSERT INTO notify (id,lang,correo,msg,tiempo,enviado) VALUES (NULL,'".$_POST['lang']."','".$_POST['email']."','".$msg_pre.$_POST['Salon'].$msg_pos."',NOW(),0)";
$actual .= $query;
mysql_query($query);


file_put_contents($fichero, $actual);
?>