<?php
if ($_POST['submit'] == "Login") {

	// script to check user name and password would be coded here
	
		
	// if authentication is successful
	if ($_POST['pass'] == "myPass") {
	session_start();
	$_SESSION['access'] = "true";
	$_SESSION['username'] = $_POST['uname'];
	
	header('Location:access.php');
	
	} else {
	echo "<h3>Login Failed!</h3>";
	}

}

if ($_POST['submit'] == "Log Out") {
	
	// if the user decides to exit
	session_destroy();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
</head>



<body>
<h2>Login</h2>
<form action="access.php" method="post">
Username: <input type="text" name="uname" /><br />
Password: <input type="password" name="pass" /><br />
<input type="submit" name="submit" value="Login" />
</form>

</body>
</html>
