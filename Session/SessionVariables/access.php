<?php
// if the user accesses this page, make sure the have been authenticated through login.php

if ($_SESSION['access'] != "true") {
	header("Location:login.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access</title>
</head>

<body>

<h2>Welcome!</h2>
<p>Congratulations, <?php $_SESSION['username'] ?>, you are IN!</p>
</body>
</html>
