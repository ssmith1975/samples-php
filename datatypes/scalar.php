<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scalar Variables</title>
</head>

<body>
<p>
<h2>Displaying Variables</h2>
<?php

//Displaying Variables
$string_var = "My PHP program" . "<br/>";
$integer_var = 5000 . "<br/>";
$float_var = 2.25;

echo $string_var;
echo $integer_var;
echo $float_var;
?> 
</p>
<h2>Variable Concatenation</h2>
<p>
<?php
$fname = "John";
$lname = "Doe";

echo "The user's name is " . $fname . " " . $lname;
?>
</p>

<h3>Interpolation</h3>
<p>
<?php
$fname = "John";
$lname = "Doe";

echo "The user's name is $fname $lname";
?>
</p>

<h2>Formatting Currency Output</h2>
<p>

<?php

$amount = 35;
$tax = 2.50;
$total = $amount + $tax;
echo "$" . sprintf("%01.2f", $total);

?>
</p>
</body>
</html>
