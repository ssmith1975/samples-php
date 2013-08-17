<?
	$cookie_name = "test_cookie";
	$cookie_value = "test string!";
	$cookie_expire = time() + 86400;
	$cookie_domain = "soultyde.com";
	
	setcookie($cookie_name,$cookie_value,$cookie_expire,"/",$cookie_domain,0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Set Test Cookie</title>
</head>

<body>
	<h1>Mmmmmmmmmmmm...cookie!</h1>
</body>
</html>
