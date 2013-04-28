<?
	// include the class file
	require_once 'class/Book.php';
	require_once 'class/DVD.php';
	
	$book = new Book('PHP Object-Oriented Solutions', 300);
	$dvd = new DVD('Atonement', 60);
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Object Oriented Solutions - Using Inheritance to Extend a Class</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>

<body>
<h1>PHP Object Oriented Solutions</h1>
<h3>Using Inheritance to Extend a Class</h3>
<p>We derive two new classes from <em>Product</em> that describes our objects in greater detail. For example, we can create a subclass called  <em>Book</em> that has an additional property called <em>pageCount</em> to provide us the number of pages. Also, we can create another subclass called <em>DVD</em> for our DVD products which provide us a duration whether than page count.</p>

<p><strong>Products</strong></p>
	<table width="600">
		<tr>
			<th scope="col">&nbsp;</th>
			<th scope="col">Type</th>
			<th scope="col">Title</th>
			<th scope="col">Page Count</th>
			<th scope="col">Duration</th>
		</tr>
		<tr>
			<th scope="row">Product 1</th>
			<td><?=$book->getProductType(); ?></td>
			<td><?=$book->getTitle();?></td>
			<td><?=$book->getPageCount();?></td>
			<td></td>
		</tr>
		<tr>
			<th scope="row">Product 2</th>
			<td><?=$dvd->getProductType();?></td>
			<td><?=$dvd->getTitle();?></td>
			<td>&nbsp;</td>
			<td><?=$dvd->getDuration();?></td>
		</tr>
	</table>
	<!--<h3>Static Properties</h3>
	<p>There are  //$book->num; book(s)</p>-->
</body>
</html>
