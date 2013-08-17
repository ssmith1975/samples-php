<?php
    // defining-inheritance.php
    
    class Car {
        var $wheels = 4;
        var $doors = 4;
        
        function showInfo() {
            echo "This car has {$this->wheels} wheels and {$this->doors}";
        } // end showInfo
        
    } // end Car
    
    
    class CompactCar extends Car{
        
        var $doors = 2;
         function showInfo() {
            echo "This <em>little</em> car has {$this->wheels} wheels and {$this->doors}.";
        } // end showInfo       
        
    } // end CompactCar
    
    // Instantiate Car class
    $car = new Car();
    
    // Instantiate Compact class
    $compactCar = new CompactCar();
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Defining Inheritance</title>
</head>

<body>
<h1>Defining Inheritance</h1>
<p>Class inheritance is the relationship of one class inheriting all of the characteristics of another class along with a additional characteristics of its own.</p>
<p><strong>From the base class <code>Car</code>:</strong><br/>
    <?php
        echo "This car has {$car->wheels} wheels.<br />";
        echo "This car has {$car->doors} doors.<br />";
        $car->showInfo();
        
            
    ?>   
</p>
<p><strong>From the sub-class <code>CarCompact</code>:</strong><br/>
    <?php
        echo "This compact car has {$compactCar->wheels} wheels.<br />";
        echo "This compact car has {$compactCar->doors} doors.<br />";
        $compactCar->showInfo();
    ?>   
</p>
<p><strong>Class info:</strong>
    <?php
        // Test for parent class
        echo "<strong>Parent class of 'Car': </strong> " . get_parent_class('Car') . "<br />";   
        echo "<strong>Parent class of 'Car': </strong> " . get_parent_class('CompactCar') . "<br />";  
        echo "<br />";
        // Test for subclass
        echo "<strong>'Car' a sub-class of 'Car'?: </strong> " . (is_subclass_of('Car', 'Car')?"yes":"no") . "<br />"; 
        echo "<strong>'Car' a sub-class of 'CompactCar'?: </strong> " . (is_subclass_of('Car', 'CompactCar')?"yes":"no")  . "<br />"; 
        echo "<strong>'CompactCar' a sub-class of 'Car'?: </strong> "  . (is_subclass_of('CompactCar', 'Car')?"yes":"no") ;      
    ?>
</p>

</body>
</html>
