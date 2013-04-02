<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Redisplaying Form Values</title>
</head>

<body>
<h2>Redisplaying Form Values</h2>
<form action="redisplay.php" method="post">
<p>
First Name: <input type="text" name="FName" value="<?php echo $_POST['FName']?>"/><br/>
Last Name: <input type="text" name="LName" value="<?php echo $_POST['LName']?>"/><br/>

<input type="submit" name="submit" value="Submit Data" />
</p>
</form>



</body>
</html>
