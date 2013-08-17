<?php
	// Define path to database connection stuff
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);

	// Database connection
	require_once(ROOT_PATH .'/_includes/conn_db-general.php'); 

	$initusername = 'foo';
	$initpassword = 'password';

	$username = htmlspecialchars(trim($initusername));
	$password = htmlspecialchars(trim($initpassword));
	
	if (add_user($username,$password)){
		echo '<p>User added successfully!</p>';
	} else {
		echo '<p>User not added.</p>';
	}
	
	
	
	
function add_user($username, $password, $role='member') {
     global $conn;
     
     
     $hashed_password = md5($password);
     
     $query = "INSERT INTO sample_users (username, hashed_password, role) ";
     $query .= " VALUES ('{$username}', '{$hashed_password}', '{$role}' ); ";

     echo "<p>".$query."</p>";
     $results = mysql_query($conn,$query) or die("Username/password authentication failed. " . mysql_error());
     
     if(mysql_affected_rows() == 1) {
         $row = mysql_fetch_array($results);
         $id= mysql_insert_id();
         return $id;
     } else {
         
         return false;
     }
     
}
?>