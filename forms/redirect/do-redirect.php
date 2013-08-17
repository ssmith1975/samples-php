<?php
	if ($_POST[location] == "") {
		header("Location: redirect_form.html");
		exit;
	} else {
		header("Location: $_POST[location]");
		exit;
	}
	
?>

