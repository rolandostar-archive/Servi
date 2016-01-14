
    <table class="centered highlight">
        <thead>
        <tr>
            <th lang="es">Sal&oacute;n</th>
            <th lang="es">Grupo</th>
            <th lang="es">Materia</th>
            <th lang="es">Profesor</th>
            <th lang="es">Lunes</th>
            <th lang="es">Martes</th>
            <th lang="es">Mi&eacute;rcoles</th>
            <th lang="es">Jueves</th>
            <th lang="es">Viernes</th>
        </tr>
        </thead>
        <tbody>
<?php
if ($config['current']) $hora = mysql_query("SELECT * FROM horario WHERE ID NOT IN (SELECT id_horario FROM reporte) AND ".$date." BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME() ORDER BY cast(substring(grupo,1,1) AS UNSIGNED),cast(substring(grupo,4,LENGTH(grupo)) AS UNSIGNED)") or die(mysql_error());
else $hora = mysql_query("SELECT * FROM horario WHERE ID NOT IN (SELECT id_horario FROM reporte) AND ".$date." BETWEEN SUBTIME('".$config['time']."', '01:30') AND '".$config['time']."' ORDER BY cast(substring(grupo,1,1) AS UNSIGNED),cast(substring(grupo,4,LENGTH(grupo)) AS UNSIGNED)") or die(mysql_error());
$ijk = 0;
while($row = mysql_fetch_assoc($hora)) { 


echo '
        <tr>
            <td><input class="with-gap" name="salon" type="radio" id="salon'.$ijk.'" value="'.$row['ID'].'" /><label for="salon'.$ijk.'" class="black-text">'.$row['salon'].'</label></td>
            <td> '.$row['grupo'].'</td>
            <td> '.$row['materia'].'</td>
            <td> '.$row['profesor'].'</td>
            <td> '.$row['lunes'].'</td>
            <td> '.$row['martes'].'</td>
            <td> '.$row['miercoles'].'</td>
            <td> '.$row['jueves'].'</td>
            <td> '.$row['viernes'].'</td>
        </tr>


';

$ijk++;
}


?>
        </tbody>
    </table>
