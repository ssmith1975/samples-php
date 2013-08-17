<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	include "DB_mysql.php";  // load database library
	
?>

<?php
	// Replace text with your own database configurations
	$hostname = "[DATABASE SERVER]"; // example: "mydbserver.com"
	$username="[USER NAME]"; // example: "admin"
	$password="[PASSWORD]"; // example: "password"
	$dbname="[DATABASE NAME]"; // example: "mydatabase"

	// Create DB_mysql object
	$testdb = new DB_mysql($hostname, $username, $password);

	// Select database
	$testdb->select_db($dbname);
	
	// Scalar result demo
	$testdb->set_query("SELECT COUNT(*) FROM schools;");
	$row_count = $testdb->get_scalar_result();	
	
	// Single row result demo
	$testdb->set_query("SELECT * FROM schools WHERE school_id=5;");
	$row_data = $testdb->get_row_result();
	
	// Multiple rows result demo
	$testdb->set_query("SELECT * FROM schools;");
	$rows = $testdb->get_array_result();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DB MYSQL CLASS DEMO</title>
</head>

<body>

<div class="wrapper">
<h1>PHP Mysql Class</h1>

<h2>Scalar Result Demo</h2>
<p><strong>Number of Schools:</strong> <?= $row_count; ?></p>

<h2>Single Row Result Demo</h2>
<p><strong>School:</strong> <?= $row_data['school']; ?></p>
<p><strong>City:</strong> <?= $row_data['city']; ?></p>
<p><strong>State:</strong> <?= $row_data['state']; ?></p>

<h2>Multiple Rows Result Demo</h2>

<ul>
<?php foreach($rows as $item) { ?>
	<li><?php echo $item['school']; ?></li>
<?php } ?>
</ul>

</div>

</body>
</html>
