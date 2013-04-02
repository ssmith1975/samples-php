<?
//start a session
session_start();

if (($_POST[sel_font_family]) && ($_POST[sel_font_size])) { //user preference set and changed
	//extract values from form
	$font_family = $_POST[sel_font_family];
	$font_size = $_POST[sel_font_size];
	//register defaults
	$_SESSION[font_family]=$font_family;
	$_SESSION[font_size]=$font_size;
	
} else if ((!$_POST[sel_font_family]) && (!$_POST[sel_font_size]) && ($_SESSION[font_family]) && ($_SESSION[font-size]) ) { //user preference set but not changed
	//extract values from session
	$font_family=$_SESSION[font_family];	
	$font_size=$_SESSION[font_size];
	//register defaults
	$_SESSION[font_family]=$font_family;
	$_SESSION[font_size]=$font_size;
} else { 
	//use default 
	$font_family ="sans-serif";
	$font_size = "10";
	//register defaults
	$_SESSION[font_family] = $font_family;
	$_SESSION[font_size] = $font_size;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Display Preferences</title>
<style type="text/css">
	body, p, a {
		font-family:<? echo "$font_family"; ?>;
		font-size:<? echo "$font_size"; ?>pt;
		font-weight:normal;
	}
	h1 {
		font-family:<? echo "$font_family"; ?>;
		font-size:<? echo "$font_size + 4"; ?>pt;
		font-weight:bold;		
	}
</style>

</head>

<body>
	<h1>Your Preferences Have Been Set</h1>
    <p>As you can see, your selected font family is now
    <? echo "$font_family"; ?>, with a base size of
    <? echo "$font_size"; ?> pt.</p>
    
    <p>Please feel free to <a href="session01.php">change your preferences</a> again.</p>
</body>
</html>
