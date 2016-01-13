<?php
include_once ('cpanel/dbconnect.php');
include_once('scripts/convert.php');
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

    if($config['current']) $hora = mysql_query("SELECT DISTINCT(salon) FROM horario WHERE salon NOT IN (SELECT salon from horario WHERE ".$date." BETWEEN CURTIME() AND ADDTIME(CURTIME(), '01:30')) AND salon IN (SELECT salon from horario WHERE ".$date." BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME())") or die(mysql_error());
    else $hora = mysql_query("SELECT DISTINCT(salon) FROM horario WHERE salon NOT IN (SELECT salon from horario WHERE ".$date." BETWEEN CAST('".$config['time']."' AS TIME) AND ADDTIME(CAST('".$config['time']."' AS TIME), '01:30')) AND salon IN (SELECT salon from horario WHERE ".$date." BETWEEN SUBTIME(CAST('".$config['time']."' AS TIME), '01:30') AND CAST('".$config['time']."' AS TIME))") or die(mysql_error());

    if(mysql_num_rows($hora) == /*$num_salones[0]*/9001) { // Desactivado
        echo '<caption lang="es">Todos los Salones Disponibles :D</caption>';
    }else if(mysql_num_rows($hora) > 0){
            echo '
<thead>
    <tr>
        <th><strong lang="es">Disponible En</strong><br></th>
        <th><strong lang="es">Sal&oacute;n</strong><br></th>';
        if(!$mobile) echo '<th><strong lang="es">Horario</strong><br></th>';
        echo '<th><strong lang="es">Notificar</strong><br></th>
    </tr>
</thead>
<tbody class="mono">
    ';
        $jk=0;
        while ($row = mysql_fetch_assoc($hora)) { 
        ?>
    <tr>

    <?php
        if($config['current']) $salon = mysql_query("SELECT ".$date." from horario WHERE ".$date." BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME() AND salon = ".$row['salon']) or die(mysql_error());
        else $salon = mysql_query("SELECT ".$date." from horario WHERE ".$date." BETWEEN SUBTIME(CAST('".$config['time']."' AS TIME), '01:30') AND CAST('".$config['time']."' AS TIME) AND salon = ".$row['salon']) or die(mysql_error());
            $row2 = mysql_fetch_assoc($salon);
            if($config['current']) $time_diff = mysql_fetch_row(mysql_query("SELECT TIMEDIFF(ADDTIME('".$row2[$date]."','01:30'),CURTIME())"));
            else $minute = mysql_fetch_row(mysql_query("SELECT MINUTE(TIMEDIFF(ADDTIME('".$row2[$date]."','01:30'),CAST('".$config['time']."' AS TIME)))"));
    ?>
        <td><?php echo convertToHoursMins($minute[0], '%02dhr %02dm'); ?></td>
        <td><?php echo $row['salon'];?></td>
        <?php
        if(!$mobile){
            echo '<td>'.date("g:i", strtotime($row2[$date]))." - ".date("g:i", strtotime($row2[$date]." +1 hours 30 minutes"))."</td>"; 
            echo '<td> <a class="btn-floating btn waves-effect waves-light blue activator" id="'.$jk.'" onclick="notify(\''.$row['salon'].'\',0)"><i class="material-icons">add_alert</i></a> </td>';
        }else{
            echo '<td> <a class="btn-floating btn waves-effect waves-light blue" id="'.$jk.'" onclick="notify(\''.$row['salon'].'\',1)"><i class="material-icons">add_alert</i></a> </td>';
        }
        ?>
    </tr>
    <?php
        $jk++;
        }
    }else {
        echo '<tbody class="mono"><td lang="es">Ningun Salon Proximo</td>';
    }
} else echo '<tbody class="mono"><td lang="es">No Disponible en Fines de Semana</td>';
?>
</tbody>