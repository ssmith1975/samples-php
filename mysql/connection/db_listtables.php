<?
//connection code
require("includes/db_connection.inc");

//get database list
$dbs = @mysql_list_dbs($db_conn) or die(mysql_error());

//start first bullet
$db_list = "<ul>";
$db_num = 0;

//looop through results of function
while ($db_num < mysql_num_rows($dbs)) {
	//get database names and make each a bullet point
	$db_names[$db_num] = mysql_tablename($dbs, $db_num);
	$db_list .= "<li>$db_names[$db_num]</li>";
	
	//get table names and start another bullet list
	$tables = @mysql_list_tables($db_names[$db_num]) or die(mysql_error());
	
	$table_list = "<ul>";
	$table_num = 0;
	
	//loop through results of function
	while($table_num < mysql_num_rows($tables)) {
		//get table names and make each a bullet point
		$table_names[$table_num] = mysql_tablename($tables, $table_num);
		$table_list .= "<li>$table_names[$table_num]</li>";
		$table_num++;
	}
	//close inner bullet list and increment number to continue loop
	$table_list .= "</ul>";
	$db_list .= "$table_list";
	$db_num++;
}
//close outer bullet list
$db_list .= "</ul>";	
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MySQL Tables</title>
</head>

<body>
<p><strong>Databases and tables on localhost</strong>:</p>
<? echo "$db_list"; ?>
</body>
</html>
