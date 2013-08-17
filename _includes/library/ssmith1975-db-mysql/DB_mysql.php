<?php
/* 
	Class: DB_mysql -- Handle database activities
	Author: Samantha Smith 
	Created: 10/10/2012
*/
class DB_mysql {

	private $m_mysql; // Database connection link
	private $m_hostname; // Database Host Server
	private $m_username; // Username
	private $m_password; // Password
	private $m_dbname; // Database Name
	private $m_query; // Query String
	
	// Constructor -  create a mysql connection 
	function __construct($hostname, $username, $password) {
		// Initialize connection properties
		$this->m_hostname = $hostname;
		$this->m_username = $username;
		$this->m_password = $password;    
	}
	   
	// Connect to a database
	function select_db($dbname) { 
	   $this->dbname = $dbname;
	}
	
	// Create a query string
	function set_query($query) {
		$this->m_query = $query;
	}
	
	// Get scalar result
	function get_scalar_result() {
		$scalar ="";
		
		// Create a connection
		$this->m_mysql = mysql_connect($this->m_hostname,$this->m_username, $this->m_password, false,65536) 
			or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
		
		// Select a database
		mysql_select_db($this->dbname);
	
		// Query database for result
		$result = mysql_query($this->m_query) 
			or die("ERROR: Database unable to return a result.");  
		
		// Check number of rows returned
		if(mysql_num_rows($result) > 0) {
			// Get result
			$row = mysql_fetch_row($result);
			$scalar = $row[0];
			
			
		} else {
			// If no rows retunrned...
			$scalar = NULL;
		}
		// Free query results
		mysql_free_result($result);
		
		// Close database connection
		mysql_close($this->m_mysql);
		
		// Return scalar value
		return $scalar;
	
	}
	
	// Get single row result
	function get_row_result() {
		$row = array();
		
		// Create a connection
		$this->m_mysql = mysql_connect($this->m_hostname,$this->m_username, $this->m_password, false, 65536) 
			or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
		
		// Select a database
		mysql_select_db($this->dbname);
	
		
		$result = mysql_query($this->m_query) 
			or die("ERROR: Database unable to return a result. " . mysql_error() ); 
		
		// Check number of rows returned
		if(mysql_num_rows($result) > 0) {
			// Get result
			$row = mysql_fetch_assoc($result);
		} else {
			$row = NULL; // no results
		}
		
		// Free query results
		mysql_free_result($result);
		
		// Close database connection
		mysql_close($this->m_mysql);	
		
		// Return single row as an array
		return $row;
		
	}
	
	// Get multiple rows result
	function get_array_result() {
		$array_result = array();
		
		// Create a connection
		$this->m_mysql = mysql_connect($this->m_hostname,$this->m_username, $this->m_password, false,65536) 
			or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
		
		// Select a database
		mysql_select_db($this->dbname);
		
		$result = mysql_query($this->m_query);
		
		// Check number of rows returned
		if(mysql_num_rows($result) > 0) {
			// Get result	
			while ($row = mysql_fetch_assoc($result)) {
				$array_result[] = $row;
			}
			
		} else {
			// no results
			$array_result = NULL;
			
		}	
		
		// Free query results
		mysql_free_result($result);
		
		// Close database connection
		mysql_close($this->m_mysql);
		
		// Return multiple records as an multidimensional associative array	
		return $array_result ;
	} 

} // end class
?>
