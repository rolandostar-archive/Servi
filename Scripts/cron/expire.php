<?php

$mysql = mysqli_connect('45.55.94.207', 'servi', '3ca6a5f8');
mysqli_select_db($mysql, 'servi');
$result = mysqli_query($mysql, 'TRUNCATE reporte');

?>