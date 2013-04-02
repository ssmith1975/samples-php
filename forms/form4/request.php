<?php
if ($_POST['submit'] == "Submit Data") {

foreach($_REQUEST as $key => $value)
 	
	{
	
	echo $key;
	echo ": " . $value;
	echo "<br/>";
	
	} 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Typical XHTML Form</title>
</head>

<body>
<h2>Request collection Form Processing with PHP</h2>

<form action="request.php" method="post">
<table>
<tr>
	<td>First Name:</td> <td><input type="text" name="FName" /></td>
</tr><tr>
	<td>Last Name: </td> <td><input type="text" name="LName"  /></td>
</tr><tr>
	<td>City:</td> <td><input type="text" name="City" /></td>
</tr><tr>
	<td>State:</td> <td><input type="text" name="State" /></td>
</tr><tr>
	<td>Message:</td> <td><textarea name="Message" cols="30" rows="5"></textarea></td>
</tr>
</table>
<input type="submit" name="submit" value="Submit Data" />

</form>

</body>
</html>
