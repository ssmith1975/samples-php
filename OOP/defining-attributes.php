<?php
   // defining-attributes.php
   
   // Declare 'Person' class
   class Person {
        // Declare class attributes
        var $first_name;
        var $last_name;
        var $arm_count = 2;
        var $leg_count = 2;
        
        function full_name() {
            return $this->first_name . " " . $this->last_name;
            
        }
        
        function say_hello() {
            echo "Hello, {$this->first_name}!";
        }
             
   }
   
  
         // Create an instance of 'Person'
        $person = new Person();
         
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Defining Attributes</title>
</head>

<body>
<h1>Defining Attributes</h1>
<p>Attriutes describes the values an object may hold.</p>
<pre>
   // Declare 'Person' class
   class Person {
        // Declare class attributes
        var $first_name;
        var $last_name;
        var $arm_count = 2;
        var $leg_count = 2;
        
        function full_name() {
            return $this->first_name . " " . $this->last_name;
            
        }
        
        function say_hello() {
            echo "Hello, {$this->first_name}!";
        }
             
   } 
     
    // Create an instance of 'Person'
    $person = new Person();   
</pre>
<p><strong>Access <code>arm_count</code> property:</strong><br />
<pre>
    echo $person->arm_count;   
</pre>
<strong> Result: </strong>
    <?php
        echo $person->arm_count;
    ?>
    
</p>
<p><strong>Update <code>arm_count</code> property:</strong><br />
<pre>
        $person->arm_count = 4;    
</pre>
<strong> Result: </strong>    
    <?php
        $person->arm_count = 4;
        echo $person->arm_count;
    ?>
    
</p>
<p><strong>Update <code>first_name</code> and <code>last_name</code> properties, and print full name:</strong><br />
 <pre>
        $person->first_name = "Alpha";
        $person->last_name = "Beta";
 
 </pre>
<strong> Result: </strong> 
    <?php
        $person->first_name = "Alpha";
        $person->last_name = "Beta";
        echo $person->full_name();
    ?>
    
</p>

<p><strong>List of attributes for class <code>Person</code>:</strong><br />
    <?php
        // Get attributes
        $attributes = get_class_vars('Person');
        
        // List attributes
        //display_array_list($attributes);
        foreach ($attributes as $key=>$value) {
            echo "$key: $value<br />";
        }

    ?>
    
</p>

</body>
</html>
