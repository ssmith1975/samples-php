<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Using Logical Operators</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?
	$degrees = "95";
	$hot = "yes";
	
	if (($degrees > 100) || ($hot == "yes")) {
		echo "<p>TEST 1: It's <strong>really</strong> hot!</p>";
	} else {
		echo "<p>TEST 1: It's bearable.</p>";
	}
	
	if (($degrees > 100) && ($hot == "yes")) {
		echo "<p>TEST 2: It's <strong>really</strong> hot!</p>";
	} else {
		echo "<p>TEST 2: It's bearable.</p>";
	}
?>
</body>
</html>
