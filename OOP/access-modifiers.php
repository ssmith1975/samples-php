<?php
    // access-modifiers.php
    
    class Example {
        public $public_var = "I'm a public member.";
        protected $protected_var = "I'm a protected member.";
        private $private_var ="I'm a shy private member.";
        
        // show_properties method
        public function show_properties() {
            echo $this->public_var . "<br />";
            echo $this->protected_var . "<br />";
            echo $this->private_var . "<br />";            
        }// end show_properties
    } // end Example

    class ChildExample extends Example{
        public function show_protected() {
            echo $this->protected_var;
        } // end show_protected   
    }  // end ChildExample
        
    // Create an 'Example' object
    $exampleObj = new Example();
    
    // Create a 'ChildExample' object
    $childExampleObj = new ChildExample();
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Modifiers</title>
</head>

<body>
<h1>Access Modifiers</h1>
<p>Access modifiers defines an interface by clarifying the how class members are exposed to the rest of the program. Members can be public, protected, or private.</p>
<h2>Example Class</h2>
<pre>
     class Example {
        public $public_var = "I'm a public member.";
        protected $protected_var = "I'm a shy private member.";
        private $private_var ="I'm shy.";
        
        // show_properties method
        public function show_properties() {
            echo $this->public_var;
            echo $this->protected_var;
            echo $this->private_var;            
        }// end show_properties
        
    } // end Example   
    
    // Create an 'Example' object
    $exampleObj = new Example();        
</pre>

<p><strong>Show public member - visible anywhere (default): </strong><br />
<pre>
    echo $exampleObj->public_var;   
</pre>
<strong>Result: </strong>
    <?php
        echo $exampleObj->public_var;
    ?>
</p>
<p>
<pre>
    $exampleObj->show_properties();
</pre>    
<strong>Result: </strong><br />    
    <?php
        $exampleObj->show_properties();
    ?>    
</p>
<p><strong>Show protected member - visible within parent class and its sub-classes: </strong><br />
<pre>
    echo $exampleObj->protected_var;   
</pre>
<strong>Result: </strong>
    <?php
        echo "<em>Fatal error: Cannot access protected property Example::&dollar;protected_var...</em>";
    ?>
</p>

<p><strong>Show private member  - visible only within the class: </strong><br />
<pre>
    echo $exampleObj->private_var;   
</pre>
<strong>Result: </strong>
    <?php
        echo "<em>Fatal error: Cannot access private property Example::&dollar;private_var...</em>";
    ?>
</p>
<h2>Sub-class of Example</h2>
<p>Sub-classes have access to its parent's protected members.</p>
<pre>
    
    class ChildExample extends Example{
        public function show_protected() {
            echo $this->protected_var;
        } // end show_protected   
    }  // end ChildExample  
       
    // Create a 'ChildExample' object
    $childExampleObj = new ChildExample();
    
    $childExampleObj->show_protected();
</pre>
<strong>Result: </strong>
<?php
    $childExampleObj->show_protected();
?>
</body>
</html>