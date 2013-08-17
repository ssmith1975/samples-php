<?php
// If the user accesses this page, make sure the have been authenticated through login.php
session_start();

if (! isset($_SESSION['loggedin']) || !isset($_SESSION['loggedin']) ) {
	// Redirect to login page
	header("Location:login.php");
}

$username = ($_SESSION['username'])? $_SESSION['username']: 'stranger';

// Logout process
if ($_POST['logout'] == "Log Out") {
	
	// If the user decides to exit
	session_destroy();
	
	// Redirect to login page
	header("Location:login.php");
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access</title>
<style>
	body { font-family: Arial, Verdana, sans-serif;font-size: 16px;}
	h1 { font-size: 1.4em; color: #888; }
	h2 { font-size: 1.2em; }
	p.error { padding: 10px; border: 1px solid #c00; color: #c00; }
</style>
</head>

<body>
<h1>Session Authentication</h1>
<h2>Welcome aboard! You are logged in as <?php echo $username; ?>!</h2>
<p>Congratulations, <?php echo $username; ?>, you are IN!</p>

	<h2>Logout</h2>
	
	<form action="access.php" method="post">
		<input type="submit" name="logout" value="Log Out" />
	</form>	
</body>
</html>
