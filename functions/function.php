<?php
// Error Reporting
//require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

// Add Numbers - a function that takes to numbers and return their sum.
function AddNumbers($num1,$num2) {
	return $num1 + $num2;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reusing Functions</title>
</head>

<body>

	<h2>Reusing Functions</h2>
	<p>
	<?php
		// Display result
		echo "The sum of 5 and 2 is " . AddNumbers(5,2);	
	?>
	</p>
</body>
</html>
