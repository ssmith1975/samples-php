<?
//check for required fields
if((!$_POST[username]) || (!$_POST[password])) {
	header("Location: show_login.html");
	exit;
}

//set up names of database and table to use
$table_name = "auth_users";

//connect to the server and select the database
require("../includes/db_connection.inc");

//buld and issue the query
$sql = "SELECT * FROM $table_name WHERE username = '$_POST[username]' AND password = password('$_POST[password]')";

$result = @mysql_query($sql, $db_conn) or die(mysql_error());

//get the number of rows in the result set
$num = mysql_num_rows($result);

//print a message or redirect elsewhere, based on result
if ($num != 0) {
	$msg = "<p>Congratulations, you're authorized!</p>";
} else {
	header("Location: show_login.html");
	exit;
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Secret Area</title>
</head>

<body>
	<? echo "$msg"; ?>
</body>
</html>
