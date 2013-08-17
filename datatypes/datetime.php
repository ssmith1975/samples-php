<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Date and Time Functions</title>
<style>
    body {
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
    }
    
    h1 { font-size: 1.4em;}
    h2 { font-size: 1.2em; color: #4488aa;}
    p { line-height: 1.5em; }
    
</style>
</head>

<body>
<h1>Date and Time Functions</h1>


    <h2>Make a Unix Timestamp</h2>
    <p>
        <strong>time(): </strong> 
        <?php echo time(); ?><br /> 
        <strong>mktime(6, 30, 0, 6, 21, 2013): </strong>
        <?php
            $hr = 6;
            $min = 30;
            $sec = 0;
            $mo = 6;
            $day = 21;
            $yr = 2013;
            $mktime= mktime($hr, $min, $sec, $mo, $day, $yr);
            echo $mktime;
        ?><br />
         <strong>strtotime('6/21/2013'): </strong> <?php  $timestamp1 =  strtotime('6/21/2013'); echo $timestamp1; ?><br />
         <strong>strtotime('now'): </strong> <?php  $timestamp2 = strtotime('now'); echo $timestamp2; ?><br />
         <strong>strtotime('22 June 2013'): </strong> <?php $timestamp3 = strtotime('22 June 2013'); echo $timestamp3; ?><br />
         <strong>strtotime('last Monday'): </strong> <?php  $timestamp4 = strtotime('last Monday'); echo $timestamp4; ?><br /> 
        
    </p>
    <h2>Formatting Unix Timestamp</h2>
    <p>Makes time more readable:<br />
        <strong>date('l F d, Y'): </strong><?php echo date('l F d, Y'); ?><br />
        <strong>date('g:i:s a'): </strong> <?php  echo date('g:i:s a'); ?><br /><br />
        <strong>date('l F d, Y', strtotime('6/21/2013')): </strong> <?php  echo date('l F d, Y', $timestamp1); ?><br />       
        <strong>date('l F d, Y g:i:s a', strtotime('now')): </strong> <?php  echo date('l F d, Y  g:i:s a', $timestamp2); ?><br />   
        <strong>date('l F d, Y', strtotime('22 June 2013')): </strong> <?php  echo date('l F d, Y', $timestamp3); ?><br /> 
        <strong>date('l F d, Y', strtotime('last Monday')): </strong> <?php  echo date('l F d, Y', $timestamp4); ?><br /><br /> 
    </p>
    <p>For MySQL:<br />
        <strong>$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", time()): </strong>     
        <?php
            $now = time();
            $mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $now);
            
            echo $mysql_datetime; // ie 2008-11-01 13:31:23
        
        ?>
    </p>
</body>
</html>
