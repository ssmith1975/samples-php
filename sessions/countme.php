<?php
session_start();

// Check if session variable exists
if (isset($_SESSION['count'])) {
	// Increment 'count' session variable
	$_SESSION['count']++;
	
	// Retrieve data from 'count' session variable and display in message
	$msg = "Welcome back! You've been here " . $_SESSION['count'] . " times!"; 
	
} else {
	// Initialize 'count' session variable to 1
	$_SESSION['count']=1;
	
	// Set initial display message
	$msg = "Howdy, stranger!";

	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Count Me!</title>
</head>

<body>
<h1>Session Test</h1>
<p><?php echo "{$msg}"; ?></p>
<h3>Options</h3>
<ol>
	<li><a href="countme.php">Click again!</a></li>
	<li>Go away to a different page and return to this one.</li>
	<li>Clear your browser cookies.</li>
	<li>Or close your browser and return to this page.</li>
</ol>

</body>
</html>
