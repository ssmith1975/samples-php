<?php
    // constructor-destructor.php
    
    class Car{
        public $wheels;
        static $total = 0; 
        
        function __construct($wheel_num) {
            $this->wheels = $wheel_num;
            
            // Increment total
            self::$total++;
            
        } // end __constructor
        
        function __destruct() {
            // Decrement total
            self::$total--;
        }// end destructor
    } // end Car
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Constructor and Destructors</title>
</head>

<body>
<h1>Constructors and Destructors</h1>
<p>Create a <code>Car</code> class:</p>
<pre>
    class Car{
        public $wheels;
        static $total = 0; 
        
        function __constructor($wheel_num) {
            $this->wheels = $wheel_num;
            
            // Increment total
            self::$total++;
            
        } // end __constructor
        
        function __destructor() {
            // Decrement total
            self::$total--;
        }// end destructor
    } // end Car   
</pre>
<h2>Constructor Methods</h2>

<p>A Constructor method gets invoked when an object is created and aids in the initiation process.</p>
<pre>
    // Create a car object with 3 wheels
    $car1 = new Car(3);
    
    // Display 'car1' wheels
    echo "Number of wheels for <code>car1</code>: ". $car1->wheels;
    
    echo "&lt;br /&gt;";
          
    // Display car count
    echo "Car count: "   . Car::$total;
    
    echo "&lt;br /&gt;";
    
    // Create another 'car' object with 6 wheels
    $car2 = new Car(6);
    
    // Display 'car2' wheels
    echo "Number of wheels for <code>car2</code> : ". $car2->wheels;
    
    echo "&lt;br /&gt;";
    
    // Display car count
    echo "Car count: "   . Car::$total;     
</pre>
<p><strong>Result: </strong><br />
<?php 
    // Create a car object with 3 wheels
    $car1 = new Car(3);
    
    // Display 'car1' wheels
    echo "Number of wheels for <code>car1</code>: ". $car1->wheels;
    
    echo "<br />";
    
    // Display car count
    echo "Car count: "   . Car::$total;
    
    echo "<br />";
    
    // Create another 'car' object with 6 wheels
    $car2 = new Car(6);
    
    // Display 'car2' wheels
    echo "Number of wheels for <code>car2</code> : ". $car2->wheels;
    
    echo "<br />";
    
    // Display car count
    echo "Car count: "   . Car::$total;    
    
?>    
</p>
<h2>Destructor Methods</h2>
<p>A destructor method gets invoked the moment before an object is destroyed, and  </p>
<pre>
    // Destroy 'car2' object
    unset($car2);
    
     // Display car count
    echo "Car count after <code>car2</code>  destruction: "   . Car::$total;  
    
    echo "&lt;br /&gt;";   
    
     // Destroy 'car1' object
    unset($car1);
    
     // Display car count
    echo "Car count after <code>car1</code> destruction: "   . Car::$total;   
</pre>
<p><strong>Result: </strong><br />
<?php 
    // Destroy 'car2' object
    unset($car2);
    
     // Display car count
    echo "Car count after <code>car2</code> destruction: "   . Car::$total;  
    
    echo "<br />";   
    
     // Destroy 'car1' object
    unset($car1);
    
     // Display car count
    echo "Car count after <code>car1</code> destruction: "   . Car::$total;          
    
?>    
</p>
</body>
</html>