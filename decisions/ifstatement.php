<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>If Statements</title>
</head>

<body>
<h2>If Statements</h2>
<p>
<?php
$number = 5;

if ($number <= 10) {
	echo "The number is less than or equal to 10.";
	}
?>
</p>

<h3>If...else Statement</h3>
<p>
<?php
$number = 5;

if ($number <=10) {
	echo "The number is less than or equal to 10.";
} else {
	echo "Number is greater than 10.";
}		
?>

<h3>If...elseif...else Statement</h3>

<p>
<?php
$number = 15;

if ($number < 10) {
	echo "Number is less than 10.";
} elseif ($number == 10) {
	echo "Number is equal to 10.";
} else {
	echo "Number is greater than 10.";
}
?>
</p>

</p>

</body>
</html>
