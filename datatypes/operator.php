<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Operator</title>
</head>

<body>
<h2>PHP Operators</h2>

<p>
<?php
// The addition operator

$sum = 5 + 2;
$sum = 7;

$newsum = $sum + 4;

echo "The sum is " . $newsum . "<br />";

// The subtraction operator

$difference = $newsum - 2;

echo "The difference is " . $difference . "<br />";

// The multiplication operator

$product = $difference * 3;

echo "The product is " . $product . "<br />";

// The division operator

$quotient = $product/$difference;

echo "The quotient is " . $quotient . "<br />";

// The increment operator

$quotient++;

echo "The increment of the quotient is " . $quotient . "<br />";

// The decrement operator

$quotient--;

echo "The decrement of the quotient is " . $quotient . "<br />";

?>
</p>

<h2>Order of Operations</h2>

<p>
<?php
$num1 = 4;
$num2 = 5;
$num3 = 2;
echo "<h3>$num1 * $num2 - $num3</h3>";
$answer =  $num1 * $num2 - $num3;
echo $answer;
echo "<h3>$num1 * ($num2 - $num3)</h3>";
$answer = $num1 * ($num2 - $num3);
echo $answer;

?>
</p>

</body>
</html>
