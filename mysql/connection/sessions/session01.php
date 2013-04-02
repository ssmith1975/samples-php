<?
//start a session
session_start();

//check for stored values and register defaults
if ((!$_SESSION[font_family]) || (!$_SESSION[font-size])) {
	$font_family = "sans-serif";
	$font_size = "10";

	$_SESSION[font_family]=$font_family;
	$_SESSION[font_size]=$font_size;
	
} else {
	$font_family=$_SESSION[font_family];
	$font_size=$_SESSION[font_size];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Display Preference</title>
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
	<h1>Set Your Display Preferences</h1>
    <form method="post" action="session02.php">
    	<p>Pick a Font Family:<br />
		<input type="radio" name="sel_font_family" value="serif" /> serif
        <input type="radio" name="sel_font_family" value="sans-serif" checked="checked" /> sans-serif
        <input type="radio" name="sel_font_family" value="Courier" /> Courier
        <input type="radio" name="sel_font_family" value="Wingdings" /> Wingdings
        </p>
        
        <p>Pick a Base Font Size:<br />
		<input type="radio" name="sel_font_size" value="8" /> 8pt
        <input type="radio" name="sel_font_size" value="10" checked="checked" /> 10pt
        <input type="radio" name="sel_font_size" value="12" /> 12pt
        <input type="radio" name="sel_font_size" value="14" /> 14pt
        </p>
        
        <p><input type="submit" name="submit" value="Set Display Preferences" /></p>
    </form>
</body>
</html>
