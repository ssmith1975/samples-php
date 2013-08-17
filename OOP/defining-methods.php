<?php
   // defining-methods.php
   
   // Declare 'Person' class
   class Person {
        // Define 'say_hello' method
        function say_hello() {
            echo "Hello there!";           
        }  // end say_hello   
         
        // Define 'say_goodbye' method
        function say_goodbye(){
            echo "Goodbye!";
        } // end say_goodbye
        
   } // end Person

   // Build an unordered list for an array
   function display_array_list($arr) {

      echo "<ul>";
        array_walk($arr,"print_array_item");
      echo "</ul>";
      
  } 
  // Print item in array list
  function print_array_item($item) {
      if(is_array($item)) {         
          display_array_list($item);
      } else {
        echo "<li>{$item}</li>";
      } 
      
  }  
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Defining Methods</title>
</head>

<body>
<h1>Defining Methods</h1>
<p>Methods are special functions declared within classes that allows an object to perform tasks.</p>
<p><strong>Check if <code>say_hello</code> method exists:</strong><Br />
    <?php
    
        $class_name = "Person"; // Class name
        $method_name = "say_hello"; // Method name
        
        //Check 'say_hello' method
        if (method_exists($class_name, $method_name)){
            
            echo "The class {$method_name} exists.";
        } else {
            
            echo "The class {$method_name} does not exists.";
        }
        
        
    ?>
    
</p>
<p><strong>Check if <code>some_func</code> method exists:</strong><Br />
    <?php
      
        $method_name = "some_func"; // Method name
        
        //Check 'say_hello' method
        if (method_exists($class_name, $method_name)){
            
            echo "The class {$method_name} exists.";
        } else {
            
            echo "The class {$method_name} does not exists.";
        }
        
        
    ?>
    
</p>
<p><strong>List of methods for class <code>Person</code>:</strong><br />
    
    <?php
        // Get method for 'Person' class
        $methods = get_class_methods($class_name);
        
        // Display methods for 'Person' class
        display_array_list($methods);
    ?>
</p>


</body>
</html>
