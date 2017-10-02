<?php

/* 
Lucas Chacon
 * CIS 4990
 */
//We will implement the host connection when we are connecting to a server over the
//internet right now im testing it locally
// $host = "97.85.55.178";
//         $port = 443;
//        $remoteserver = "$host:$port";
//         $waitTimeoutInSeconds = 30;
//          $fp = fsockopen($host, $port, $errCode, $errStr, $waitTimeoutInSeconds);
//        
//        if ($fp) {
//            echo "It worked <br>" ;
//        } else {
//            echo "It didn't work <br>"; 
//        }




$DBname = "ep_project";
                                //host          user
    $connection = mysqli_connect("localhost", "root");
    if (!$connection) {
         echo "Connection failed" . mysqli_errno($connection);
            echo "unable to connect: " . mysqli_connect_error($connection) . PHP_EOL;
    } else {
        //echo"connection success";
    }

//after the php sectiont closes the text statements are written as lines with bold
//numbers at the end of the lines 

    if (mysqli_select_db($connection, $DBname) === FALSE) {
        echo "<p>Could not select the \"$DBname\" " .
        "database: " . mysqli_error($connection) . "</p>\n";
    }

