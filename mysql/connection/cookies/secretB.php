<?
if ($_COOKIE[auth] == "ok") {
	$msg = "<p>Welcome to secret page B, authorized user!</p>";
} else {
	header("Location: show_login.html");
	exit;
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Secret Page B</title>
</head>

<body>
	<? echo "$msg"; ?>
</body>
</html>
