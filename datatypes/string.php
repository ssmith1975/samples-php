<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Strings</title>
</head>

<body>
<h2>Strings</h2>
<h3>Single Quoted Strings</h3>
<p>
<?php
// A literal string displayed in the browser window

echo 'PHP was developed in 1994 by Rasmus Lerdorf';
echo "<br />";

// A literal string assigned to a variable

$string = 'Since its development, PHP has become a popular scripting language.';echo $string;
echo "<br />";

// Escaping single quotes

echo 'The array contains the values \'2,5,3,4\'.';
echo "<br />";

// Invalid attempt to expand a variable inside of a single quote string

$name = 'John Smith';
echo 'The user\'s name is $name';

 
?>
</p>

<h3>Double Quoted Strings</h3>
<p>
<?php
echo "PHP is supported by many operating systems including Windows and Linux.";
echo "<br />";

$name = "John";
echo "The user's name is $name.";
echo "<br />";

$fruits = array('grapes', 'peaches', 'strawberries');
echo "My favorite fruit is $fruits[0].";
echo "<br />";
?>
</p>

<h3>String Functions</h3>
<p>
<?php
$string = "Hello World";
$another_string = "Welcome to PHP";

echo strlen($string);
echo "<br />";
echo strtoupper($another_string);
echo "<br />";
echo strrev($another_string);
echo "<br />";
// echo strpbrk($string, "W");


?>
</p>
</body>
</html>
