<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
mysql_query("UPDATE admins SET last_seen=NOW() WHERE user_id=".$_SESSION['user']);
$res=mysql_query("SELECT * FROM admins WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="author" content="ESCOM - IPN">
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ico/favicon-16x16.png">
    <link rel="manifest" href="../assets/ico/manifest.json">
    <meta name="msapplication-TileColor" content="#607d8b">
    <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#607d8b">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Titulo -->
    <title lang="es">Servi&trade; - Panel de Control</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/polyglot-language-switcher.css" type="text/css" rel="stylesheet" />

    <!--Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- Libreria Materialize -->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>
    <!-- Polyglot -->
    <script src="../js/jquery.polyglot.language.switcher.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
                effect: 'fade',
                testMode: false,
                onChange: function(evt) {
                    Cookies.set('langCookie', evt.selectedItem);
                    window.lang.change(evt.selectedItem);
                }
            });

        });
    </script>

    <script>
    function getQueryVariable(variable) {
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
    }
    </script>

    <!-- Cookies, Y Lang Para Idioma -->
    <script src="../js/js.cookie.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/jquery-lang.js" charset="utf-8" type="text/javascript"></script>
    <script>
        var lang = new Lang();
        lang.dynamic('en', '../js/langpack/en.json');
        lang.dynamic('it', '../js/langpack/it.json');
        lang.dynamic('fr', '../js/langpack/fr.json');
        lang.dynamic('jp', '../js/langpack/jp.json');
        var langus = getQueryVariable("lang");
        if(langus!=false){
            Cookies.set('langCookie', langus);
            lang.init({
                defaultLang: 'es',
                currentLang: langus
            });
        }else{
            lang.init({
                defaultLang: 'es'
            });
        }        
    </script>
</head>
<body>
<main id="wrapper">
    <nav class="grey darken-3" id="header">
        <div class="nav-wrapper container">
          <label lang="es">Panel de Control</label>
          <ul id="nav" class="right">
            <li><a href="javascript:logout();"><span lang="es">Salir</span></a></li>
          </ul>
          <span class="right" style="margin-right:50px;" ><span lang="es">Bienvenido</span> <?php echo $userRow['name']; ?>!</span>
        </div>
    </nav>
    <div id="body" class="container">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">

                <div class="col s12 m4 card click" value="1">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center" lang="es">Renovar Horario</h5>
                    </div>
                </div>
                <div class="col s12 m4 card" value="2" style="cursor:not-allowed">
                    <div class="icon-block">
                        <h2 class="center grey-text"><i class="material-icons">assignment</i></h2>
                        <h5 class="center" lang="es">Modificar Reportes</h5>
                    </div>
                </div>
                <div class="col s12 m4 card" value="3" style="cursor:not-allowed">
                    <div class="icon-block">
                        <h2 class="center grey-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center" lang="es">Modificar Configuraci&oacute;n</h5>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col s12 m4 card" value="4" style="cursor:not-allowed">
                    <div class="icon-block">
                        <h2 class="center grey-text"><i class="material-icons">schedule</i></h2>
                        <h5 class="center" lang="es">Renovar Huecos&trade;</h5>
                    </div>
                </div>
                <div class="col s12 m4 card click" value="5">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">group_work</i></h2>
                        <h5 class="center" lang="es">Asignar Salones</h5>
                    </div>
                </div>
                <div class="col s12 m4 card click" value="6">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">bug_report</i></h2>
                        <h5 class="center" lang="es">Debug</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="Horarios">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 card">
                    <table class="centered highlight">
                        <caption><h4 lang="es">Horarios Registrados</h4></caption>
                        <thead>
                        <tr>
                            <th lang="es">Grupo</th>
                            <th lang="es">Materia</th>
                            <th lang="es">Profesor</th>
                            <th lang="es">Sal&oacute;n</th>
                            <th lang="es">Lunes</th>
                            <th lang="es">Martes</th>
                            <th lang="es">Mi&eacute;rcoles</th>
                            <th lang="es">Jueves</th>
                            <th lang="es">Viernes</th>
                        </tr>
                        </thead>
                        <tbody>
                <?php
                $hora = mysql_query("SELECT * FROM horario") or die(mysql_error());
                while($row = mysql_fetch_assoc($hora)) { ?>
                        <tr>
                            <td><?php echo $row['grupo']?></td>
                            <td><?php echo $row['materia']?></td>
                            <td><?php echo $row['profesor']?></td>
                            <td><?php echo $row['salon']?></td>
                            <td><?php echo $row['lunes']?></td>
                            <td><?php echo $row['martes']?></td>
                            <td><?php echo $row['miercoles']?></td>
                            <td><?php echo $row['jueves']?></td>
                            <td><?php echo $row['viernes']?></td>
                        </tr>
                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="section" id="Reportes">
        </div>
        <div class="section" id="Configuracion">
        </div>
        <div class="section" id="Huecos">
        </div>
        <div class="section" id="Asignar">
            <div class="row card">
                <form id="asignarForm" name="Asignar" method="post" action="javascript:submitAsig();">
                <?php
                $result3 = mysql_query("select Count( distinct grupo ) from horario");
                $row = mysql_fetch_assoc($result3);
                $size = $row['Count( distinct grupo )'];
                ?>
                <div class="col s12 m6">
                    <table class="center striped asignar">
                        <thead>
                        <tr>
                            <th lang="es">Grupo</th>
                            <th lang="es">Sal&oacute;n</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $offset = 0;
                        $limit = ceil($size/2);
                        $asignar1 = mysql_query("select grupo,salon from horario group by grupo order by cast(substring(grupo,1,1) AS UNSIGNED),cast(substring(grupo,4,LENGTH(grupo)) AS UNSIGNED) limit ".$offset.",".$limit."") or die(mysql_error());
                        while($row = mysql_fetch_assoc($asignar1)) {                  
                        ?>
                        
                        <tr>
                            <td><?php echo $row['grupo']?></td>
                            <td>
                                  <input <?php echo 'value="'.$row['salon'].'"'; ?> name="salon[]" type="number">
                                  <?php echo '<input type="hidden" name="grupo[]" value="'.$row['grupo'].'">'; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col s12 m6">
                    <table class="center striped asignar" >
                        <thead>
                        <tr>
                            <th lang="es">Grupo</th>
                            <th lang="es">Sal&oacute;n</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $offset += $limit;
                        $limit=$size;
                        $asignar2 = mysql_query("select grupo,salon from horario group by grupo order by cast(substring(grupo,1,1) AS UNSIGNED),cast(substring(grupo,4,LENGTH(grupo)) AS UNSIGNED) limit ".$offset.",".$limit."") or die(mysql_error());
                        while($row = mysql_fetch_assoc($asignar2)) {                  
                        ?>
                        
                        <tr>
                            <td><?php echo $row['grupo']?></td>
                            <td>
                                  <input <?php echo 'value="'.$row['salon'].'"'; ?> name="salon[]" type="number">
                                  <?php echo '<input type="hidden" name="grupo[]" value="'.$row['grupo'].'">'; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                                    <div class="center">
                                    &nbsp;
                                    <br>
                        <button class="btn waves-effect waves-light" type="submit" lang="es">Asignar
                            <i class="material-icons right">send</i>
                        </button>
                        <br>
                        &nbsp;
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="Admins">
        </div>
    </div>
</main>
<!--
<footer class="page-footer blue-grey darken-2 z-depth-3">
    <div class="footer-copyright center">
        <p class="hide-on-small-only"><span lang="es">Hecho por </span>Rolando Romero, Miguel Sanchez, Ricardo Lara y Omar Zu&ntilde;iga.</p>
        <p>IPN - ESCOM &copy; 2016</p>
    </div>
</footer>
-->
    <!--  Scripts-->
    <script src="js/init.js"></script>
    <script>
    $( document ).ready(function() {
        $("#header").slideDown(500);
        $("#body").delay(650).fadeIn("slow");
        $("html body").animate({ backgroundColor: "#000000" }, 1000);
    });

    </script>

    <script>
    function logout(){
        var newUrl = location.href.match( /^(http.+\/)[^\/]+$/ )[1];
        newUrl += "logout.php?logout";
        console.log(newUrl);
        $("#body").fadeOut("slow");
        $("#header").delay(650).slideUp(500).delay(500);
    setTimeout(  function()   { window.location = newUrl; }, 1000);
        
    }
    var actual = "#Horarios";
    var classname = document.getElementsByClassName("click");
    var mrClick = function() {
        var attribute = this.getAttribute("value");
        switch(attribute){
            case "5":
                if(actual != "#Asignar"){
                    $(actual).fadeOut(250);
                    $("#Asignar").delay(500).fadeIn(250);
                    actual = "#Asignar";
                }
                break;
            case "1":
                if(actual != "#Horarios"){
                    $(actual).fadeOut(250);
                    $("#Horarios").delay(500).fadeIn(250);
                    actual = "#Horarios";
                }
                break;
            case "6":
                if(actual != "#Admins"){
                    $(actual).fadeOut(250);
                    $("#Admins").delay(500).fadeIn(250);
                    actual = "#Admins";
                }
            break;
            default:
            console.log("Nada");
             break;
        }
    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].style.cursor = 'pointer';
        classname[i].addEventListener('click', mrClick, false);
    }

    function submitAsig() {
    var myData = $('#asignarForm').serializeArray();
    $.ajax({
        url: 'scripts/asignar.php',
        type: 'POST',
        data: $.param(myData),
        success: function(msg) {
            alert(window.lang.translate('Salones Asignados'));
        }
    });
  }

    </script>
</body>
</html>