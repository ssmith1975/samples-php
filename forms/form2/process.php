<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Processing</title>
</head>

<body>
<h2>PHP Form Processing</h2>

<p>
<?php
	echo "Your First Name is: " . $_POST["FName"] . "<br />";
	echo "Your Last Name is: " . $_POST["LName"] . "<br />";
	echo "Your City is: " . $_POST["City"] . "<br />";
	echo "Your State is: " . $_POST["State"] . "<br />";
	echo "<br />";
	echo "Your Message is: " . $_POST["Message"];
?>
</p>
</body>
</html>
