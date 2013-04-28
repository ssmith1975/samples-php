<? require_once 'Pos/Date.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Object Oriented Solutions - DateTime</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>
<h1>PHP Object Oriented Solutions - Custom Date and Time Class</h1>
<?

require_once 'Pos/Date.php';
try {
  // create a Pos_Date object for the default time zone
  $local = new Pos_Date();
  // use the inherited format() method to display the date and time
  echo '<p>Local time: ' . $local->format('F jS, Y h:i A') . '</p>';

  // create a DateTimeZone object
  $tz = new DateTimeZone('Asia/Tokyo');
  // create a new Pos_Date object and pass the time zone as an argument
  $Tokyo = new Pos_Date($tz);
  echo '<p>Tokyo time: ' . $Tokyo->format('F jS, Y h:i A') . '</p>';
} catch (Exception $e) {
  echo $e;
}

?>
<h3>SetDate and SetTime</h3>
<?

try {
  // create a Pos_Date object for the default time zone
  $local = new Pos_Date();
  // use the inherited format() method to display the date and time
  echo '<p>Time now: ' . $local->format('F jS, Y h:i A') . '</p>';
  $local->setTime(12, 30);
  $local->setDate(2008, 8, 8);
  echo '<p>Date and time reset: ' . $local->format('F jS, Y h:i A') .
'</p>';
} catch (Exception $e) {
  echo $e;
}

?>

<h3>Outputting Dates in Common Formats</h3>
<?
	try {
	  // create a Pos_Date object
	  $date = new Pos_Date();
	  // set the date to July 4, 2008
	  $date->setDate(2008, 7, 4);
	  // use different methods to display the date
	  echo '<p>getMDY(): ' . $date->getMDY() . '</p>';
	  echo '<p>getMDY(1): ' . $date->getMDY(1) . '</p>';
	  echo '<p>getDMY(): ' . $date->getDMY() . '</p>';
	  echo '<p>getDMY(1): ' . $date->getDMY(1) . '</p>';
	  echo '<p>getMySQLFormat(): ' . $date->getMySQLFormat() . '</p>';
	} catch (Exception $e) {
	  echo $e;
	}


?>
<h3>Calculating the Number of Days Between Two Dates</h3>

<?
try {
  // create two Pos_Date objects
  $now = new Pos_Date();
  $newYear = new Pos_Date();
  // set one of them to January 1, 2009
  $newYear->setDate(2009, 1, 1);

  // calculate the number of days
  $diff = Pos_Date::dateDiff($now, $newYear);
  $unit = abs($diff) > 1 ? 'days' : 'day';
  if ($diff == 0) {
      echo 'Happy New Year!';
  } elseif ($diff > 0) {
      echo "$diff $unit left till 2009";
  } else {
      echo abs($diff) . " $unit since the beginning of 2009";
  }
} catch (Exception $e) {
  echo $e;
}

?>

<h3>Creating a Default Date Format</h3>

<?
	$now = new Pos_Date();
	echo $now;

?>
<h3>Creating Read-Only Properties</h3>
<p>$date->getMDY(): <?=$date->getMDY(); ?></p>
<p>$date->MDY: <?=$date->MDY; ?></p>
<?  ?>
</body>
</html>