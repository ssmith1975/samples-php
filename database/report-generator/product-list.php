<?php
// Error Reporting
//require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php'); 

// Define path to database connection stuff
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);


// Database connection
require_once(ROOT_PATH .'/_includes/conn_db-general.php'); 


// Create SQL string
$query = "SELECT productName, productLine, productVendor, quantityInStock FROM sample_products ORDER BY productName;";

// Result type
$fetchIt = "arrayResults"; // based upon multiple or single results... $fetchIt = arrayResults | scalarResult

// Report title
$reportTitle = "Product List";

// Table id 
$tableId = "dataTbl";

// Table Info 
//	( columnTitle = "Column Label", sqlColumnName = "Database Column Name", columnWidth = "Column Width  - x% | integer", columnAlign = " left | center | right"
//	 image = "Image Filename", imageDir = "Director where images are located on the server", width = "Image width", height="Image height")
$columns = array( 
	array("columnTitle" => "Product Name", "sqlColumnName" => "productName",  "columnWidth" => "40%"), 
	array("columnTitle" => "Product Line", "sqlColumnName" => "productLine",  "columnWidth" => "20%"),
	array("columnTitle" => "Product Vendor", "sqlColumnName" => "productVendor", "columnWidth" => "30%"),
	array("columnTitle" => "Quantity in Stock", "sqlColumnName" => "quantityInStock", "columnWidth" => "10%", "columnAlign" => "right")
);

// Title of the summary results, sql name of the  column to sum, class name
$summary = array ("Title" => "Total in Stock", "ColumnToSUM" => "quantityInStock", "ColumnToSumClass" => "sumColumn");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Report Generator</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<?php require_once(ROOT_PATH.'/database/report-generator/includes/js_jquery_core.php'); ?>



</head>

<body>

	<div id="wrapper">
		<div id="content">
			<h1>Simple Report Generator</h1>
			<div>
			<!-- Begin table generation -->
			<?php include("report_tmpl.php"); ?>
			<!-- End table generation -->
			</div>
			<div id="nav">
				<p><a href="products.php">Scalar Demo</a></p>
			</div>
		</div>
	</div>
<script language="javascript" type="text/javascript" src="js/jquery-effects.js"></script>	
</body>
</html>
