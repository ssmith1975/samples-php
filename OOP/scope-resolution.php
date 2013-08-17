<?php
    // scope-resolution.php
    class A {
        static $a = 1;
        const MY_CONSTANT = "sample text...";
        
        static function updateA() {
            return self::$a + 10;
        }
    } // end A
    
    class B extends A {
        static $a = 5;
        
        static function attribute_test() {
            echo "From 'A::&dollar;a'- ". A::$a . "<br />";
            echo "From 'parent:&dollar;a' - " . parent::$a . "<br />";
            echo "From 'B::&dollar;a' -  ". B::$a . "<br />";
            echo "From 'self::&dollar;a' - ". self::$a . "<br />";
        }
        
        static function method_test() {
            echo "From A::updateA() - " . A::updateA() . "<br />";
            echo "From parent::updateA() - " . parent::updateA() . "<br />";
        }
    } // end B
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Scope Resolution</title>
</head>

<body>
<h1>Scope Resolution</h1>
<p>Accessing static, constant, and overridden properties or methods of a class.</p>
<pre>
     // scope-resolution.php
    class A {
        static $a = 1;
        const MY_CONSTANT = "sample text...";
        
        static function updateA() {
            return self::$a + 10;
        }
    } // end A
    
    class B extends A {
        static $a = 5;
        
        static function attribute_test() {
            echo "From 'A::$a'- ". A::$a;
            echo "From 'parent:$a' - " . parent::$a;
            echo "From 'B::$a' -  ". B::$a;
            echo "From 'self::$a' - ". self::$a;
        }
        
        static function method_test() {
            echo "From A::updateA() - " . A::updateA();
            echo "From parent::updateA() - " . parent::updateA();
        }
    } // end B   
</pre>
<h2>Constants</h2>
<pre>
    echo A::MY_CONSTANT;    
</pre>
<p><strong>Result: </strong>
<?php
    echo A::MY_CONSTANT;
?>
</p>
<h2>Static Properties</h2>
<pre>
    echo A::$a;   
</pre>
<p><strong>Result: </strong>
<?php
    echo A::$a;
?>
<pre>
    echo B::$a;   
</pre>
<p><strong>Result: </strong>
<?php
    echo B::$a;
?>

<h2>Static Methods</h2>
<pre>
    echo A::updateA();   
</pre>
<p><strong>Result: </strong>
<?php
    echo A::updateA();
?>
</p>

<pre>
    echo B::attribute_test();   
</pre>
<p><strong>Result: </strong><br />
<?php
    echo B::attribute_test();
?>
</p>

<pre>
    echo B::method_test();   
</pre>
<p><strong>Result: </strong><br />
<?php
    echo B::method_test();
?>
</p>
</body>
</html>