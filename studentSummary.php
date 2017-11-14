
<?php

/*
  Lucas Chacon
  CIS 4990
  9/14/17
  Enterprise Project
  Student Overall Section
 * This section renders on the left side of the student page
 */




//include("connectDatabase.php");








echo $SQLString . "<br>";
$SQLString2 = "SELECT studentscores.*, date.* FROM `date`,`studentscores` 
            where date.ActDate=studentscores.ActDate and studentscores.SID='$studentID' and studentscores.Total!=0 order by date.ActDate";

$queryResult2 = mysqli_query($connection, $SQLString2);
if ($queryResult2 === FALSE) {
    echo "<p>Unable to execute the query.</p>"
    . "<p>Error code " . mysqli_errno($connection)
    . ": " . mysqli_error($connection) . "</p>";
}

echo"<h2>Student " . $studentID . " Specific Results</h2>" .
 "<table width='100%' border='1' class=\"tableBoarder\">" .
 "<th>Session</th>" .
 "<th>Date</th>" .
 "<th>Percent Score</th>" .
 "<th>Points Earned</th>" .
 "<th>Max Points Possible</th>" .
 "tr>";


while ($row = mysqli_fetch_assoc($queryResult2)) {

    // extract($row);
    echo "<tr><td>" . $row["Session"] . "</td>\n";
    echo "<td>" . $row["Date"] . "</td>\n";
    
    if(round($row["Total"] / ($row["QuestionAmount"] * 2) >=.75)){
        echo "<td class=\"goodScore\">";
    }
   else if(round($row["Total"] / ($row["QuestionAmount"] * 2) <.75) &&
           round($row["Total"] / ($row["QuestionAmount"] * 2) >=.25) ){
                echo "<td class=\"mScore\">";

    }
    else{
        echo "<td class=\"badScore\">";
    }
    echo  round($row["Total"] / ($row["QuestionAmount"] * 2), 2) * 100 . "%</td>\n";
    echo "<td>" . $row["Total"] . "</td>\n";
    echo "<td>" . $row["QuestionAmount"] * 2 . "</td>\n";
    echo "</tr>\n";
    "</table>\n";
}

echo "times ran " . $i;
mysqli_free_result($queryResult2);
echo "</table>\n";


//total points form student over all class periods
//list of there total scores for all those dates
//now I want to somehow show the points the students gave out of how many were possible what i need to
//do is divide the total points by the 

$charTitle = "Percentage of points Earned by $studentID Per Date";
MakeSpecialStudentChart("Column2D", $charTitle, "Graph101", "DatesTotal-chart-2", $studentID);
MakeSpecialStudentChart("line", $charTitle, "Graph102", "DatesTotal-chart-3", $studentID);



   






