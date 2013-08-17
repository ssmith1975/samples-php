<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Using Comparison Operators</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
 
<body>
<?
	$a = 21;
	$b = 15;
	echo "<p>Original value of \$a is $a and \$b is $b</p>";
	
	if ($a == $b) {
		echo "<p>TEST 1: \$a equals \$b</p>";
	} else {
		echo "<p>TEST 1: \$a is not equal to \$b</p>";
	}
	
	if ($a != $b) {
		echo "<p>TEST 2: \$a is not equal to \$b</p>";
	} else {
		echo "<p>TEST 2: \$a is equal to \$b</p>";
	}
	
	if ($a > $b) {
		echo "<p>TEST 3: \$a is greater than \$b</p>";
	} else {
		echo "<p>TEST 3: \$a is not greater than \$b</p>";
	}
	
	if ($a < $b) {
		echo "<p>TEST 4: \$a is less than \$b</p>";
	} else {
		echo "<p>TEST 4: \$a is not less than \$b</p>";
	}
	
	if ($a >= $b) {
		echo "<p>TEST 5: \$a is greater than or equal to \$b</p>";
	} else {
		echo "<p>TEST 5: \$a is not greater than or equal to \$b</p>";
	}
	
	if ($a <= $b) {
		echo "<p>TEST 6: \$a is less than or equal to \$b</p>";
	} else {
		echo "<p>TEST 6: \$a is not less than or equal to \$b</p>";
	}
?>

</body>
</html>
