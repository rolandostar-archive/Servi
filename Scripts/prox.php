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
    if($config['current']) $hora = mysql_query("SELECT DISTINCT(salon)," . $date . " from horario where salon NOT IN(SELECT salon from horario WHERE " . $date . " BETWEEN CURTIME() AND ADDTIME(CURTIME(), '01:30')) GROUP BY salon") or die(mysql_error());
    else $hora = mysql_query("SELECT DISTINCT(salon)," . $date . " from horario where salon NOT IN(SELECT salon from horario WHERE " . $date . " BETWEEN CAST('".$config['time']."' AS TIME AND ADDTIME(CAST('".$config['time']."' AS TIME),'01:30')) GROUP BY salon") or die(mysql_error());

    if(mysql_num_rows($hora) == /*$num_salones[0]*/9001) { // Desactivado
        echo '<caption lang="es">Todos los Salones Disponibles :D</caption>';
    }else if(mysql_num_rows($hora) > 0){
            echo '
<thead>
    <tr>
        <th><strong lang="es">Disponible En</strong><br></th>
        <th><strong lang="es">Sal&oacute;n</strong><br></th>
        <th><strong lang="es">Horario</strong><br></th>
        <th><strong lang="es">Notificar</strong><br></th>
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
        if($config['current']) $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">ADDTIME(CURTIME().'01:30') AND salon=".$row['salon'].")") or die(mysql_error());
        else $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">ADDTIME(CAST('".$config['time']."' AS TIME),'01:30') AND salon=".$row['salon'].")") or die(mysql_error());
        while ($row = mysql_fetch_assoc($salon)) {
            $until = $row[$date];
            $until=date('g:i A',strtotime($until));
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