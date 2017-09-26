<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?".">"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<style>
<?php include 'EP_CSS.css'; ?>
</style>
<head>
   <title>Clicker Data Display</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
</head>

<?php

/*
Lucas Chacon 
CIS 4990
9/14/17
Enterprise Project
Page Header and Footer
display data from a database in meaningful ways
 * Clicker data from iclickers
*/
?>

<body class="wrapper">

<?php 

//this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
include("EP_Header.php");



$DBname = "ep_project";
        $connection = mysqli_connect("localhost", "root");
        if($connection){
            echo"success";
        }
        else{
            echo"no connection";
        }

//after the php sectiont closes the text statements are written as lines with bold
//numbers at the end of the lines ?>
    
    
<h3>Clicker Data Viewer</h3>
<p></p>

<h2>Total Students</h2> 
<table width='100%' border='1'>
    <tr><th>Class</th>
        <th>Number of Students</th>
       
    </tr>
    <tr><td>10am</td>
        <td>114</td>      
    </tr>
    <tr><td>11am</td>
        <td>120</td>
      
    </tr>
</table>

<h2>Question Specific Results</h2> 
<table width='100%' border='1'>
    <tr><th>Date</th>
        <th>Session</th>
        <th>Question #</th>
        <th>Percent of Student Earning Credit</th>
        <th>Difficulty</th>
        
       
    </tr>
    <tr>
        <td>10/1/16</td>
        <td>Apr3_10AM</td>
        <td>1</td>
        <td>75%</td>
        <td>.5</td>
        
      
       
        
    </tr>
</table>
<h2>Results by Date</h2>
<table width='100%' border='1'>
    <tr><th>Date</th>
        <th> Total Entries</th>
        <th> Average Total Score</th>
        <th> Total Questions</th>
        
        <th> Class</th>
        <th> Average Speed</th>
    
    </tr>
    
    <tr><td>10/1/16</td>
        <td>1400</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        
        
    </tr>
</table>

<?php
//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.
 include("EP_Footer.php"); ?> 





</body>
</html>
