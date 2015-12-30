<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM admins WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
<div id="main">
<div id="header">
	<div id="left">
    <label>Panel de Control - Servi </label>
    </div>
    <div id="right">
    	<div id="content">
        	Hola <?php echo $userRow['username']; ?>!&nbsp;<a href="javascript:logout();">Salir</a>
        </div>
    </div>
</div>

<div id="body">

          <p> Panel </p>

</div>
</div>
<script>
$( document ).ready(function() {
    $("#header").slideDown(500);
    $("#body").delay(650).fadeIn("slow");
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
</script>
</body>
</html>