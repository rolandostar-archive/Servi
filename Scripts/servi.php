<?php
include_once ('cpanel/dbconnect.php');

$num_salones = mysql_fetch_row(mysql_query("SELECT COUNT(DISTINCT(salon)) FROM horario"));
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

    if(mysql_num_rows($hora) == /*$num_salones[0]*/9001) { // Desactivado
        echo '<caption lang="es">Todos los Salones Disponibles :D</caption>';
    }else if(mysql_num_rows($hora) > 0){
            echo '
<thead>
    <tr>
        <th><strong lang="es">Sal&oacute;n</strong><br></th>
        <th><strong lang="es">Hasta</strong><br></th>
    </tr>
</thead>
<tbody class="mono" name="servi">
    ';
        while ($row = mysql_fetch_assoc($hora)) { 
        ?>
    <tr>
        <td><?php echo $row['salon'];?></td>
    <?php
        $until = "Mañana";
        $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">CURTIME() AND salon=".$row['salon'].")") or die(mysql_error());
        while ($row = mysql_fetch_assoc($salon)) {
            $until = $row[$date];
            $until=date('H:i A',strtotime($until));
        }
    ?>
        <td lang="es"><?php echo $until?></td>
    </tr>
    <?php
        }
    }else {
        echo '<p lang="es">Ningun Salon Disponible :(</p>';
    }
} else echo '<p lang="es">No Disponible en Fines de Semana</p>';
?>
</tbody>