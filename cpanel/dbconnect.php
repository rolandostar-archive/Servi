<?php
if(!mysql_connect("localhost","root","BH2Ml1t4vu"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("servi"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>