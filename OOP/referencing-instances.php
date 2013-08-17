<?php
   // referencing-instances.php
   
   // Declare 'Person' class
   class Person {
        // Define 'say_hello' method
        function say_hello() {
            // Using 'this' keyork
            echo get_class($this);           
        }  // end say_hello   
         

        // Define 'say_goodbye' method
        function say_goodbye(){
            echo "Goodbye!";
        } // end say_goodbye
        
        // Calling a method within another method inside of a class
         function another_func() {
             $this->say_hello();
             
         }  // end another_func      
        
   } // end Person


    // Create 'Person' objects
    $person = new Person();

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Referencing Instances</title>
</head>

<body>
<h1>Referencing Instances</h1>
<p>An object is an instance of a class with a data structured defined by that class.</p>
<p><strong>Call <code>say_hello</code> method:</strong><br />
    <?php
        // Display class name of instance
       $person->say_hello();
    ?>
</p>
<p><strong>Call <code>another_func</code> method:</strong><br />
    <?php
        // Display class name of instance
        $person->another_func();
    ?>
</p>

</body>
</html>
