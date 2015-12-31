<?php

if (!isset($_POST["lang"])) {
    $row['lang'] = "it";
}

$body_head = file_get_contents('content_h/'.$row['lang'].'/contents_h.html',FILE_USE_INCLUDE_PATH);
$body_foot = file_get_contents('content_f/'.$row['lang'].'/contents_f.html',FILE_USE_INCLUDE_PATH);


$body = "Salon 1133 ya disponible";


echo $body_head."<h3>".$body."</h3>".$body_foot;


?>