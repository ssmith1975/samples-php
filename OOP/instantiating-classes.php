<?php
   // instantiating-classes.php
   
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

    class Animal {
        // Some code here...
    }
    // Create 'Person' objects
    $person = new Person();
    $person2 = new Person(); 
    $animal = new Animal();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instantiating Classes</title>
</head>

<body>
<h1>Instantiating Classes</h1>

<p><strong>Get class name for <code>person</code> object:</strong><br />
    <?php
        // Display class name of instance
        echo get_class($person);
    ?>
</p>
<p><strong>Get class name for <code>person2</code> object:</strong><br />
    <?php
        // Display class name of instance
        echo get_class($person2);
    ?>
</p>
<p><strong>Get class name for <code>animal</code> object:</strong><br />
    <?php
        // Display class name of instance
        echo get_class($animal);
    ?>
</p>
<p><strong>Check if <code>person</code> is an instance of class <code>Person</code>:</strong><br />
    <?php     
        $class_name = "Person"; // Class name
        $obj_name = "person";
        
        //Check 'person' object
        if (is_a($person, $class_name)){            
            echo "{$obj_name} is an instance of {$class_name}.";
            $person->say_hello();
        } else {           
            echo "{$obj_name} is an <em>not</em> instance of {$class_name}.";
        } 
    ?>
    
</p>
<p><strong>Check if <code>animal</code> is an instance of class <code>Person</code>:</strong><br />
    <?php    
        $obj_name = "animal";  
        if (is_a($animal, $class_name)){          
            echo "{$obj_name} is an instance of {$class_name}.<br />";
            $animal->say_hello();
            
        } else {            
            echo "{$obj_name} is an <em>not</em> an instance of {$class_name}.";
        }    
    ?>
    
</p>



</body>
</html>
