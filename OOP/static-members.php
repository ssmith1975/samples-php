<?php
    // static-members.php
    
    class Students {
        // Declare static property    
        static $total_students = 0;
        
        // Declare static method
        static function welcome_students($text = "Hello") {
            echo "{$text} students!";
        }
        
    } // end Student
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Static Members</title>
</head>

<body>
<h1>Static Members</h1>
<p>Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. 
    A property declared as static can not be accessed with an instantiated class object (though a static method can).</p>
<pre>
    class Students {
        // Declare static property    
        static $total_students = 0;
        
        // Declare static method
        static function welcome_students($text = "Hello") {
            echo "{$text} students!";
        }
        
    } // end Students    
</pre>
<p><strong>Access <code>total_students</code> property:</strong><br />
<pre>
     // Display total_students
     echo Students::$total_students;       
</pre>
  
    <strong>Result: </strong>
    <?php
        // Display total_students
        echo Students::$total_students;
    ?>
</p>
<p><strong>Update <code>total_students</code> property:</strong><br />
<pre>
     // Update total_students
     Students::$total_students = 100;
            
     // Display total_students
     echo Students::$total_students;       
</pre>
  
    <strong>Result: </strong>
    <?php
        // Update total_students
        Students::$total_students = 100;
        
        // Display total_students
        echo Students::$total_students;
    ?>
</p>

<p><strong>Access <code>welcome_students</code> method:</strong><br />
<pre>
    // Execute 'welcome_students' static method
    Students::welcome_students("Howdy");
</pre>
    <strong>Result: </strong>
    <?php
        // Execute 'welcome_students' static method
        Students::welcome_students("Howdy");
    ?>   
</p>
</body>
</html>