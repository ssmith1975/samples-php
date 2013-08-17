<?
//check for required fields
if ((!$_POST[id]) || (!$_POST[format]) || (!$_POST[title])) {
	header("Location: show_addrecord.html");
	exit;
}
//connect to MySQL, set up database, and table names
require("../includes/db_connection.inc");

$table_name="my_music";

//create SQL statement and issue query
$sql = "INSERT INTO $table_name
	(id, format, title, artist_fn, artist_ln, rec_label, my_notes, date_acq) VALUES
	('$_POST[id]','$_POST[format]','$_POST[title]','$_POST[artist_fn]','$_POST[artist_ln]','$_POST[rec_label]','$_POST[my_notes]','$_POST[date_acq]')";

$result=@mysql_query($sql,$db_conn) or die(mysql_error());
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add a Record</title>
</head>

<body>
<h1>Adding a Record to <? echo "$table_name"; ?></h1>

<table cellspacing="3" cellpadding="3">
	<tr>
    	<td valign="top">
        	<p><strong>ID:</strong><br />
			<? echo "$_POST[id]"; ?></p>
            <p><strong> Date Acquired (YYYY-MM-DD):</strong><br />
			<? echo "$_POST[date_acq]"; ?></p>
        </td>
        <td valign="top">
        <p><strong>Format:</strong><br />
		<? echo "$_POST[format]"; ?></p>
        </td>
    </tr>
    <tr>
    	<td valign="top">
        	<p><strong>Title:</strong><br />
			<? echo "$_POST[title]"; ?></p>
        </td>
    	<td valign="top">
        	<p><strong>Record Label:</strong><br />
			<? echo "$_POST[rec_label]"; ?></p>
        </td>
    </tr>
    <tr>
    	<td valign="top">
        	<p><strong>Artist's First Name:</strong><br />
			<? echo "$_POST[artist_fn]"; ?></p>
        </td>
    	<td valign="top">
        	<p><strong>Artist's Last Name (or Group Name):</strong><br />
			<? echo "$_POST[artist_ln]"; ?></p>
        </td>
    </tr>
    <tr>
    	<td valign="top" colspan="2" align="center">
        	<p><strong>My Notes:</strong><br />
			<? echo stripslashes($_POST[my_notes]); ?></p>
            <p><a href="show_addrecord.html">Add Another</a></p>
        </td>
    </tr>
</table>

</body>
</html>
