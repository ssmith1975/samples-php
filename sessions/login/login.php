<?php
if ($_POST['submit'] == "Login") {
		
	// Script to check user name and password would be coded here
	session_start();	

	// if authentication is successful
	if ( ($_POST['pass'] == 'password') && ($_POST['uname'] == 'foo')){
		// Start session
		
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $_POST['uname'];
		
		if(isset($_SESSION['error'])) {
			// Clear error message
			unset($_SESSION['error']);
		}
		// Redirect to private page
		header('Location:access.php');
	
	} else {

		// Display failure messagse
		$_SESSION['loggedin'] = false;
		$_SESSION['error'] = '<p class="error">Login Failed!</p>';
		
	}

}

if ($_POST['logout'] == "Log Out") {
	
	// If the user decides to exit
	session_destroy();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page</title>
<style>
	body { font-family: Arial, Verdana, sans-serif;font-size: 16px;}
	h1 { font-size: 1.4em; color: #888; }
	h2 { font-size: 1.2em; }
	p.error { padding: 10px; border: 1px solid #c00; color: #c00; width: 200px;}
</style>
</head>



<body>
<h1>Session Authentication</h1>
<?php if (! $_SESSION['loggedin']) { ?>
	<h2>Login</h2>
		<p>Use <em>foo</em> for username and <em>password</em> for password.</p>
		<?php if (isset($_SESSION['error'])) { 
			// Display error message, if it exists
			echo $_SESSION['error'];
		}
		?>
		
		<form action="login.php" method="post">
		Username: <input type="text" name="uname" value="<?php echo $_POST['uname']; ?>" /><br />
		Password: <input type="password" name="pass"  /><br />
		<input type="submit" name="submit" value="Login" />
	</form>
<?php } else { ?>

	<h2>Logout</h2>
	
	<form action="access.php" method="post">
		<input type="submit" name="logout" value="Log Out" />
	</form>	

<?php
}
?>
</body>
</html>
