<?php
   // magic-methods.php

    class TestToString {
        public $name;
    
        // Construstor method
        public function __construct($name) {
            $this->name = $name;
        }// end __construct
    
        // Override __toString method
        public function __toString() {
            return $this->name;
        } // end __toString
    
    } // end TestToString
    
    class TestInvoke {
        public $name;
    
        // Construstor method
        public function __construct($name) {
            $this->name = $name;
        } // end __construct
    
        // Override __invoke
        public function __invoke() {
            echo var_dump($this);
        } // end __invoke

    } // end TestInvoke
    
    class TestGetSet {
        private $name;
        private $age;
    
        // Constructor method
        public function __construct($name, $age) {
            $this -> name = $name;
            $this -> age = $age;
        } // end __construct
    
        // Override __set
        public function __set($name, $value) {
            $method = "set_" . strtolower($name);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        } // end __set
    
        // Override __get
        public function __get($name) {
            $method = "get_" . strtolower($name);
            if (method_exists($this, $method)) {
                return $this->$method();
            }
    
        } // __get
    
        // get_name method
        public function get_name() {
            return $this->name;
        } // end get_name

        // set_name method
            public function set_name($value) {
            $this->name = $value;
        } // end set_name

        // get_age method
        public function get_age() {
            return $this->age;
        }// end get_age
        
        // set_age method
        public function set_age($value) {
            $this->name = $value;
        } // end set_name

    } // end TestGetSet

    class TestCall {
        // Override __call
        public function __call($func_name, $arguments) {
            echo "Calling an inaccessible method named {$func_name}"  . (isset($arguments)? " with arguments " . implode(', ', $arguments): "") . ".";
        } // end __call

        //Override __callStatic
        public static  function __callStatic($func_name, $arguments) {
            echo "Calling an inaccessible static method named {$func_name}" . (!isset($arguments)? " with arguments " . implode(', ', $arguments): "") . ".";
        } // end __callStatic

        public function test_method() {
            echo "This method exists.";
        } // test_method
        
    } // end TestCall

    class TestIssetUnset{
        public $name;
        public $size; // small, medium, large
        
        public function __construct($name, $size) {
            $this->name = $name;
            $this->size = $size;
        } // end __construct        
        
        // __isset method
        public function __isset($var) {
            echo "Isset - Property {$var} is inaccessible from outside of  " . __CLASS__ . "<br />"; 
            return false;
        } // end __isset
        
        // __isset method
        public function __unset($var) {
            echo "Unset - No need to unset. Property {$var} is inaccessible from outside of  " . __CLASS__. "<br />";            
        }  // end __isset             
    } // end TestIssetUnset    
      
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magic Mehtods</title>
</head>

<body>
<h1>Magic Methods</h1>
<p>Magic methods are built-in <em>interceptor methods</em>, which can intercept messages sent to undefined methods and properties. 
    The process of implementing them into classes is called <em>overloading</em>.</p>
<pre>
       
</pre>
<h2>__toString</h2>
<p>
<pre>
    class TestToString {
        public $name;
    
        // Construstor method
        public function __construct($name) {
            $this->name = $name;
        }// end __construct
    
        // Override __toString method
        public function __toString() {
            return $this->name;
        } // end __toString
    
    } // end TestToString
   
        // Instantiate 'TestToString' objects
        $testToStringObj1 = new TestToString("Foo");   
        $testToStringObj2 = new TestToString("Baz");  
        
        // Display string  
        echo $testToStringObj1;
        echo "&lt;br /&gt;"; 
        echo $testToStringObj2;
    
   
</pre>

<strong>Results: </strong><br />
    <?php
    
        // Instantiate 'TestToString' objects
        $testToStringObj1 = new TestToString("Foo");   
        $testToStringObj2 = new TestToString("Baz");  
        
        // Display string  
        echo $testToStringObj1;
        echo "<br />";
        echo $testToStringObj2;
    ?>
</p>

<h2>__invoke</h2>
<p>
<pre>
    class TestInvoke {
        public $name;
    
        // Construstor method
        public function __construct($name) {
            $this->name = $name;
        } // end __construct
    
        // Override __invoke
        public function __invoke($obj) {
            var_export($obj);
        } // end __invoke       
    } // end TestInvoke 
       
    // Instantiate 'TestToString' objects
    $testInvoke1 = new TestInvoke("Foo");
    $testInvoke2 = new TestInvoke("Faz");
    
    // Call 'testInvoke1' object
    echo $testInvoke1();
    
    echo "&lt;br /&gt;";      
     
    // Call 'testInvoke2' object
    echo $testInvoke2();    
</pre>
<strong>Results: </strong><br />
    <?php
        // Instantiate 'TestToString' objects
        $testInvoke1 = new TestInvoke("Foo");
        $testInvoke2 = new TestInvoke("Baz");
        
        // Call 'testInvoke1' object
        echo $testInvoke1();
        
        echo "<br />";       
         
        // Call 'testInvoke2' object
        $testInvoke2();          
    ?>
</p>

<h2>__set and __get</h2>
<p>
<pre>
    class TestGetSet {
        private $name;
        private $age;
    
        // Constructor method
        public function __construct($name, $age) {
            $this -> name = $name;
            $this -> age = $age;
        } // end __construct
    
        // Override __set
        public function __set($name, $value) {
            $method = "set_" . strtolower($name);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        } // end __set
    
        // Override __get
        public function __get($name) {
            $method = "get_" . strtolower($name);
            if (method_exists($this, $method)) {
                return $this->$method();
            }
    
        } // __get
    
        // get_name method
        public function get_name() {
            return $this->name;
        } // end get_name

        // set_name method
            public function set_name($value) {
            $this->name = $value;
        } // end set_name

        // get_age method
        public function get_age() {
            return $this->age;
        }// end get_age
        
        // set_age method
        public function set_age($value) {
            $this->name = $value;
        } // end set_name
    } // end TestGetSet 
    
    // Instantiate a 'TestGetSet' object
    $testGetSetObj = new TestGetSet("Foo", 29);
    
    // Call methods
    echo "Name: " . $testGetSetObj->name;
    echo "&lt;br /&gt;"; ; 
    echo "Age: " . $testGetSetObj->age;
    
    echo "&lt;br /&gt;"; 
        
    // Set methods
    $testGetSetObj->name = "Buz";
    $testGetSetObj->age = 66;
 
    // Call methods again
    echo "New Name: " . $testGetSetObj->name;
    echo "&lt;br /&gt;";  
    echo "New Age: " . $testGetSetObj->age;        
</pre>
<strong>Results: </strong><br />
    <?php
        // Instantiate a 'TestGetSet' object
        $testGetSetObj = new TestGetSet("Foo", 29);
        
        // Call methods
        echo "Name: " . $testGetSetObj->name;
        echo "<br />"; 
        echo "Age: " . $testGetSetObj->age;
        
        echo "<br />";
        
        // Set methods
        $testGetSetObj->name = "Buz";
        $testGetSetObj->age = 66;
 
        // Call methods again
        echo "New Name: " . $testGetSetObj->name;
        echo "<br />"; 
        echo "New Age: " . $testGetSetObj->age; 
        
        
    ?>
</p>


<h2>__call and __callStatic</h2>
<p>
<pre>
    class TestCall {
        // Override __call
        public function __call($func_name, $arguments) {
            echo "Calling an inaccessible method named {$func_name}"  . (isset($arguments)? " with arguments " . implode(', ', $arguments): "") . ".";
        } // end __call

        //Override __callStatic
        public static  function __callStatic($func_name, $arguments) {
            echo "Calling an inaccessible static method named {$func_name}" . (!isset($arguments)? " with arguments " . implode(', ', $arguments): "") . ".";
        } // end __callStatic

        public function test_method() {
            echo "This method exists.";
        } // test_method        
    } // end TestCall 
    
        // Instantiate 'TestCall' object
        $testCallObj = new TestCall();
        
        // Call existing method
        $testCallObj->test_method();
        
        echo "&lt;br /&gt;";
        
        // Call non-existing method
        $testCallObj->fake_method('fake', 'parameters');
        
        "&lt;br /&gt;";
        
        // Call non-existing static method
        TestCall::fake_static_method();    
       
</pre>
<strong>Results: </strong><br />
    <?php
        // Instantiate 'TestCall' object
        $testCallObj = new TestCall();
        
        // Call existing method
        $testCallObj->test_method();
        
        echo "<br />"; 
        
        // Call non-existing method
        $testCallObj->fake_method('fake', 'parameters');
        
        echo "<br />";
        
        // Call non-existing static method
        TestCall::fake_static_method();
        
        
    ?>
</p>


<h2>__isset and __unset</h2>
<p>
<pre>
    class TestIssetUnset{
        public $name;
        public $size; // small, medium, large
        
        public function __construct($name, $size) {
            $this->name = $name;
            $this->size = $size;
        } // end __construct        
        
        // __isset method
        public function __isset($var) {
            echo "Isset - Property {$var} is inaccessible from outside of  " . __CLASS__ . "&lt;br /&gt;"; 
            return false;
        } // end __isset
        
        // __isset method
        public function __unset($var) {
            echo "Unset - No need to unset. Property {$var} is inaccessible from outside of  " . __CLASS__. "&lt;br /&gt;";            
        }  // end __isset   
        
        
        // Instantiate 'TestIssetUnset' object
        $testIssetUnset = new TestIssetUnset("Foo Bear", "large"); 
        
        // Test for non-existing property is set
        echo "Test for 'fake_prop' isset:&lt;br /&gt;";
        echo var_dump(isset($testIssetUnset->fake_prop));
        
        echo "&lt;br /&gt;";
        
        // Unset non-existing property
        echo "Unsetting 'another_fake_prop':&lt;br /&gt;";
        unset($testIssetUnset->another_fake_prop);
        
        echo "&lt;br /&gt;";

        
        // Test for existing property is set
        echo "Test for 'size' isset:&lt;br /&gt;";
        echo var_dump(isset($testIssetUnset->size));
        
        echo "&lt;br /&gt;";
        // Unset non-existing property
        echo "Unsetting 'size':&lt;br /&gt;";
        unset($testIssetUnset->size);    

        echo "&lt;br /&gt;";
        
        // Test for existing property is set
        echo "Test for 'size' isset:&lt;br /&gt;";
        echo  var_dump(isset($testIssetUnset->size));        
                  
    } // end TestIssetUnset        
</pre>
<strong>Results: </strong><br />
    <?php
        // Instantiate 'TestIssetUnset' object
        $testIssetUnset = new TestIssetUnset("Foo Bear", "large"); 
        
        // Test for non-existing property is set
        echo "Test for 'fake_prop' isset:<br />";
        echo var_dump(isset($testIssetUnset->fake_prop));
        
        echo "<br />";
        
        // Unset non-existing property
        echo "Unsetting 'another_fake_prop':<br />";
        unset($testIssetUnset->another_fake_prop);
        
        echo "<br />";

        
        // Test for existing property is set
        echo "Test for 'size' isset:<br />";
        echo var_dump(isset($testIssetUnset->size));
        
        echo "<br />";
        // Unset non-existing property
        echo "Unsetting 'size':<br />";
        unset($testIssetUnset->size);    

        echo "<br />";
        
        // Test for existing property is set
        echo "Test for 'size' isset:<br />";
        echo  var_dump(isset($testIssetUnset->size));                
            
    ?>
</p>


</body>
</html>