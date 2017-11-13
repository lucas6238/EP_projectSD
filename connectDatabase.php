<?php

/* 
Lucas Chacon
 * CIS 4990
 */



$DBname = "ep_project";
                                //host          user   password
     $connection = mysqli_connect("localhost", "root");
    if (!$connection) {
         echo "Connection failed" . mysqli_errno($connection);
            echo "unable to connect: " . mysqli_connect_error($connection) . PHP_EOL;
    } else {
        //echo"connection success";
    }
    $_SESSION["connection"]=$connection;

//after the php sectiont closes the text statements are written as lines with bold
//numbers at the end of the lines 

    if (mysqli_select_db($connection, $DBname) === FALSE) {
        echo "<p>Could not select the \"$DBname\" " .
        "database: " . mysqli_error($connection) . "</p>\n";
    }

