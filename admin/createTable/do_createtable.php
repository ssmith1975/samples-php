<?
require("../includes/db_connection.inc");

// start creating the SQL statement
$sql = "CREATE TABLE $_POST[table_name] (";

// continue the SQL statement for each new field
	for ($i=0;$i<count($_POST[field_name]);$i++) {
		$sql .= $_POST[field_name][$i]." ".$_POST[field_type][$i];
		if ($_POST[field_length][$i] != "") {
			$sql .= " (".$_POST[field_length][$i]."),";
		} else {
			$sql .= ",";
		}
	}

// clean up the end of the string
$sql = substr($sql, 0, -1);
$sql .= ")";	

// execute the query
$result = mysql_query($sql, $db_conn) or die(mysql_error());

// get a good message for display upon success
if ($result) {
	$msg = "<p>".$_POST[table_name]." has been created!</p>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create a Database Table: Step 3</title>
</head>

<body>
	<h1>Adding table to <? echo "$db_name"; ?>...</h1>
    <? echo "$msg"; ?>
</body>
</html>
