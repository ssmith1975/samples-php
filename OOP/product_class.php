<?
	// include the class file
	require_once 'class/Product.php';

	
	$product1 = new Product('Book', 'PHP Object-Oriented Solutions');
	$product2 = new Product('DVD', 'Atonement');
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Object Oriented Solutions - Creating Classes and Objects</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>

<body>
<h1>PHP Object Oriented Solutions</h1>
<h3>Creating Classes and Objects</h3>
	<p>Here we have a class named <em>Product</em> with properties called <em>type</em> and <em>title</em> which can be set upon instantiation. It contains two methods <em>getProductType</em> and <em>getTitle</em> that allow us to retrieve type and title values for output.</p>
<p><strong>Products</strong></p>
	<table width="400">
		<tr>
			<th scope="col">&nbsp;</th>
			<th scope="col">Type</th>
			<th scope="col">Title</th>
		</tr>
		<tr>
			<th scope="row">Product 1</th>
			<td><?=$product1->getProductType(); ?></td>
			<td><?=$product1->getTitle();?></td>
		</tr>
		<tr>
			<th scope="row">Product 2</th>
			<td><?=$product2->getProductType();?></td>
			<td><?=$product2->getTitle();?></td>
		</tr>
	</table>
</body>
</html>
