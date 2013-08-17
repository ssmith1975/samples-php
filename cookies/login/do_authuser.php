<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

// Define path to database connection stuff
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);


// Check for required fields
if((!$_POST['username']) || (!$_POST['password'])) {
	// Redirect to login page
	header("Location: show_login.html");
	exit;
} else {
	// Grab username and password from POST
	$username = htmlspecialchars(trim($_POST['username']));
	$password = htmlspecialchars(trim($_POST['password']));
}

// Set up names of database and table to use
$table_name = "sample_users";

// Database connection
require_once(ROOT_PATH .'/_includes/conn_db-general.php'); 



// Get hashed password
$hashed_password = md5($password);
 
// Buld and issue the query
$query = "SELECT * FROM {$table_name} ";
$query .= "WHERE username = '{$username}' ";
$query .= "AND hashed_password = '{$hashed_password}' ";
 

// Execute query
$results = mysqli_query($mysqli, $query) /*or die("Username/password authentication failed. " . mysql_error())*/;


// Get the number of rows in the result set
$num = mysqli_num_rows($results);


//print a message or redirect elsewhere, based on result
if ($num != 0) {
	// Set cookie variables
	
	$expire=time()+60*60*24*1; // Set to expire in 1 day from current time
	$cookie_name="auth";
	$cookie_value="ok";
	$cookie_expire= $expire;
	$cookie_domain= $_SERVER['HTTP_HOST'];
	
	// Store login status to cookie
	setcookie($cookie_name,$cookie_value,$cookie_expire,"/",$cookie_domain,false);
	
	// Set display message
	$display_block ="
		<p><strong>Secret Menu:</strong></p>
		<ul>
			<li><a href=\"secretA.php\">secret page A</a></li>
			<li><a href=\"secretB.php\">secret page B</a></li>
		</ul>";

	// Free database resources
	mysqli_free_result($results);
	
	// Close database connection
	mysqli_close($mysqli);		
		
} else {
	// Display alert message and redirect to previous page
	echo "<html><script language='JavaScript'>alert('Invalid username/password! Please try again.'); history.go(-1)</script></html>";

	// Free database resources
	mysqli_free_result($results);
	
	// Close database connection
	mysqli_close($mysqli);

	// Redirect to login	
	//header("Location: show_login.html")	
	
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
	<? echo "$display_block"; ?>
</body>
</html>
