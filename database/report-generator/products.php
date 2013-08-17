<?php
// Error Reporting
require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

// Define path to database connection stuff
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);


// Database connection
require_once(ROOT_PATH .'/_includes/conn_db-general.php'); 

// Create SQL string
$query = "SELECT COUNT(*) AS numberOfProducts FROM sample_products";

// Result type
$fetchIt = "scalarResult"; //a delegate function based upon multiple or single results... $fetchIt = arrayResults | scalarResult
$resultData = array("Row" => 0, "Field" => 0); // Row = "Row Index", Field = "Field Name/Index"

// Report title
$reportTitle = "Product Total";

// Table id 
$tableId = "dataTbl";

$scalar = array ("Title" => "Number of Products"); // Title = "Result Title"


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Report Generator</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<?php // require_once(ROOT_PATH.'/database/report-generator/includes/js_jquery_core.php'); ?>

</head>

<body>

	<div id="wrapper">
		<div id="content">
			<h1>Simple Report Generator</h1>
			<div style="width: 400px; margin: 0px auto;">
			<!-- Begin table generation -->
			<?php include("report_tmpl.php"); ?>
			<!-- End table generation -->
			</div>
			<div id="nav">
				<p><a href="product-list.php">Table Demo</a></p>
			</div>			
			
		</div>
	</div>
<!-- JQuery Effects Script -->	
<script language="javascript" type="text/javascript" src="js/jquery-effects.js"></script>		
</body>
</html>
