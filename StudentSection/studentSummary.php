

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



    
//this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
   // include("EP_Header.php");

 

    include("../all/connectDatabase.php");
    
    $table = "student";
    
    $skip = true;
    
    switch($_SESSION['Spick']){
        case 0: echo"bat nothing";
           $skip=false;
            
            break;
        case 1: echo"all";
            $SQLString = "select * from $table where "
            . "SID like '$studentID%'";
            break;
        case 2: echo"Date sess";
            $SQLString = "select * from $table where "
            
            . " Date = '$dateID'"
            . "and Session = '$sessionID'";
            break;
        case 3: echo"date question";
            $SQLString = "select * from $table where "
            . "Question = $questionID "
            . "and Date = '$dateID'";
            break;
        case 4: echo"date only";
            $SQLString = "select * from $table where "
            
            . "Date = '$dateID' order by question asc";
            
            break;
    }
    
    echo $skip;
    if($skip){
    echo $SQLString . "<br>";
   
      
    $queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
//        echo "<p>Unable to execute the query.</p>"
//        . "<p>Error code " . mysqli_errno($connection)
//        . ": " . mysqli_error($connection) . "</p>";
    }
     
    echo"<h2>Question Specific Results</h2>" .
    "<table width='100%' border='1'>" .
    "<tr><th>Student ID</th>" .
    "<th>Session</th>";


    $i = 0;
   

        
    while ($row = mysqli_fetch_assoc($queryResult)) {
        
        // extract($row);
        echo "<tr><td>" . $row["SID"] . "</td>\n";
        echo "<td>" . $row["Session"] . "</td>\n";
        
        "</table>\n";
        $i++;
    }
    
    echo "times ran " . $i;
    mysqli_free_result($queryResult);
    echo "</table>\n";
    
   

    }
//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.\
  //  echo"<br> <a href=\"index.php\"> Return Home</a>";
  //  include("EP_Footer.php");
   






