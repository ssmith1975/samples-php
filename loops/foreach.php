<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Foreach Loop</title>
</head>

<body>
<h2>Foreach Loop</h2>

<p>
<?php 
$my_array = array('red', 'green', 'blue');
echo "The different colors include: ";

foreach($my_array as $value) {
	$colors .= $value . " ";
}
	
echo $colors;	

?>
</p>
</body>
</html>
