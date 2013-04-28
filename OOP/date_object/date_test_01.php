


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Object Oriented Solutions - DateTime</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>

<body>
	<h1>PHP Object Oriented Solutions - DateTime</h1>
<h3>Reflection API</h3>
<p>The <em>Reflection API</em> provides us information about functions, classes, and objects. <strong>Reflection::export(new ReflectionClass('DateTime'))</strong> will show what properties and methods are available when we use the <em>DateTime</em> class.</p>
<pre>
<?
Reflection::export(new ReflectionClass('DateTime'));
?>
</pre>	
	
	
<?
$date = new DateTime();
?>	
	<h3>Format Date</h3>
	<p><strong>$date->format('l, F jS, Y');</strong><br /><?=  $date->format('l, F jS, Y'); ?></p>
	
	
<?
$date = new DateTime('next Thursday');
?>	
	
	<p><strong>DateTime('next Thursday')</strong><br /><?=  $date->format('l, F jS, Y'); ?></p>
	
	
<?
$date = new DateTime();
?>	
	
	<p><strong>DateTime::ATOM</strong><br /><?= $date->format(DateTime::ATOM) ?></p>
	
	
<?
$date = new DateTime();


?>	

<?
$dateModify = new DateTime('now');
$dateModify->modify('+2 months');

$dateSet = new DateTime('now');
$dateSet->setDate(2010, 8, 8); 
?>

	<h3>Modify and Set Date</h3>
	<p><strong>$dateModify->modify('+2 months');</strong><br /><?=  $dateModify->format('l, F jS, Y'); ?></p>
	<p><strong>$dateSet->setDate(2008, 8, 8);</strong><br /><?=  $dateSet->format('l, F jS, Y'); ?></p>	
	
	
</body>
</html>
