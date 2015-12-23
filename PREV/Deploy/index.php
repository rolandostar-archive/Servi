<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/ghpages-materialize.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="assets/css/icon" rel="stylesheet">
    <title>&laquo; Servi &raquo;</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>

    <div class="section" id="index-banner">
        <div class="container">

        </div>
        <div class="container">
            <div class="row">
                <div class="right">
                    <img src="assets/img/TP.png" height=120px />
          </div>

        </div>
      </div>
    </div>
    <div class="container ">
      <!--  Outer row  -->
      <div class="row ">

        <div class="col s8 m12 l10 offset-s2">
          <!-- Third Party Options -->
          <div id="third-party-options " class="row scrollspy ">
            <div class="col s12 ">
              <h2 class="header ">Salones Disponibles</h2>
              <p class="caption ">[ESCOM]</p><div style="display:flex;justify-content:center;align-items:center; ">
			  </div>
              <p class="promo-caption ">Salones Reportados</p>
              <p class="caption ">Disclaimer: Esta lista de salones son reportados por usuarios y Servi no es responable de su contenido.</p><div style="display:flex;justify-content:center;align-items:center; ">
			<table  class="centered responsive-table bordered ">
                <tr>
                  <th>Salon</th>
                  <th>Horario</th>
                </tr>
<?php


$link = mysqli_connect("localhost", "root", "BH2Ml1t4vu", "servi");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

date_default_timezone_set('America/Mexico_City');

// Imprime algo como: Monday
$num = date("w");
if($num == 1) $date="lunes";
else if($num == 2) $date = "martes";
else if ($num == 3) $date = "miercoles";
else if ($num == 4) $date = "jueves";
else if ($num == 5) $date = "viernes";
else $date = NULL;


// Y (NOW() - 1:30) < lo que saque

$query = "SELECT horario.salon,horario.".$date." FROM horario,reporte WHERE CURTIME() BETWEEN horario.".$date." AND DATE_ADD(horario.".$date.", INTERVAL '1:30' HOUR_MINUTE) AND reporte.id_horario = horario.ID ;";
if ($result = mysqli_query($link, $query)) {

$i = 0;
    /* fetch associative array */



    while ($row = mysqli_fetch_assoc($result)) {
$i++;
/*
$pretiempo = $_POST['tiempo'];
$fecha = DateTime::createFromFormat('d M, Y',$pretiempo);
$tiempo = $fecha->format("Y-m-d");
*/
if ($row[$date] == NULL) {continue;}else{

$inicio = DateTime::createFromFormat('G:i:s',$row[$date]);
$ini = $inicio->format("G:i");
$inicio->add(new DateInterval('PT1H30M'));
$fin = $inicio->format("G:i");
echo "

                <tr>
                  <td>".$row["salon"]."</td>
                  <td>".$ini." - ".$fin."</td>
                </tr>

";

}

/*

echo "<p>
      <input type=\"checkbox\" class=\"filled-in\" name=\"genre[]\" id=\"genre".$i."\"  value=\"".$i."\"/>
      <label for=\"genre".$i."\">".$row["nombre"]."</label>
    </p>";*/

    }

    /* free result set */
    mysqli_free_result($result);
}
mysqli_close($link);


?>
              </table>
			  </div>
            </div>
          </div>



        </div>
        <!-- Table of contents -->
        <div class="col hide-on-med-and-down m3 l2 ">
          <div class="toc-wrapper pinned " style="top: 0px; ">
            <div style="height: 1px; ">
              <ul class="table-of-contents ">
                <li><a href="# " class="active ">Reportar Salon</a></li>
                <li><a href="# " class=" ">Iniciar Sesion</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

  <footer class="page-footer " style="  width:100%;
  position:absolute;
  bottom:0;
  left:0;">
    <div class="footer-copyright ">
      <div class="container ">© 2015 Instituto Politecnico Nacional - Escuela Superior de Computo<a class="grey-text text-lighten-4 right " href="# ">Rolando Romero, Ricardo Lara, Miguel Sanchez, Omar Zuñiga</a> </div>
    </div>
  </footer>
  <!--  Scripts-->
  <script src="assets/js/jquery-2.1.1.min.js "></script>
  <script>if (!window.jQuery) { document.write('<script src="bin/jquery-2.1.1.min.js "><\/script>'); }
  </script>
  <script src="assets/js/materialize.js "></script>
  <script src="assets/js/init.js "></script>


</body>
</html>