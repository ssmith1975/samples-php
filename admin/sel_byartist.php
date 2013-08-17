<?
require("../includes/db_connection.inc");
$table_name = "my_music";

$sql = "SELECT id, format, title, trim(concat(artist_fn,' ',artist_ln)) AS artist_fullname, rec_label, my_notes, date_acq FROM $table_name ORDER BY artist_fullname";

$result = @mysql_query($sql,$db_conn) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
	$id = $row['id'];
	$format = $row['format'];
	$title = $row['title'];
	$artist_fullname = stripslashes($row['artist_fullname']);
	
	$rec_label = stripslashes($row['rec_label']);
	$my_notes = stripslashes($row['my_notes']);
	$date_acq = stripslashes($row['date_acq']);
	/*
	 if ($artist_fn != "") {
		$artist_fullname = trim("$artist_fn $artist_ln");
	} else {
		$artist_fullname = trim("$artist_ln");
	}
	*/
	if ($date_acq == "0000-00-00") {
		$date_acq = "[unknown]";
	}
	
	$display_block .= "<p><strong>$title</strong> on $rec_label, by $artist_fullname<br />
						$mynotes <em>(acquired:$date_acq, format:$format)</em></p>";					
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Music: Ordered by Title</title>
</head>

<body>
	<h1>My Music: Ordered by Artist</h1>
    <? echo "$display_block"; ?><title>My Music: Ordered by Artist</title>
    <p><a href="my_menu.html">Return to Menu</a></p>
</body>
</html>
