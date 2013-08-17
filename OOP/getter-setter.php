<?php
    // getter-setter.php
    
    class SetterGetter {
        // Declare properties
        private $title;
        private $type = "widget";        
        private $year;

        // Declare getter/setter methods
        public function get_title() {
            return $this->title;
        } // end get_title
        
        public function set_title($value) {
            $this->title = $value;
        } // end set_title
        
        public function get_type(){
            return $this->type;
        } // end get_type
               
        public function set_year($value) {
            $this->year = $value;
        } // end set_year
       
    } // end SetterGetter
    
    // Create a 'SetterGetter' object
    $obj = new SetterGetter();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Getter and Setter Accessors</title>
</head>

<body>
<h1>Getter and Setter Accessor</h1>
<p>Getter and Setter methods control access to class properties as well as provide filters and constraints.</p>
<pre>
     class SetterGetter {
        // Declare properties
        private $title;
        private $type = "widget";        
        private $year;

        // Declare getter/setter methods
        public function get_title() {
            return $this->title;
        } // end get_title
        
        public function set_title($value) {
            $this->title = $value;
        } // end set_title
        
        public function get_type(){
            return $type;
        } // end get_type
               
        public function set_year($value) {
            $this->year = $value;
        } // end set_year
       
    } // end SetterGetter
    
    // Create a 'SetterGetter' object
    $obj = new SetterGetter();      
</pre>
<h2>Read/Write Demo</h2>
<p>The property <code>title</code> has both read and write access.<br />
<pre>
    $obj->set_title("My Widget Title");
    echo $obj->get_title();  
</pre>
 <?php
    // Set title
    $obj->set_title("My Widget Title");
    
    // Get title
    echo "<strong>Result: </strong>". $obj->get_title();
 ?>   
</p>

<h2>Read Demo</h2>
<p>The property <code>type</code> has only read access.it's value can only be set from within the class .<br />
<pre>
    // Set type
    // $obj->set_type('New Widget')' // error
    
    // Get type
    echo $obj->get_type(); 
</pre>
 <?php
    // Set type
    // $obj->set_type('New Widget')' // error
    
    // Get type
    echo "<strong>Result: </strong>" . $obj->get_type(); 
 ?>   
</p>

<h2>Write Demo</h2>
<p>The property <code>year</code> has only write access.it's value can only be retrieved from within the class .<br />
<pre>
    // Set year
    $obj->set_year('2014'); 
    
    // Get year
    //echo $obj->get_year(); // error
</pre>
 <?php
    // Set year
    $obj->set_year('2014'); 
    
    // Get year
    //echo $obj->get_year(); // error
    echo "<strong>Result: </strong> <em>No output.</em>";
 ?>   
</p>
</body>
</html>