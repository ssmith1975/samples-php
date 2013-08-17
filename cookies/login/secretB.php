<?php
if ($_COOKIE[auth] == "ok") {
	// Set display message
	$msg = "<p>Welcome to secret page B, authorized user!</p>";
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
<title>Secret Page B</title>
</head>

<body>
<h1>Secret Page B</h1>
	<p><? echo "$msg"; ?></p>
	<p><a href="secretA.php">Secret Page A</a></p>
	<p><a href="logout.php?logout=1">Logout</a></p>
</body>
</html>
