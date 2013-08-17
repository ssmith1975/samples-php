<?php
// Error reporting
// require_once($_SERVER['DOCUMENT_ROOT'].'/_includes/error_reporting.php');

// Check logout querystring status
if(isset($_GET['logout']) && ($_GET['logout'] == 1)) {
	// Kill the cookie by setting moving expiration into past time
	$expire=time()-(60*60*24*1000); // Set to expire in 1 day from current time
	
	// Set cookie variables
	$cookie_name="auth";
	$cookie_value="ok";
	$cookie_expire= $expire;
	$cookie_domain= $_SERVER['HTTP_HOST'];

	// Set cookie
	setcookie($cookie_name,$cookie_value,$cookie_expire,"/",$cookie_domain,false);	
}
// Redirect to login page
header("Location: show_login.html");
exit;
?>