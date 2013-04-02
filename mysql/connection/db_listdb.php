<? require("includes/db_connection.inc");
$dbs = @mysql_list_dbs($db_conn) or die(mysql_error());
$db_list = "<ul>";
$i=0;
while($i < mysql_num_rows($dbs)) {
	$db_names[$i] = mysql_tablename($dbs, $i);
	$db_list .= "<li>$db_names[$i]</li>";
	$i++;
}

$db_list .= "</ul>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MySQL Databases</title>
</head>

<body>
<p><strong>Databases on localhost</strong>:</p>
<? echo "$db_list"; ?>
</body>
</html>
