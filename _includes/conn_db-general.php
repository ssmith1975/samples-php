<?php 
/* MySQL Database Connection for dbssmithadmin */

$dbhostname="localhost";
$dbport = 3300;
//$dbusername="db_general_user";
$dbusername="root";
$dbpassword="password";
$dbname="db-general";

// mysql_connect($dbhostname,$dbusername, $dbpassword, false,65536) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later. ". // mysql_error().")/*,history.go(-1)*/</script></html>");
// mysql_select_db($dbname);


$mysqli = new mysqli($dbhostname, $dbusername, $dbpassword, $dbname, $dbport) or die('This connection is DEAD!');

// Check connection

  if ($mysqli->connect_errno>0)
  {
		//echo "Error. Did not connect to database.";
		$error_msg = "<html><body>";
		$error_msg .= "<script language='JavaScript'>alert('Unable to connect to database!Please try again later.');</script>";
		$error_msg .= "<h1>Connection Error</h1>";
		$error_msg .= "<p>".mysqli_connect_error()."</p>";
		$error_msg .= "</body></html>";
		echo $error_msg;
			exit;
  }
  

?>
