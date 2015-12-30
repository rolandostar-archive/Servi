<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once ( $_SERVER["DOCUMENT_ROOT"].'/servi/include/styles.php');?>
    <link rel="stylesheet" href="login-style.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Cookies, Y Lang Para Idioma -->

</head>
<body>
<div class="wrapper " id="main">
    <div class="container">
        <h1 lang="es">Bienvenido</h1>
        
        <form class="form" method="post">
            <input type="text" name="user"  placeholder="Usuario" lang="es" required />
            <input type="password" name="pass" placeholder="Contrase&ntilde;a" lang="es" required />
            <button type="submit" id="login-button" name="btn-login"><span lang="es">Iniciar Sesion</span</button>
        </form>
    </div>
</div>
<?php
session_start();
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

     
     $("form").fadeOut(500);
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

<script>alert("wrong details");</script>
';

		
        
	}
	
}else{

	echo '

<script>
document.getElementById("main").style.display = "none";
$("#main").fadeIn("slow");
</script>
';

}

?>


</body>

</html>


