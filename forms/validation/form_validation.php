<?php
// Determine if the submit button has been clicked. If so, begin validating form data.
	if ($_POST['submit'] != "submit") {
		header("Location:login.php");
		
	}		
		// Determine if a Name was entered
		
			$valid_form = true;
			
			if ($_POST['name'] == "") {
				echo "Enter your name" . "<br />";
				$valid_form = false;
			} else {
				$name = $_POST['name'];
			}
			
			if ($_POST['uname'] == "") {
				echo "Enter a user name" . "<br />";
				$valid_form = false;
			} else {
				$username = $_POST['uname'];
			}
			
			if ($_POST['pass'] == "") {
				echo "Enter a password". "<br />" ;
				$valid_form = false;
			} else {
				$password = $_POST['pass'];
			}
			
			// if all form fields are submitted properly, begin processing
			if ($valid_form) {
			echo "The form is successfully submitted";
			}
	
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Validation</title>
<style type="text/css">
<!--
.style3 {font-size: 14px}
.style4 {font-size: 10px}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<h2 class="style5">Form Validation</h2>

<form method="post" action="form_validation.php">
  <table width="430" border="1">
    <tr>
      <th width="180" scope="row"><div align="left" class="style5"><span class="style3">Enter Name:</span></div></th>
      <td width="234">
          <input type="text" name="name" id="name" />      </td>
    </tr>
    <tr>
      <th scope="row"><div align="left" class="style5"><span class="style3">Enter user name:</span></div></th>
      <td><input type="text" name="uname" id="uname" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left" class="style5"><span class="style3">Enter Password <span class="style4">(must contain at least 6 characters)</span>:</span></div></th>
      <td><input type="password" name="pass" id="pass" /></td>
    </tr>
  </table>


  <p>
   
    <input type="submit" name="submitB" id="submitB" value="Submit" />
    
  </p>
</form>
</body>

</body>
</html>
