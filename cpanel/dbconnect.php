<?php
if(!mysql_connect("45.55.94.207","servi","3ca6a5f8"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("servi"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>