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
$members = array('FName' => 'John', 'LName' => 'Smith', 'Age' => 50);

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
echo implode(", ", $numbers) . "<br />";
echo "Colors array:";
echo implode(", ", $colors) . "<br />";




echo "<br />";
// determins the size of the array $numbers - 6

$array_size = sizeof($numbers);

echo "Array size of the 'numbers' array: $array_size <br />";

// sorts the elements of the $numbers array - returns array(7,10,18,20,30,50)
sort($numbers);
echo "Sort numbers array: ";
echo implode(", ", $numbers) . "<br />";

// randomizes the elements of the $numbers array
shuffle($numbers);
echo "Shuffle numbers array: ";
echo implode(", ", $numbers) . "<br />";


echo "<br />";

// $merged_array returns array(7,10,18,20,30,50,'red',blue','green')

$merged_array = array_merge($numbers,$colors);

echo "Merge color array with numbers as a new array called 'merged': ";
echo implode(", ", $merged_array) . "<br />";

// slice the numbers 18 and 20 from the sorted $numbers array
// array $slice returns array(30 ,18) after sort and shuffle
$slice = array_slice($numbers, 2, 2);

echo "Slice numbers array start index: 2, length: 2: ";
echo implode(", ", $slice) . "<br />";


// Shift 1st element out, and return it
$shifted = array_shift($numbers);
echo "Shift numbers array: ". implode(", ", $numbers) . "<br />";
echo "Shift numbers array (returned value): $shifted <br />";


// UnShift array, prepend element to the beginning
$unshifted = 8;
array_unshift($numbers, $unshifted);

echo "Unshift numbers array (inserted value): $unshifted <br />";
echo "Unshift numbers array: ". implode(", ", $numbers) . "<br />";

// Remove last element from numbers array and return it
$popped= array_shift($numbers);
echo "Pop numbers array: ". implode(", ", $numbers) . "<br />";
echo "Pop numbers array (returned value): $popped <br />";

// Add an element on the end of numbers array
$pushed = 25;
array_push($numbers, $pushed);

echo "Push numbers array (inserted value): $pushed <br />";
echo "Push numbers array: ". implode(", ", $numbers) . "<br />";




?>
</p>

</body>
</html>
