<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Arithmetic Operators</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?
	$a = 85;
	$b = 24;
	echo "<p>Original value of \$a is $a and \$b is $b</p>";
	
	$c = $a + $b;
	echo "<p>Added \$a and \$b and got $c</p>";
	
	$c = $a - $b;
	echo "<p>Subtracted \$b from \$a and got $c</p>";
	
	$c = $a / $b;
	echo "<p>Divided \$a by \$b and $c</p>";
	
	$c = $a % $b;
	echo "<p>The modulus of \$a and \$b is $c</p>";
	
?>

</body>
</html>
