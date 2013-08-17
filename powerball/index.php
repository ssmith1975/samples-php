<?php
 include "lib/FeedParser.php";


 $maxTickets = 10;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">

<title>Powerball Number Picker</title>
	
	
	<script type="text/javascript" language="javascript" src="js/ajaxlib.js"></script>
	<script type="text/javascript" language="javascript">
	
		function pbcallback(content) {
			document.getElementById('pb-results').innerHTML = content;
		}
		
		function getNumbers() {
			var tickets = document.getElementById('pb-input').value;
			
			document.getElementById('pb-results').innerHTML = '<div class="preloader"><img src="images/preloader-spinner-red.gif" width="128" width="128" /></div>';
			doAjax('ajax/pb-results.php', 'tickets='+tickets, 'pbcallback', 'get', '0' );
		}			
	</script>
	
	<link rel="stylesheet" media="screen" type="text/css" href="css/pb-styles.css" lang="en-US" hreflang="en-US" />

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>

<body lang="en" dir="ltr">

	<div id="wrapper">
		<div id="container">
			<h1 id="pb-title">Powerball Number Picker<a name="top"></a></h1>
			<form id="frmNumberGenerator" name="frmNumberGenerator" >
			
			
				<table id="pb-input-box">
					<tr>
						<td class="label">How many tickets do you want to generate? </td>
					
						<td class="form-input">
						
						<select id="pb-input">
							<?php for ($i=1; $i<= $maxTickets; $i++) { ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php }?>
						</select>
						<!--<input id="pb-input" name="pb-input" type="text" value="1" size="3" maxlength="3" />-->
						<input type="button" value="Generate" onClick="getNumbers()" /></td>
					</tr>
				</table>
				
			
			</form> 
			
			<div id="pb-results" class=""></div>
					
			<?php require "powerballFeed.php"; ?>
			<p class="return-top"><a href="#top">Return to top</a></p>
			
		</div>
		<div id="footer"><p>&copy; <?php  echo date("Y"); ?> <a href="www.brainflames.com">Brain Flames</a>, All rights reserved.</p></div>
	</div>
</body>
</html>
