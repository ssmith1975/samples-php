<?php
    // abstract-classes.php
    
    abstract class Car {
        protected $wheels = 4;
        protected $doors = 4;
        protected $type = "car";
        
        // abstract method
        abstract function showInfo(); // end showInfo
        
        // non-abstract method
        public function getType() {
            return $this->type;
        } // end getType
        
    } // end Car
    
    
    class CompactCar extends Car{
        
        protected $doors = 2;
        protected $type = "compact car"; 
         
         
         function showInfo() {
            echo "This <em>little</em> {$this->type} has {$this->wheels} wheels and {$this->doors} doors.";
        } // end showInfo         
    } // end CompactCar

     class FamilyCar extends Car{
        
        protected $doors = 5;
        protected $type = "family car"; 
         
         
         function showInfo() {
            echo "This <em>large-sized</em> {$this->type} has {$this->wheels} wheels and {$this->doors} doors.";
        } // end showInfo         
    } // end CompactCar   
        
    // Instantiate Car class
    // $car = new Car(); (Cannot instantiate an abstract class.)
    
    // Instantiate Compact class
    $compactCar = new CompactCar();
    $familyCar = new FamilyCar();
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Abstract Classes</title>
</head>

<body>
<h1>Abstract Classes</h1>
<p>An abstract class defines (and, optionally, partially implements) the interface for any class that might extend it.
    It cannot be instantiated.</p>
<pre>
    abstract class Car {
        protected $wheels = 4;
        protected $doors = 4;
        protected $type = "car";
        
        // abstract method
        abstract function showInfo(); // end showInfo
        
        // non-abstract method
        public function getType() {
            return $this->type;
        } // end getType
        
    } // end Car
    
    
    class CompactCar extends Car{
        
        protected $doors = 2;
        protected $type = "compact car"; 
         
         
         function showInfo() {
            echo "This &lt;em>little&lt;/em&gt; {$this->type} has {$this->wheels} wheels and {$this->doors} doors.";
        } // end showInfo         
    } // end CompactCar

     class FamilyCar extends Car{
        
        protected $doors = 5;
        protected $type = "family car"; 
         
         
         function showInfo() {
            echo "This &lt;em&gt;large-sized&lt;/em&gt; {$this->type} has {$this->wheels} wheels and {$this->doors} doors.";
        } // end showInfo         
    } // end CompactCar   
        
    // Instantiate Car class
    // $car = new Car(); (Cannot instantiate an abstract class.)
    
    // Instantiate Compact class
    $compactCar = new CompactCar();
    $familyCar = new FamilyCar();     
     
</pre>   
    
<p><strong>From the sub-class <code>CompactCar</code>:</strong><br/>
    <pre>
        $compactCar->showInfo();  
    </pre>
    <strong>Result: </strong>
    <?php
        $compactCar->showInfo();     
    ?>     
</p>
<p><strong>From the sub-class <code>FamilyCar</code>:</strong><br/>
    <pre>
        $familyCar->showInfo();  
    </pre> 
    <strong>Result: </strong>   
    <?php
        $familyCar->showInfo();
    ?>   
</p>

</body>
</html>
