<?php
//connection code
//require("includes/db_connection.inc");

//require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

// Define path to database connection stuff
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);

// Database connection
require_once(ROOT_PATH .'/_includes/conn_db-general.php'); 



//get database list
$dbsql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME NOT IN ('information_schema','mysql','performance_schema', 'root')";

$dbs = $mysqli->query($dbsql);

//echo print_r($dbs->fetch_fields());


if($dbs->num_rows > 0) {
	//start first bullet
	$db_list = "<ul>";
	$table_list = "";
	
	while ($db_name = $dbs->fetch_array()) {
		$db_list .= "<li>".$db_name[0];
//$db_name[0]
		//get table names and start another bullet list
		$mysqli->select_db($db_name[0]);
		$tblsql = "SHOW TABLES";
		$tables = $mysqli->query($tblsql);
		
		//echo var_dump($tables) . PHP_EOL;
		if( $tables->num_rows > 0) {
			$table_list = "<ul>";
			
			while ($table_name = $tables->fetch_row()) {
			
			
				$table_list .= "<li>".$table_name[0]."</li>";
				
			}
		
			$table_list .= "</ul>";
			$db_list .= $table_list;

			// Clear resources
			mysqli_free_result($tables);
		}

		$db_list .= "</li>";		
    }
	

	//close outer bullet list
	$db_list .= "</ul>";
	
}

// Clear resources
mysqli_free_result($dbs);

// Close database connection
$mysqli->close();


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MySQL Tables</title>
</head>

<body>
<h1>Database Table Lists</h1>
<p><strong>Databases and tables on host</strong>:</p>
<?php  echo "$db_list"; ?>
</body>
</html>
