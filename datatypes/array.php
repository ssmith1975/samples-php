<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Array Variables</title>
</head>

<body>
<h2>Numerical Indexed Arrays</h2>

<p>
<?php

$my_array = array('red', 'green', 'blue');

echo "The first value of the array is " . $my_array[0] . "<br/>";
echo "The second value of the array is " . $my_array[1] . "<br/>";
echo "The third value of the array is " . $my_array[2] . "<br/>";
?>
</p>

<h2>Associative Arrays</h2>

<p>
<?php
$members = array('FName' => John, 'LName' => Smith, 'Age' => 50);

echo "The user's first name is: " . $members['FName'] . "<br />";
echo "The user's last name is: " . $members['LName'] . "<br />";
echo "The user's age is: " . $members['Age'] . "<br />";

?>
</p>

<h2>Array Functions</h2>

<p>
<?php

//Two arrays are created

$numbers = array(50,20,18,30,10,7);
$colors = array('red', 'blue', 'green');

echo "Numbers array:";
for ($i = 0; $i < sizeof($numbers); $i++)
{
	echo " $numbers[$i]";
}
echo " <br />";
// determins the size of the array $numbers - 6

$array_size = sizeof($numbers);

echo "Array size of the 'numbers' array: $array_size <br />";

// sorts the elements of the $numbers array - returns array(7,10,18,20,30,50)

sort($numbers);

// randomizes the elements of the $numbers array

shuffle($numbers);

// $merged_array returns array(7,10,18,20,30,50,'red',blue','green')

$merged_array = array_merge($numbers,$colors);


// slice the numbers 18 and 20 from the sorted $numbers array
// array $slice returns array(18,20)

$slice = array_slice($numbers, 2, 2);

?>
</p>

</body>
</html>
