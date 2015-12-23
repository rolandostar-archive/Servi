<?php

$con=mysqli_connect("localhost","root","BH2Ml1t4vu","servi");
// Check connection
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($con) . PHP_EOL;

require('simple_html_dom.php');
$html = file_get_html('Horarios de clase.html');

$table = $html->find('table[id=ctl00_mainCopy_dbgHorarios]', 0);
$rowData = array();

foreach(array_slice($table->find('tr'),1) as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
        $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
}

$j = count($rowData);

$sql = "TRUNCATE horario";
if (!$con->query($sql)) {
    printf("Errormessage: %s\n", $con->error);
}else{
printf("TABLE DELETION COMPLETE<br>");
}

for($i=0;$i<$j;$i++){

$salon = mt_rand(1000,1100);

if($rowData[$i][5]!="&nbsp;")
    $lunes = "'".mb_strimwidth($rowData[$i][5], 0, 5, "").":00'";
else $lunes = "NULL";

if($rowData[$i][6]!="&nbsp;")
    $martes = "'".mb_strimwidth($rowData[$i][6], 0, 5, "").":00'";
else $martes = "NULL";

if($rowData[$i][7]!="&nbsp;")
    $miercoles = "'".mb_strimwidth($rowData[$i][7], 0, 5, "").":00'";
else $miercoles = "NULL";

if($rowData[$i][8]!="&nbsp;")
    $jueves = "'".mb_strimwidth($rowData[$i][8], 0, 5, "").":00'";
else $jueves = "NULL";

if($rowData[$i][9]!="&nbsp;")
    $viernes = "'".mb_strimwidth($rowData[$i][9], 0, 5, "").":00'";
else $viernes = "NULL";

$sql = "INSERT INTO servi.horario (ID, grupo, materia, profesor, salon, lunes, martes, miercoles, jueves, viernes) VALUES (NULL, '".$rowData[$i][0]."', '".$rowData[$i][1]."', '".$rowData[$i][2]."', '".$salon."',".$lunes.", ".$martes.", ".$miercoles.", ".$jueves.", ".$viernes.");";


if (!$con->query($sql)) {
    printf("Errormessage: %s\n", $con->error);
}else{
printf("#%d: Data insetion succesful<br>",$i);
}


//echo "SQL #".$i." = ".$sql."<br><br>";

}
echo '<pre>';
print_r($rowData);
echo '</pre>';


/*

INSERT INTO servi.horario (ID, grupo, materia, profesor, salon, lunes, martes, miercoles, jueves, viernes) VALUES (NULL, '1CM1', 'Algoritmia y Programacion Estructurada', 'Garcia Sales Juan Vicente', NULL, '10:30:00', '08:30:00', NULL, '10:30:00', NULL);

*/

?>

