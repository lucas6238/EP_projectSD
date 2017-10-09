<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../all/connectDatabase.php");

$table = "questionData";

$SQLString = "select Distinct date from $table order by date asc";

$queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }
     
   


    $i = 0;
    while ($row = mysqli_fetch_assoc($queryResult)) {
        
        // extract($row);
        echo "<option>" . $row["date"] . "</option>";
        
       
        $i++;
    }
    echo "times ran " . $i;
    mysqli_free_result($queryResult);
   