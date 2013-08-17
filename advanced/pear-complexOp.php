
<?php
// Add ComplexOp pear libary to program
require_once 'Math/ComplexOp.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reusing Functions</title>
</head>

<body>

<h2>Pear Demo: ComplexOp</h2>


<?php


	// Instantiate complex object
	$z = new Math_Complex(1,2);

	// Display complex number in a readable format
	echo "<p>Original complex number:" .  $z->toString() . "</p>";
	
	// Get the conjugate of the complex number
	$conj = Math_ComplexOp::conjugate($z) ;

	// Display the conjugate as a string
	echo "<p>Conjugate: " . $conj->toString() . "</p>";
	
	// Multiply complex number by its conjugate
	$mult = Math_ComplexOp::mult($z, $conj);

	// Display result
	echo "<p>Multipling complex by its conjugate: " . $mult->toString() . "</p>";


?>
</p>
</body>
</html>
