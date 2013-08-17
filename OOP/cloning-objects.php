<?php
    // cloning-objects.php
    
class Person {
    public $name;
    public $age;
    public $id;

    function __construct( $name, $age ) {
        $this->name = $name;
        $this->age = $age;
    } // end __construct

    function setId( $id ) {
        $this->id = $id;
    } // end setId

    function showData() {
        echo "<p>";
        echo "Id: {$this->id}<br />";
        echo "Name: {$this->name}<br />";        
        echo "Age: {$this->age}";
        echo "</p>";
        echo var_dump(defined("PHP_EOL"));
    }
    
    function __clone() {

        $this->id = 0;
    } // end __clone
} // end Person    

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cloning Objects</title>
</head>

<body>
<h1>Cloning Objects</h1>
<p>Replicating properties and methods of an existing object.</p>
<pre>
    class Person {
        public $name;
        public $age;
        public $id;
    
        function __construct( $name, $age ) {
            $this->name = $name;
            $this->age = $age;
        } // end __construct
    
        function setId( $id ) {
            $this->id = $id;
        } // end setId
    
        function showData() {
            echo "&lt;p&gt;";
            echo "Id: {$this->id}"&lt;br /&gt;";
            echo "Name: {$this->name}"&lt;br /&gt;";        
            echo "Age: {$this->age}";
            echo "&lt;/p&gt;";
        }
        
        function __clone() {
    
            $this->id = 0;
        } // end __clone
    } // end Person      
</pre>
<h2>Original Object</h2>
<pre>
    // Instantiate a 'Person' object  
    $person = new Person("Abraham Wilmore", 60);
    
    // Set 'id' for person
    $person->setId(10);
    
    // Show data for 'person'
    $person->showData();    
</pre>    
<p><strong>Result: </strong></p> 
<?php
    // Instantiate a 'Person' object  
    $person = new Person("Abraham Wilmore", 60);
    
    // Set 'id' for person
    $person->setId(10);
    
    // Show data for 'person'
    $person->showData();
?>    
<h2>Copying Objects</h2>
<pre>
    // Copy 'person' object
    $copyPerson = $person;
    
    // Show data for 'copyPerson'
    $copyPerson->showData();       
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Copy 'person' object
    $copyPerson = $person;
    
    // Show data for 'copyPerson'
    $copyPerson->showData();
?>
<p>Update <code>copyPerson</code> object: </p>
<pre>
    // Update 'copyPerson'
    $copyPerson->id = 20;    
    $copyPerson->name ="Huey Guey";
    $copyPerson->age = 38;
    
    // Display 'copyPerson'
    $copyPerson->showData();    
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Update 'copyPerson'
    $copyPerson->id = 20;    
    $copyPerson->name ="Huey Guey";
    $copyPerson->age = 38;
    
    // Display 'copyPerson'
    $copyPerson->showData();
?>
<p>Check values for original object, <code>person</code>: </p>
<pre>
    // Display 'copyPerson'
    $person->showData();   
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Display 'copyPerson'
    $person->showData();
?>
<h2>Cloning Objects</h2>
<p>Show original object <code>person</code>: </p>
<pre>
    // Clone 'person' object
    $clonePerson  = clone $person;
    
    // Show data for 'clonePerson'
    $clonePerson->showData();    
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Clone 'person' object
    $clonePerson  = clone $person;
    
    // Show data for 'clonePerson'
    $clonePerson->showData();
?>
<p>Update <code>clonePerson</code> object: </p>
<pre>
    // Update 'clonePerson'
    $clonePerson->id = 50;    
    $clonePerson->name ="Gabby Shabby";
    $clonePerson->age = 48;
    
    // Display 'clonePerson'
    $clonePerson->showDate();    
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Update 'clonePerson'
    $clonePerson->id = 50;    
    $clonePerson->name ="Gabby Shabby";
    $clonePerson->age = 48;
    
    // Display 'clonePerson'
    $clonePerson->showData();
?>
<p>Check values for original object, <code>person</code>: </p>
<pre>
    // Display 'copyPerson'
    $person->showData();   
</pre>
<p><strong>Result: </strong></p> 
<?php
    // Display 'copyPerson'
    $person->showData();
?>

<h2>Conclusion</h2>
<p>Assigning one object to another (without the <code>clone</code> keyword) means the objects are linked together by reference. 
    Therefore, changing the values in one will also change the values in the other object.</p>
<p>Cloning creates a duplicate copy of an object without references being involved. the <code>__clone</code>
     mehtod allows for alterations in particular properties.</p>    
</body>
</html>