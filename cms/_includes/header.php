<?php
// Start session
session_start();

   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";

// Header
global $isAdmin;

if(isset($_SESSION['isLoggedIn'])) {
    $isLoggedIn = $_SESSION['isLoggedIn'];
    
    // Grab user id
    if(isset($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
    }
    
    // Grab username
    if(isset($_SESSION['username'])) {

        $username = $_SESSION['username'];
    }    

    // Grab role
    if(isset($_SESSION['role'])) {

        $role = $_SESSION['role'];
    } 
    
   $isAdmin = checkIsAdmin($role) ;

} else {
    $uid = 0;
    $isLoggedIn = false;
    $username = "";
    $isAdmin = false;    
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>PHP: Database</title>
        <link rel="stylesheet" type="text/css" href="_css/styles.css" />
        <link rel="stylesheet" type="text/css" href="_css/sticky_footer.css" />
        <link rel="stylesheet" type="text/css" href="_css/styles_fixed.css" />
        <style type="text/css">

        </style>
        <!--[if !IE 7]>
        <style type="text/css">
                /*#wrap {display:table;height:100%}*/
            </style>
        <![endif]-->
    </head>

    <body>
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Header --> 
            <div id="header" class="clear">
                <div class="container">
                    <span id="pageTitle"><a href="index.php">Samples: PHP</a></span>
                    <span id="loginStatus">
                        <?php if(!$isLoggedIn): ?>
                        <a href="login.php">login</a>
                        <?php else: ?>
                            Logged in as <strong><a href="manage_account.php"><?php echo $username; ?></a></strong> &nbsp;| <a href="logout.php">logout</a>
                        <?php endif; ?>    
                    </span>
                </div> 
            </div>  
            <!-- Content -->    
            <div id="content">
                <div class="container">
                    <div id="top-nav" class="clearfix">
                        <ul class="horizontal-menu">
                            <li><a href="#">Layouts</a></li>                        
                            <li><a href="fixed.html">Fixed Layout</a></li>                      
                            <li><a href="fluid.html">Fluid Layout</a></li>                      
                            <li><a href="responsive.html">Responsive Layout</a></li>                        
                        </ul>
                    </div>
                    <div class="clear"></div>                   
                    
                    <div class="container-inner clearfix">