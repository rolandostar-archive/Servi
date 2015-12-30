
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <!-- begin meta -->
    <meta charset="utf-8">
    <meta name="author" content="ESCOM - IPN">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/ico/favicon-16x16.png">
    <link rel="manifest" href="../assets/ico/manifest.json">
    <meta name="msapplication-TileColor" content="#607d8b">
    <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#607d8b">

    <!-- Especifica codificacion -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

       <!-- Importar Fuente Google Icon -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&subset=latin,latin-ext" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../css/polyglot-language-switcher.css" />
    <link rel="stylesheet" href="css/login-style.css" type="text/css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

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
function getQueryVariable(variable)
{
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


<style>
#form{
  display:none;
}

#titulo{
  visibility:hidden;
}
</style>


</head>
<body>
<div class="wrapper " id="main">
    <div class="container">
        <h1 id="titulo" lang="es">Bienvenido</h1>
        
        <form id="form" class="form" method="post">
            <input type="text" name="user"  placeholder="Usuario" lang="es" required />
            <input type="password" name="pass" placeholder="Contrase&ntilde;a" lang="es" required />
            <button type="submit" onclick="return foo();" id="login-button" name="btn-login"><span lang="es">Iniciar Sesion</span</button>
        </form>
    </div>
</div>

<script>
function foo() {
        $("form").fadeOut(500);
        return true;
    }
</script>

<?php

include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$user = mysql_real_escape_string($_POST['user']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM admins WHERE username='$user'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];

		echo '
<script>
    
    $("#titulo").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});
     console.log("DEBUG "+location.href);
     
     
$(".wrapper").addClass("form-success");
     $(".wrapper").delay(1500).fadeOut(500);
         var newUrl = location.href.match( /^(http.+\/)[^\/]+$/ )[1];
        
    newUrl += "home.php";
     setTimeout(function(){

    window.location = newUrl;
}, 2000);
     
     
</script>
';


		
		//header("Location: home.php");
	}
	else
	{
		echo '

<script> $("#form").fadeIn("slow");</script>
';

		
        
	}
	
}else{

	echo '

<script>
document.getElementById("main").style.display = "none";
$("#main").fadeIn("slow");
$("#form").fadeIn("slow");
</script>
';

}

?>

<script>
  var bumpIt = function() {
      $('body').css('margin-bottom', $('.page-footer').height() + 70);
    },didResize = false;
  bumpIt();

  $(window).resize(function() {
    didResize = true;
  });
  setInterval(function() {
    if (didResize) {
      didResize = false;
      bumpIt();
    }
  }, 250);


  var lang = Cookies.get('langCookie');
  var currr = $("#" + lang);
  currr.attr("selected", '');

  function notify(salon) {
    document.getElementById("salonSel").innerHTML = salon;
    document.getElementById("salonSel-hidden").value = salon;
    document.getElementById("lang").value = Cookies.get('langCookie');
    document.getElementById('progress').style.display = "block";
    document.getElementById("progress").style.visibility = "hidden";
    document.getElementById("done").style.display = "none";
    $('select').material_select();
    $('#notify-modal').openModal();
  }

  function submitnotify(theForm) {
    var myData = $('#notifyform').serializeArray();
    $.ajax({
        url: '../scripts/agregar.php',
        type: 'POST',
        data: $.param(myData),
        success: function(msg) {
            document.getElementById('progress').style.visibility = "visible"
            setTimeout(function() {
                document.getElementById('progress').style.display = "none";
                document.getElementById('done').style.display = "block";
            }, 1500);
            setTimeout(function() {
                $('#notify-modal').closeModal();
            }, 3000);

        }
    });
  }
</script>
</body>

</html>


