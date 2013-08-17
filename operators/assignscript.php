<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Using Assignment Operators</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?
	$origVar = 100;
	echo "<p>Original value is $origVar</p>";
	
	$origVar += 25;
	echo "<p>Added a value, now it's $origVar</p>";
	
	$origVar -= 12;
	echo "<p>Subtracted a value, now it's $origVar</p>";
	
	$origVar .= " chickens";
	echo "<p>Final answer: $origVar</p>";
?>

</body>
</html>
