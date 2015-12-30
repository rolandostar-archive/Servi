<!DOCTYPE HTML>
<html>
<head>

    <?php include_once ( 'include/meta.php'); include_once ( 'include/styles.php') ; include_once ( 'include/js_head.php'); include_once ( 'cpanel/dbconnect.php');?>
    <title>Servi&trade; [Classroom] &raquo;</title>
</head>

<body>
<div id="wrapper">
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row center">
                <img src="assets/img/Logo.png" class="responsive-img" style="max-height:195px;" height=100%/>
            </div>
            <div class="row center">
                <h5 class="header col s12 light white-text" lang="es">Un Moderno Localizador de Salones Disponibles para tu Instituci&oacute;n</h5>
            </div>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l3 offset-l2">
                        <div class="card grey lighten-3">
                            <div id="scroll" class="card-content black-text" style="min-width:182px; overflow: hidden;">
                                <!-- Se muestra solo en Cel -->
                                <span class="card-title hide-on-med-and-up grey-text text-darken-4" style="line-height:2.5em">
                                    <a href="#modal1" class="modal-trigger" ><span class="black-text" lang="es">Disponibles Ahora</span><i class="material-icons medium right">fullscreen</i></a>
                                </span>
                                <!-- Se muestra en todos menos en Cel -->
                                <span class="card-title hide-on-small-only" lang="es">Disponibles Ahora</span>
                                <table class="responsive-table bordered centered hide-on-small-only">
                                    <thead>
                                        <tr>
                                            <th><strong lang="es">Sal&oacute;n</strong><br></th>
                                            <th><strong lang="es">Hasta</strong><br></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mono">
                                    <!--PHP Generated -->
                                    <?php
                                    date_default_timezone_set('America/Mexico_City');

                                    $num = date("w");
                                    if($num == 1) $date="lunes";
                                    else if($num == 2) $date = "martes";
                                    else if ($num == 3) $date = "miercoles";
                                    else if ($num == 4) $date = "jueves";
                                    else if ($num == 5) $date = "viernes";
                                    else $date = NULL;
                                    if($date != NULL){
                                    $hora = mysql_query("SELECT DISTINCT(salon),".$date." from horario where salon NOT IN(SELECT salon from horario WHERE ".$date." BETWEEN SUBTIME(CURTIME(), '01:30') AND CURTIME()) GROUP BY salon") or die(mysql_error());
                                    while($row = mysql_fetch_assoc($hora)) { ?>
                                        <tr>
                                            <td><?php echo $row['salon']; ?></td>
                                            <?php
                                            $until = "El Resto del Dia";
                                             $salon = mysql_query("SELECT ".$date." FROM horario WHERE salon=".$row['salon']." AND ".$date." = (SELECT min(".$date.") FROM horario WHERE ".$date.">CURTIME() AND salon=".$row['salon'].")") or die(mysql_error());
                                             while($row = mysql_fetch_assoc($salon)){
                                                $until = $row[$date];
                                                }
                                            ?>
                                            <td><?php echo $until; ?></td>
                                        </tr>
                                    <?php } 
                                        ?>
                                    <!-- END PHP -->
                                    </tbody>
                                </table>
                                <?php }else{
                                    echo '<span class="card-title">No Disponible en Fines de Semana</span>';
                                    } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m12 l5">
                        <div class="card grey lighten-3">
                            <div class="card-content blck-text">
                                <span class="card-title" lang="es">Pr&oacute;ximos</span>
                                <!-- Se muestra en todos menos en Cel -->
                                <table class="bordered centered hide-on-small-only">
                                    <thead>
                                        <tr>
                                            <th><strong lang="es">Disponible En</strong><br></th>
                                            <th><strong lang="es">Sal&oacute;n</strong><br></th>
                                            <th><strong lang="es">Horario</strong><br></th>
                                            <th><strong lang="es">Notificar</strong><br></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mono">
                                        <tr>
                                            <td>31m</td>
                                            <td>1615</td>
                                            <td>10:31 - 12:00</td>
                                            <td>
                                                <a class="btn-floating btn waves-effect waves-light blue" id="0" onclick="notify('1615',0)"><i class="material-icons">add_alert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1hr 49m</td>
                                            <td>1415</td>
                                            <td>11:49 - 1:30</td>
                                            <td>
                                                <a class="btn-floating btn waves-effect waves-light blue" id="1" onclick="notify('1415',0)"><i class="material-icons">add_alert</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Se muestra solo en Cel -->
                                <table class="bordered centered hide-on-med-and-up">
                                    <thead>
                                        <tr>
                                            <th><strong lang="es">Disponible En</strong></th>
                                            <th><strong lang="es">Sal&oacute;n</strong></th>
                                            <th><strong lang="es">Notificar</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mono">
                                        <tr>
                                            <td>31m</th>
                                            <td>1615</td>
                                            <td>
                                                <a class="btn-floating btn waves-effect waves-light blue" id="0" onclick="notify('1615',1)"><i class="material-icons">add_alert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1hr 49m</td>
                                            <td>1415</td>
                                            <td>
                                                <a class="btn-floating btn waves-effect waves-light blue" id="1" onclick="notify('1415',1)"><i class="material-icons">add_alert</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l8 offset-l2">
                        <div class="card grey lighten-3">
                            <div class="card-content blck-text">
                                <span class="card-title activator grey-text text-darken-4" lang="es">Reportes<i class="material-icons right">info_outline</i></span>
                                <table class="responsive-table bordered centered">
                                    <thead>
                                        <tr>
                                            <th><strong lang="es">D&iacute;a</strong></th>
                                            <th><strong lang="es">Sal&oacute;n</strong></th>
                                            <th><strong lang="es">Horario</strong></th>
                                            <th><strong lang="es">Estado</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mono">
                                        <tr>
                                            <td>12/23/15</td>
                                            <td>1312</td>
                                            <td>11:00 - 12:30</td>
                                            <td lang="es">Ocupado</td>
                                        </tr>
                                        <tr>
                                            <td>12/23/15</td>
                                            <td>1313</td>
                                            <td>11:00 - 12:30</td>
                                            <td lang="es">Disponible</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-reveal" style="font-size:20px;">
                                <span class="card-title grey-text text-darken-4" lang="es">Informacion!<i class="material-icons right">close</i></span>
                                <p lang="es">Los espacios que se muestran en esta secci&oacute;n son reportados por usuarios, Servi&trade; [Classrooms] no es responsable de su contenido.</p>
                                <p lang="es">Para Realizar una aportaci&oacute;n solo da click en el enlace "Enviar un Reporte".</p>
                            </div>
                            <div class="card-action">
                                <a href="#"><span class="cyan-text right" lang="es">Enviar un Reporte</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </main>

    <footer class="page-footer blue-grey darken-2 z-depth-3">
        <div class="container">
            <div class="row">
                <div class="col l6 m6 s12">
                    <h5 class="white-text" lang="es">¿Quienes Somos?</h5>
                    <p class="grey-text text-lighten-4" lang="es">Somos un equipo de estudiantes que trabajan en este proyecto por motivos educativos/acad&eacute;micos. Si tienes alguna idea para mejorar el proyecto o encuentras un error <a href="mailto:admin@sindral.net?Subject=Servi%u2122%20%5BClassrooms%5D" class="cyan-text"><span lang="es">Cont&aacute;ctanos!</span></a>
                    </p>
                </div>
                <div class="col l3 m3 s12 offset-m3 offset-l3">
                    <h5 class="white-text" lang="es">Enlaces</h5>
                    <ul>
                        <li><a href="mailto:admin@sindral.net?Subject=Servi%u2122%20%5BClassrooms%5D" class="cyan-text"><span lang="es">Contacto</span></a>
                        </li>
                        <li><a class="cyan-text" href="legal/?privacy"><span lang="es">Pol&iacute;tica de Privacidad</span></a>
                        </li>
                        <li><a class="cyan-text" href="legal/?terms"><span lang="es">T&eacute;rminos y Condiciones</span></a>
                        </li>
                    </ul>
                    <div id="polyglotLanguageSwitcher">
                        <form action="#">
                            <select id="polyglot-language-options">
                                <option id="es" href="?lang=es" value="es">Espa&ntilde;ol</option>
                                <option id="en" href="?lang=en" value="en">English</option>
                                <option id="fr" href="?lang=fr" value="fr">Fran&ccedil;ais</option>
                                <option id="jp" href="?lang=jp" value="jp">日本語</option>
                                <option id="it" href="?lang=it" value="it">Italiano</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright center">
            <p class="hide-on-small-only"><span lang="es">Hecho por </span>Rolando Romero, Miguel Sanchez, Ricardo Lara y Omar Zu&ntilde;iga.</p>
            <p>IPN - ESCOM &copy; 2016</p>
        </div>
    </footer>
    <!-- #footer -->

</div>
<!-- #wrapper -->

<!-- Modal Movil "Disponibles Ahora" -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h5 lang="es">Disponibles Ahora</h5>
        <table class="striped centered">
            <thead>
                <tr>
                    <th><strong lang="es">Sal&oacute;n</strong>
                        <br>
                    </th>
                    <th><strong lang="es">Hasta</strong>
                        <br>
                    </th>
                </tr>
            </thead>
            <tbody class="mono">
            <!--PHP Generated -->
            <?php
            for ($x = 0; $x <= 50; $x++){
                echo "<tr>";
                echo "<td>"."1312"."</td>";
                echo "<td>"."11:00"."</td>";
                echo "</tr>";
            }?>
            <!-- END PHP -->
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-green btn-flat" lang="es">Regresar</a>
    </div>
</div>

<!-- Modal Notificacion -->
<div id="notify-modal" class="modal">
    <div class="modal-content center">
        <h4>Servicio de Notificaciones</h4>
        <p>Dejanos tu correo y te enviaremos una notificacion cuando el salon este <a id="myLink">disponible</a></p>
        <form id="notifyform" class="col s12" action="javascript:submitnotify();">
            <div class="row">
                <div class="input-field col s9 m7 l8 offset-m1 offset-l1">
                    <i class="material-icons prefix" style="margin-top:6px;">account_circle</i>
                    <input id="email" name="email" type="email" value="" class="validate" required>
                     <label for="email">Email</label>
                </div>
                <input id="salonSel-hidden" type="hidden" name="Salon" value="">
                <input id="lang" type="hidden" name="lang" value="">
                <div class="input-field col s3 m2 l1 ">
                    <select name="salon" disabled>
                        <option id="salonSel" selected></option>
                    </select>
                    <label>Salon</label>
                </div>
            </div>
            <div class="row center">
                <button class="btn waves-effect waves-light" id="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div id="progress" class="progress">
                <div class="indeterminate"></div>
            </div>
            <div class="row center">
                <i class="material-icons" id="done">done</i>
            </div>
        </form>
    </div>
</div>


<?php include_once ( 'include/js_body.php') ?>

</body>

</html>