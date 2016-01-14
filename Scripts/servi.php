<?php
include_once ('cpanel/dbconnect.php');
$config = include('cpanel/config.php');

$num_salones = mysql_fetch_row(mysql_query("SELECT COUNT(DISTINCT(salon)) FROM horario"));
date_default_timezone_set('America/Mexico_City');

if($config['current']){
    $num = date("w");
    switch ($num) {
        case "1": $date="lunes"; break;
        case "2": $date="martes"; break;
        case "3": $date="miercoles"; break;
        case "4": $date="jueves"; break;
        case "5": $date="viernes"; break;
        default: $date=NULL; break;
    }
}else{
    $date = $config['date'];
}
                                    
if ($date != NULL) {
    if($config['current']) $hora = mysql_query("SELECT DISTINCT(salon)," . $date . " from horario where salon NOT IN(SELECT salon from horario WHERE " . $date . " BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME()) GROUP BY salon") or die(mysql_error());
    else $hora = mysql_query("SELECT DISTINCT(salon)," . $date . " from horario where salon NOT IN(SELECT salon from horario WHERE " . $date . " BETWEEN SUBTIME(CAST('".$config['time']."' AS TIME), '01:30') AND CAST('".$config['time']."' AS TIME)) GROUP BY salon") or die(mysql_error());

    if(mysql_num_rows($hora) == $num_salones[0]) { // Desactivado
        echo '<caption lang="es">Aun no inician las clases! Hasta Mañana.</caption>';
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
        $until = "<td lang=\"es\">Mañana</td>";
        if($config['current']) $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">CURTIME() AND salon=".$row['salon'].")") or die(mysql_error());
        else $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">CAST('".$config['time']."' AS TIME) AND salon=".$row['salon'].")") or die(mysql_error());
        while ($row = mysql_fetch_assoc($salon)) {
            $until = $row[$date];
            $until=date('g:i A',strtotime($until));
            $until="<td>".$until."</td>";
        }
        echo $until
    ?>
    </tr>
    <?php
        }
    }else {
        echo '<tbody class="mono"><td lang="es">Ningun Salon Disponible</td>';
    }
} else echo '<tbody class="mono"><td lang="es">No Disponible en Fines de Semana</td>';
?>
</tbody>