<?php
    // comparing-objects.php
    
    class Box {
        public $name = "box";
        
        
        // Display comparison result
        static function bool2str($bool) {       
            if ($bool === false) {
                return 'FALSE';
            } else {
                return 'TRUE';
            }
        } // end bool2str
        
    } // end Box

    class Circle {
        public $name = "box";
    } // end circle
        
    // Create original 'Box' object
    $box = new Box();
    
    // Reference 'box'
    $boxRef = $box;
    
    // Clone 'box'
    $boxClone = clone $box;
    
    // Clone 'box' for change
    $boxChange = clone $box;
    $boxChange->name = "little box";
    
    // Create another 'Box' object
    $anotherBox = new Box();   
    
    // Create a 'Circle' object
    $circle = new Circle();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comparing Objects</title>
</head>

<body>
<h1>Comparing Objects</h1>
<p>The difference between <code>==</code> and <code>===</code>. <code>==</code> checks whether or not two objects have 
    matching object types along with matching values in their properties.  <code>===</code> checks whether or not one 
    object references another.</p>
<pre>
     class Box {
        public $name = "box";
        
        // Display comparison result
        static function bool2str($bool) {       
            if ($bool === false) {
                return 'FALSE';
            } else {
                return 'TRUE';
            }
        } // end bool2str        
        
    } // end Box  
 
     class Circle {
        public $name = "box";
    } // end Circle
    
     // Create original 'Box' object
    $box = new Box();
    
    // Reference 'box'
    $boxRef = $box;
    
    // Clone 'box'
    $boxClone = clone $box;
    
    // Clone 'box' for change
    $boxChange = clone $box;
    $boxChange->name = "little box";
        
    // Create another 'Box' object
    $anotherBox = new Box();  
    
    // Create a 'Circle' object
    $circle = new Circle();          
</pre>
<table border="0" cellpadding="5" cellspacing="0">
    <caption>Comparison Matrix</caption>
    <tr>
        <th>&nbsp;</th>
        <th><code>boxRef</code></th>
        <th><code>boxClone</code></th>
        <th><code>boxChanged</code></th>
        <th><code>anotherBox</code></th>
        <th><code>circle</code></th>
    </tr>
    <tr>
        <th style="text-align: right;"><code>box</code> == ?</th>
        <td><?php echo Box::bool2str($box == $boxRef); ?></td>
        <td><?php echo Box::bool2str($box == $boxClone); ?></td>
        <td><?php echo Box::bool2str($box == $boxChange); ?></td>
        <td><?php echo Box::bool2str($box == $anotherBox); ?></td>
        <td><?php echo Box::bool2str($box == $circle); ?></td>
    </tr>
    <tr>
        <th style="text-align: right;"><code>box</code> === ?</th>
        <td><?php echo Box::bool2str($box === $boxRef); ?></td>
        <td><?php echo Box::bool2str($box === $boxClone); ?></td>
        <td><?php echo Box::bool2str($box === $boxChange); ?></td>
        <td><?php echo Box::bool2str($box === $anotherBox); ?></td>
        <td><?php echo Box::bool2str($box === $circle); ?></td>
    </tr>    
</table>
</body>
</html>