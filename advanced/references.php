<?php
   // references.php
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>References</title>
</head>

<body>
<h1>References</h1>
<p>Two variables pointing to the same memory address, thus same content but different variable names. Think of it as a nicknme.</p>
<h2>Assign By Reference</h2>
<p>Declare <code>a</code> and <code>b</code> and assign <code>b</code> with <code>a</code>:</p>
<pre>
    $a = 1;
    $b = $a;   
</pre>
<?php
    // Declare variable 'a'
    $a = 1;
    
    // Declare 'b' and set it equal to 'a'
    $b = $a;   
?>
<p><?php echo "The value for <code>a</code> is $a";  ?><br />
   <?php echo "The value for <code>b</code> is $b"; ?>
</p>
<p>Change the value for <code>b</code>:</p>
<pre>
    $b = 5;   
</pre>
<?php
    // Change 'b'
    $b = 5;   
?>
<p><?php echo "The value for <code>a</code> is $a"; ?><br />
   <?php echo "The value for <code>b</code> is $b"; ?>
</p>
<p>Let <code>b</code> reference <code>a</code>:</p>
<pre>
    $b =& $a;  
     
</pre>
<?php
    // Assign a reference of 'a' to the variable 'b'
    $b =& $a; 
?>
<p><?php echo "The value for <code>a</code> is $a";  ?><br />
   <?php echo "The value for <code>b</code> is $b";  ?>
</p>
<p>Change the value for <code>b</code>:</p>
<pre>
    $b = 5;   
</pre>
<?php
    // Change 'b'
    $b = 5;   
?>
<p><?php echo "The value for <code>a</code> is $a"; ?><br />
   <?php echo "The value for <code>b</code> is $b"; ?>
</p>


<h2>Pass By Reference</h2>
<p>Declare <code>c</code> as well as functions <em>passByVal</em> and <em>passByRef</em>:</p>
<pre>
     // Declare variable 'c'
    $c = 10;
    
    // Pass a variable as a value
    function passByVal($param){
        $param = $param*2;
    }
    
    // Pass a variable as a reference
    function passByRef(&$param) {
        $param = $param*2;       
    }   
</pre>
<?php
    // Declare variable 'c'
    $c = 10;
    
    // Pass a variable as a value
    function passByVal($param){
        $param = $param*2;
    }
    
    // Pass a variable as a reference
    function passByRef(&$param) {
        $param = $param*2;       
    }
?>
<p><?php echo "The original value for <code>c</code> is $c"; ?></p>
<pre>
    // Call passByVal
    passByVal($c);
</pre>
<?php 
    // Call passByVal
    passByVal($c);
    
?>
<p><?php echo "The value for <code>c</code> after  passByVal is $c"; ?></p>
<pre>
    // Call passByRef
    passByRef($c);
</pre>
<?php 
    // Call passByRef
    passByRef($c);
    
?>
<p><?php echo "The value for <code>c</code> after  passByRef is $c"; ?></p>

<h2>Return By Reference</h2>
<p>Declare variable 'd' as well as functions returnByVal and returnByRef:</p>
<pre>
    // Declare variable 'd'
    $d = 0;
    
    // Return as a value
    function returnByVal(){
        static $localvar = 0;
        return $localvar;
    }
    
    // Return as a reference
    function &returnByRef() {
        static $localvar = 0;
        return $localvar;  
    } 
</pre>

<?php
    // Declare variable 'd'
    $d = 0;
    
    // Return as a value
    function returnByVal(){
        static $localvar = 0;
        return $localvar;
    }
    
    // Return as a reference
    function &returnByRef() {
        static $localvar = 0;
        //$localvar++;
        return $localvar;   
    }
?>
<p><?php echo "The original value for <code>d</code> is $d"; ?></p>
<pre>
    // Call passByVal
    $d = returnByVal();
</pre>
<?php 
    // Call returnByVal
    $d = returnByVal();
    
?>

<p><?php echo "The value for <code>d</code> after passByVal is $d"; ?></p>
<p>Update the <code>d</code>:</p>
<pre>
    // Update 'd'
    $d = 25;
    
     // Declare 'e' and set it to returnByVal
    $e = returnByVal();       
</pre>
<?php 
    // Update 'd'
    $d = 25;
    
    // Declare 'e' and set it to returnByVal
    $e = returnByVal();
    
?>

<p><?php echo "The value for <code>d</code> after passByVal is $d"; ?><br />
    <?php echo "The value for <code>e</code> after passByVal is $e"; ?>
</p>





<pre>
    // Call returnByRef
    $f =& returnByRef();
</pre>
<?php 
    // Call returnByRef
    $f =& returnByRef();
    
?>
<p><?php echo "The value for <code>c</code> after  passByRef is $f"; ?></p>
<p>Update <code>f</code>:</p>
<pre>
    // Change variable 'f'
    $f = 5;
    
    //Create a new variable 'g'
    $g =&returnByRef(); 
</pre>
<?php
    // Change variable 'f'
    //var_dump($f);
    $f=5;
    $g =& returnByRef();
?>
<p><?php echo "The value for <code>f</code> is $f"; ?><br />
   <?php echo "The value for <code>g</code> is $g"; ?><br /><br />
   

   
</p>
</body>
</html>
