<?php 
/* MySQL Database Connection for dbssmithadmin */

$dbhostname="localhost:3300";
$dbusername="db_general_user";
$dbpassword="password";
$dbname="db-general";

$conn = mysql_connect($dbhostname, $dbusername, $dbpassword, false,65536) 
	or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later. ". mysql_error().")/*,history.go(-1)*/</script></html>");
mysql_select_db($dbname);

$mysqli = new mysqli($dbhostname, $dbusername, $dbpassword, $dbname);

?>
