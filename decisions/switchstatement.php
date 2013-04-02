<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Switch Statement</title>
</head>

<body>

<h2>Switch Statement</h2>
<p>
<?php
$number = 25;

switch ($number) {

case 40:
	echo "The value of \$number is 40";
	break;

case 25:
	echo "The value of \$number is 25";
	break;
	
default:
	echo "The value of $\number is not 25 or 40";
}
?>
</p>
</body>
</html>
