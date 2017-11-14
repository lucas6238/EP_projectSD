
<?php

/*
  Lucas Chacon
  CIS 4990
  9/14/17
  Enterprise Project
  Student Overall Section
 * This section renders on the left side of the student page
 */






if ($queryResult2 === FALSE) {
    echo "<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($connection)
    . ": " . mysqli_error($connection) . "</p>";
}


$SQLfindQAmount = "SELECT * from date where Date = '$dateID'";

$queryfindAmount = mysqli_query($connection, $SQLfindQAmount);
if ($queryfindAmount) {
    while ($fieldInfo = mysqli_fetch_assoc($queryfindAmount)) {
        //echo $fieldInfo["QuestionAmount"];
        $foundAmount = $fieldInfo["QuestionAmount"];
    }
} else {
    echo "problem with query";
}


echo"<h2>Student " . $studentID . " Specific Results for " . $dateID . "</h2>" .
 "<table width='100%' border='1'>" .
 "<th>Session</th>" .
 "<th>Question</th>" .
 "<th>Score</th>" .

 "<tr>";

$SQLString2 = "SELECT * from studentscores where SID='$studentID' and date = '$dateID' and Total!=0 order by ActDate";
$queryResult2 = mysqli_query($connection, $SQLString2);
$recordExist =false;

$x = $foundAmount;
$tempCount = 1;
while ($row = mysqli_fetch_assoc($queryResult2)) {
    
    
   
        while($tempCount<$foundAmount+1){
       echo "<tr><td>".$row["Session"]."</td><td>Q" . $tempCount . "</td><td>" . $row["Q".$tempCount] . "</td></tr>";
       $tempCount++;
       $recordExist =true;
       }
 
      
   
   
    "</table>\n";
}
if(!$recordExist){
    echo "Student has no records for this date"; 
}
//echo "times ran " . $i;
mysqli_free_result($queryResult2);
echo "</table>";


//total points form student over all class periods
//list of there total scores for all those dates
//now I want to somehow show the points the students gave out of how many were possible what i need to
//do is divide the total points by the 

$charTitle = "Percentage of points Earned by $studentID Per Date";
MakeSpecialStudentChart("Column2D", $charTitle, "Graph103", "DatesTotal-chart-10", $studentID);
MakeSpecialStudentChart("line", $charTitle, "Graph104", "DatesTotal-chart-11", $studentID);










