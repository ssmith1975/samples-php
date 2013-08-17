<?php
   // defining-classes.php
   
   // Declare 'Person' class
   class Person {
        // Code here...      
   }
   
  function display_array_list($arr) {

      echo "<ul>";
        array_walk($arr,"print_array_item");
      echo "</ul>";
      
  } 
  
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
<title>Defining Classes</title>
</head>

<body>
<h1>Defining Classes</h1>
<p>Classes are templates for creating objects.</p>
<p><strong>Check if class <code>Person</code> exists:</strong><Br />
    <?php
        $class_name = "Person";
        //Check class
        if (class_exists($class_name)){
            
            echo "The class {$class_name} exists.";
        } else {
            
            echo "The class {$class_name} does not exists.";
        }
    ?>
    
</p>

<p><strong>List of classes:</strong><br />
    <?php
        // Get classes
        $classes = get_declared_classes();
        
        // List classes
        display_array_list($classes);

    ?>
    
</p>

</body>
</html>
