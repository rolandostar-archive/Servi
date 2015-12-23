<?php $link = mysqli_connect("localhost", "root", "BH2Ml1t4vu", "servi");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



$query = "SELECT * FROM horario";



?>

<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Reportar Salon</title>
  <!-- CSS  -->
  <link href="../assets/css/icon" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/ico" href="../assets/img/favicon.ico">
  <link href="../assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
 
<body>
  <div class="container">
    <div class="row">
      <form class="col s12" action="enviar.php" method="post">
        <div class="row">
        <h2>Reportar Salon</h2>





<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">



<?php
if ($result = mysqli_query($link, $query)) {
$i = 0;
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
$i++;
echo "  <tr>    <th class=\"tg-yw4l\">

      <input type=\"checkbox\" class=\"filled-in\" name=\"id[]\" id=\"id".$i."\"  value=\"".$i."\"/>
      <label for=\"id".$i."\">".$row["grupo"]." - ".$row["materia"]."</label>      </th>
      <th class=\"tg-yw4l\">".$row["profesor"]."</th>
    <th class=\"tg-yw4l\">".$row["lunes"]."</th>
    <th class=\"tg-yw4l\">".$row["martes"]."</th>
    <th class=\"tg-yw4l\">".$row["miercoles"]."</th>
    <th class=\"tg-yw4l\">".$row["jueves"]."</th>
    <th class=\"tg-yw4l\">".$row["viernes"]."</th>
    </p>";

    }

    /* free result set */
    mysqli_free_result($result);
}
mysqli_close($link);

?>


</table>



<br><br>


         <input type="submit" value="Submit">
         <br>
      </form>
    </div>
</div>


<!--  Scripts-->
<script src="../assets/js/jquery-2.1.1.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="../assets/js/jquery-2.1.1.min.js"><\/script>');
        }
    </script>
<script src="../assets/js/materialize.min.js"></script>
<script src="../assets/js/init.js"></script>
</body>
</html>
