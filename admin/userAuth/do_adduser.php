<?
//check for required fields
if ((!$_POST[f_name]) || (!$_POST[l_name]) || (!$_POST[username]) || (!$_POST[password])) {
	header("Location: show_adduser.html");
	exit;
}
//set up table name
$table_name = "auth_users";

//connect to the server and select the database
require("../includes/db_connection.inc");

//create and issue query
$sql = "INSERT INTO $table_name (f_name,l_name,username,password) 
		VALUES ('$_POST[f_name]', '$_POST[l_name]', '$_POST[username]',password('$_POST[password]'))";
		
$result = @mysql_query($sql,$db_conn) or die(mysql_error());

		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add a User</title>
</head>

<body>
	<h1>Add a User</h1>
    <p><strong>First Name:</strong><br />
	<? echo "$_POST[f_name]" ?></p>
    <p><strong>Last Name:</strong><br />
	<? echo "$_POST[l_name]" ?></p>
    <p><strong>Username:</strong><br />
	<? echo "$_POST[username]" ?></p>
    <p><strong>Password:</strong><br />
	<? echo "$_POST[password]" ?></p>
    <p><a href="show_adduser.html">Add another</a></p>
</body>
</html>
