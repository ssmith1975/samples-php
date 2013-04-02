<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>For Loop</title>
</head>

<body>
<h2>For Loop</h2>
<p>
<?php 
for ($counter=1; $counter < 5; $counter++) {
	echo "Welcome to PHP";
	echo "<br />";
}	
?>
</p>

<h3>Iterating Array Values</h3>
<p>
<?php 
// Create a new array containing 5 color values
$color = array('red', 'green', 'blue', 'yellow', 'white');

// Use a for loop to iterate through the array and display each element

for ($i = 0; $i < sizeof($color); $i++) {
	echo "Array value " . ($i+1) . " is $color[$i].";
	echo "<br />";

}
?>
</p>
</body>
</html>
