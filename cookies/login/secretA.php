<?php
// Error reporting
//require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

if ($_COOKIE['auth'] == "ok") {
	// Set display message
	$msg = "<p>Welcome to secret page A, authorized user!</p>";
} else {
	// Redirect to login page
	header("Location: show_login.html");
	exit;
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Secret Page A</title>
</head>

<body>
	<h1>Secret Page A</h1>
	<p><?php echo "$msg"; ?></p>
	<p><a href="secretB.php">Secret Page B</a></p>
	<p><a href="logout.php?logout=1">Logout</a></p>
</body>
</html>
