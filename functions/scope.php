<?php // scope.php

// Declare variable in a global realm
$global_var = "This is global";

// Local Test
function local_test() {
    $global_var = "This is local";
    $local_var = "This is local too";
    echo $global_var . "<br />";
    echo $local_var;
}

// Global variable
function global_keyword_test() {
    global $global_var;
    
    $global_var = "Altered global";
    echo $global_var;
}

// Static variable
function static_test() {
    static $static = 0;
    echo "Static count: "  . $static;
    $static++;
    
}

// echo $local_var (yields error because variable is out of scope)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Variable Scope</title>

</head>

<body>
    <h1>Variable Scope</h1>
    <h2>Local Tesat</h2>
    <p><strong>Original $global_var:</strong><br /> <?php echo $global_var; ?><br />
    <strong>Executing local_test():</strong><br /> <?php local_test(); ?><br />
    <strong>$global_var after local_test():</strong><br /> <?php echo $global_var; ?><br />
    <strong>$local_var after local_test():</strong><br /> <?php //echo $local_var; ?> <em>(Undefined variable error)</em>   
    </p>
    
    <h2>Global Test</h2>
    <p><strong>Original $global_var:</strong><br /> <?php echo $global_var; ?><br />
    <strong>Executing global_keyword_test():</strong><br /> <?php global_keyword_test(); ?><br />
    <strong>$global_var after global_keyword_test():</strong><br /> <?php echo $global_var; ?><br />
    </p>
    
    <h2>Static Test</h2>
    <p><strong>Executing static_test() #1:</strong><br /> <?php static_test(); ?><br />
    <strong>Executing static_test() #2:</strong><br /> <?php static_test(); ?><br />
    <strong>Executing static_test() #3:</strong><br /> <?php static_test(); ?>
    </p>    
    
    
</body>
</html>
