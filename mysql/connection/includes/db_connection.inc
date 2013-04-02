<?
$db_conn=@mysql_connect ("localhost", "uprising_stuser",
"\$hellno") or die('Cannot connect to the database because: ' . mysql_error());
mysql_select_db ("uprising_stdb");
?>