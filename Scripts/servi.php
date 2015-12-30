<?php
include_once ('../cpanel/dbconnect.php');

date_default_timezone_set('America/Mexico_City');
$num = date("w");
switch ($num) {
    case "1": $date="lunes"; break;
    case "2": $date="martes"; break;
    case "3": $date="miercoles"; break;
    case "4": $date="jueves"; break;
    case "5": $date="viernes"; break;
    default: $date=NULL; break;
}
                                    
if ($date != NULL) {
    $hora = mysql_query("SELECT DISTINCT(salon)," . $date . " from horario where salon NOT IN(SELECT salon from horario WHERE " . $date . " BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME()) GROUP BY salon") or die(mysql_error());
    while ($row = mysql_fetch_assoc($hora)) { 
    ?>
<tr>
    <td><?php echo $row['salon'];?></td>
<?php
    $until = "El Resto del Dia";
    $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">CURTIME() AND salon=".$row['salon'].")") or die(mysql_error());
    while ($row = mysql_fetch_assoc($salon)) $until = $row[$date];
?>
    <td><?php echo $until;?></td>
</tr>
<?php
    }
} else echo '<p>No Disponible en Fines de Semana</p>';
?>
