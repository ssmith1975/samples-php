<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Constant Variables</title>
</head>

<body>
<h2>Display Constants</h2>

<p>
<?php

define("STRING_CONST", "My PHP program");
define("INTEGER_CONST", 500);
define("FLOAT_CONST", 2.25);

echo STRING_CONST;
echo "<br />";
echo INTEGER_CONST;
echo "<br />";
echo FLOAT_CONST;
?>
</p>

</body>
</html>
