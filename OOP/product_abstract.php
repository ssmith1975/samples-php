<?
	// include the class file
	require_once 'class/Book2.php';
	require_once 'class/DVD2.php';
	
	try {
		$book = new Book2('PHP Object-Oriented Solutions', 300.9);
		$book->setManufacturerName('friends of ED');		
	} catch (Exception $e) {
	  echo '<p><strong>Message:</strong> ' . $e->getMessage() . '</p>';
	}
	


	$dvd = new DVD2('Atonement', '2 hr 10 min');
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Object Oriented Solutions -Creating Abstract Classes and Methods</title>
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>

<body>
<h1>PHP Object Oriented Solutions</h1>
<h3>Creating Abstract Classes and Methods</h3>
<p>We convert the <em>Product2</em> class into an abstract class which can't be instantiated. Therefore <em>Product2</em> serves as a parent to subclasses <em>Book2</em> and <em>DVD2</em>. Abstract classes can include abstract methods to mandate methods each child classes must have. <em>Book2</em> and <em>DVD2</em> must have a method called <em>display()</em>.</p>
<p><strong>Products</strong></p>
	<table width="600">
		<tr>
			<th scope="col">&nbsp;</th>
			<th scope="col">Description</th>
		</tr>
		<tr>
			<th scope="row">Product 1</th>
			<td><?=$book->display(); ?><br /><em>Manufacturer: <?= $book->getManufacturerName(); ?></em></td>
		</tr>
		<tr>
			<th scope="row">Product 2</th>
			<td><?=$dvd->display();?></td>
		</tr>
	</table>
	
	<h3>Interfaces</h3>
	<p>An Interface is like a contract in which classes that implement them agree to define all of its methods. Both <em>Book2</em> and <em>DVD2</em> implement the <em>IRemove</em> interface that requires each to create a method called <em>Remove()</em>. <em>IRemove</em> is available to unrelated clases.</p>
<p><?= $book->remove();?></p>
	<p><?= $dvd->remove();?></p>
</body>
</html>
