<?php

$body_head = file_get_contents('contents_h.html',FILE_USE_INCLUDE_PATH);
$body_foot = file_get_contents('contents_f.html',FILE_USE_INCLUDE_PATH);


$body = "Salon 1133 ya disponible";


echo $body_head."<h3>".$body."</h3>".$body_foot;


?>