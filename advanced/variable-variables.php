<?php
// variable-variables.php


$a = "From 'a'";
$b = "From 'b'";
$c = "From 'c'";

$d = array(1,2,3);




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Variable Variables</title>
</head>

<body>
<h1>Variable Variables Names</h1>
<p>Create a variable name 'x' that can be set and used dynamically...</p>
<h2>Simple</h2>
<h3>Declare Variables</h3>
<pre>
	$a = "From 'a'";
	$b = "From 'b'";
	$c = "From 'c'";

	$d = array(1,2,3);
</pre>

<h3>Variable holder holding 'a'</h3>

<pre>
	$x = "a"; // Variable holder holding 'a
	echo  $$x ;
</pre>
<p><strong>Result:</strong><br/>
	<?php
		$x = "a"; // Variable holder holding 'a'
		echo  $$x ;
	?>
</p>

<h3>Variable holder holding 'b'</h3>
<pre>
	$x = "b"; // Variable holder holding 'b'
	echo  $$x ;
</pre>
	
<p><strong>Result:</strong><br/>
	<?php
		$x = "b"; // Variable holder holding 'b'
		echo  $$x ;
	?>
</p>

<h2>Arrays</h2>
<h3>Get 1st element, then evaluate dynmaically</h3>
<pre>
    $x = "abc"; 
     echo ${$x[0]}.", ";   
     echo ${$x[1]}.", ";       
     echo ${$x[2]};
</pre>
<p><strong>Result:</strong><br/>
<?php
	$x = "abc";	
     echo ${$x[0]}.", ";   
     echo ${$x[1]}.", ";       
     echo ${$x[2]};  
?>
</p>

<h3>Evaluate dynamically, then get the 1st element</h3>
<pre>
	$x = "d";	
	echo ${$x}[2];
</pre>
<p><strong>Result:</strong><br/>
<?php
	$x = "d";	
	echo ${$x}[2];
?>
</p>


</body>
</html>
