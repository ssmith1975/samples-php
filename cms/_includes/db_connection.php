<?php
require_once "config.php";

//Create a connection
$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD)
            or die("Database connection failed.");
            
// Select a database
$db_select = mysql_selectdb(DB_NAME, $conn)
             or die("Database is invalid.");
 
         
?>