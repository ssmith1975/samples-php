<?php
    // object-interfaces.php
    
    // Interface declarations
    interface A {
        const some_constant = "Some randome constant.";
        
        public function say_hello($name);
        public function say_goodbye();
    } // end A
    
    interface B extends A {
        public function say_my_name($myName);
    } // end B
    
    
    interface C {
        public function say_your_age($age);
    } // end C
    
    // Class declarations
    class MyClassA implements A {
        
        public function say_hello($name) {
            echo "Hello, {$name}!";
        } // end say_hello
        
        public function say_goodbye() {
            echo "Bye Bye!";
        } // end say_goodbye
    } // end MyClassA
    
    class MyClassB implements B {
        public function say_hello($name){
            echo "Howdy, {$name}!";
        } // end say_hello
        
        public function say_goodbye() {
            echo "See ya later, alligator!";
        } // end say_good_bye
        
        public function say_my_name($myName) {
            echo "My name is {$myName}.";
        }// end say_my_name
        
    } // end MyClassB
    
    
    class MyClassC implements A,C {
        public function say_hello($name) {
            echo "Greetings, {$name}";
        } // end say_hello
        
        public function say_goodbye() {
            echo "Until we meet again.";
        } // end say_goodbye
        
        public function say_your_age($age) {
            echo "I am {$age} years old";
        } // end say_your_age
        
    } // end MyClassC
    
    // Instantiate objects
    $myClassAObj = new MyClassA();
    $myClassBObj = new MyClassB();
    $myClassCObj = new MyClassC();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Object Interfaces</title>
</head>

<body>
<h1>Object Interfaces</h1>
<p>While abstract classes let you provide some measure of implementation, interfaces are pure templates. An interface can only define functionality; it can never implement it. An interface 
    is declared with the interface keyword. It can contain properties and method declarations, but not method bodies.</p>
<pre>
    // Interface declarations
    interface A {
        const some_constant = "Some randome constant.";
        
        public function say_hello($name);
        public function say_goodbye();
    } // end A
    
    interface B extends A {
        public function say_my_name($myName);
    } // end B
    
    
    interface C {
        public function say_your_age($age);
    } // end C    
</pre>
<h2>Simple Interface</h2>
<pre>
     class MyClassA implements A {
        
        public function say_hello($name) {
            echo "Hello, {$name}!";
        } // end say_hello
        
        public function say_goodbye() {
            echo "Bye Bye!";
        } // end say_goodbye
    } // end MyClassA   
    
    // Instantiate a 'MyClassA' object
    
    // Call methods
    $myClassAObj = new MyClassA();      
    echo "&lt;br /&gt;";  
    $myClassAObj->say_good_bye(); 
</pre>
<p><strong>Results: </strong><br />
    
<?php
    $myClassAObj->say_hello("Mr. Brown");
    echo "<br />";
    $myClassAObj->say_goodbye();
?>       
</p>

<h2>Interface Inheritance</h2>
<pre>
    class MyClassB implements B {
        public function say_hello($name){
            echo "Howdy, {$name}!";
        } // end say_hello
        
        public function say_goodbye() {
            echo "See ya later, alligator!";
        } // end say_good_bye
        
        public function say_my_name($myName) {
            echo "My name is {$myName}.";
        }// end say_my_name   
         
    } // end MyClassB
    
    // Instantiate a 'MyClassB' object
    $myClassBObj = new MyClassB();
    
    // Call methods
    $myClassBObj->say_hello("Mr. Green");
    echo "&lt;br /&gt;";
    $myClassBObj->say_my_name("Foo");
    echo "&lt;br /&gt;";
    $myClassBObj->say_goodbye();    
</pre>
 <p><strong>Results: </strong><br />
    
<?php
    $myClassBObj->say_hello("Mr. Green");
    echo "<br />";
    $myClassBObj->say_my_name("Foo");
    echo "<br />";
    $myClassBObj->say_goodbye();
?>       
</p>   


<h2>Using Multiple Interfaces</h2>
<pre>
    class MyClassC implements A,C {
        public function say_hello($name) {
            echo "Greetings, {$name}";
        } // end say_hello
        
        public function say_goodbye() {
            echo "Until we meet again.";
        } // end say_goodbye
        
        public function say_your_age($age) {
            echo "I am {$age} years old";
        } // end say_your_age
        
    } // end MyClassC
    
    // Instantiate a 'MyClassC' object
    $myClassCObj = new MyClassC(); 
    
    // Call methods
    $myClassCObj->say_hello("Mr. White");
    echo "&lt;br /&gt;";
    $myClassBObj->say_your_age(25);
    echo "&lt;br /&gt;";
    $myClassCObj->say_goodbye();       
</pre>
 <p><strong>Results: </strong><br />
    
<?php
    $myClassCObj->say_hello("Mr. White");
    echo "<br />";
    $myClassCObj->say_your_age(25);
    echo "<br />";
    $myClassCObj->say_goodbye();
?>       
</p>
<h2>Interface Constants</h2>
<pre>
    echo A::some_constant;    
</pre>
<p><strong>Constant from interface 'A': </strong><br />
<?php 
    echo A::some_constant;
?>
</body>
</html>