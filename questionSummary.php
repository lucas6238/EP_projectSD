

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



include("connectDatabase.php");

$table = "questionData";

$processQuery = true;

switch ($_SESSION['Qpick']) {
    case 0: //echo"nothing";
        $processQuery = false;
        break;
    case 1:// echo"all";
        $SQLString = "select * from $table where "
                . "Question = $questionID "
                . "and Date = '$dateID'"
                . "and Session = '$sessionID'";
        break;
    case 2: //echo"Date sess";
        $SQLString = "select * from $table where "
                . " Date = '$dateID'"
                . "and Session = '$sessionID'";
        break;
    case 3: //echo"date question";
        $SQLString = "select * from $table where "
                . "Question = $questionID "
                . "and Date = '$dateID'";
        break;
    case 4: //echo"date only";
        $SQLString = "select * from $table where "
                . "Date = '$dateID' order by question, session asc";

        break;
}


if ($processQuery) {
    //echo $SQLString;

    $queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }

    echo"<h2>Question Specific Results</h2>" .
    "<table width='100%' border='1'class=\"tableBorder\">" .
    "<tr><th>Session</th>" .
    "<th>Date</th>" .
    "<th>Question</th>" .
    "<th>Number of Responses</th>" .
    "<th>Average Points Scored</th>" .
    "<th>Percentage of Correct Responses</th>" .
    "<th>Students that missed this Question</th>";


   
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $passDate =$row["Date"];
        $passQuestion = $row["Question"];
        // extract($row);
        if(strcasecmp($row["Session"], "11AM")){
            echo"<tr class=\"elevenAM\">";
        }
        else{
            echo"<tr>";
        }
        echo "<td>" . $row["Session"] . "</td>\n";
        echo "<td>" . $row["Date"] . "</td>\n";
        echo "<td>" . $row["Question"] . "</td>\n";
        echo "<td>" . $row["Responses"] . "</td>\n";
        if ($row["AveragePoints"] <= .5) {
            echo "<td class=\"badScore\">" . $row["AveragePoints"] . "</td>\n";
        }
        if ($row["AveragePoints"] >= 1.5) {
            echo "<td class=\"goodScore\">" . $row["AveragePoints"] . "</td>\n";
        }
        if ($row["AveragePoints"] < 1.5 && $row["AveragePoints"] > .5) {
            echo "<td class=\"mScore\">" . $row["AveragePoints"] . "</td>\n";
        }

        echo "<td>" . ($row["AveragePercentage"] * 100) . "%</td>\n";
        echo "<td><a href=\"StudentMissedQuestion.php?dataDate=$passDate & dataQuestion=$passQuestion\">Link </a></td>\n";

        "\">Update</a></td></tr>\n" .
                "</table>\n";
        
    }
   
    mysqli_free_result($queryResult);
    echo "</table>\n";
}

//graph for 
include('CreateGraph.php');

$SQLStringEither = "select Question,AveragePoints,AveragePercentage, Responses from ep_project.questionData where Date ='$dateID' and Session ='$sessionID'";
$SQLString10AM = "select Question,AveragePoints,AveragePercentage, Responses from ep_project.questionData where Date ='$dateID' and Session ='10AM'";
$SQLString11AM = "select Question,AveragePoints,AveragePercentage, Responses from ep_project.questionData where Date ='$dateID' and Session ='11AM'";
//caption chartID label value table date session
//QUESTION AVERAGE POINTS SECTION
if (empty($sessionID)) {
    //echoecho "render both graphs";
    
    MakeBarChart("Column2D","Average Points for $dateID Session 11AM", "Graph10", "PQ-chart-1", "Question", "AveragePoints",$SQLString10AM);
    
    MakeBarChart("Column2D","Average Points for $dateID Session 10AM", "Graph20", "PQ-chart-2", "Question", "AveragePoints",$SQLString11AM);
} else {
    echo "single graph";
    echo MakeBarChart("Column2D","Average Points for $dateID Session $sessionID", "Graph30", "PQ-chart-3", "Question", "AveragePoints",$SQLStringEither);
}    

 //PERCENTAGE SECTION

if (empty($sessionID)) {
    //echo "render both graphs";
    MakeBarChart("line","Responses Per Question for $dateID Session 11AM", "Graph40", "RQ-chart-1", "Question", "Responses",$SQLString10AM);

    MakeBarChart("line","Responses Per Question for $dateID Session 10AM", "Graph50", "RQ-chart-2", "Question", "Responses",$SQLString11AM);
} else {
    echo "single graph";
    echo MakeBarChart("line","Responses Per Question for $dateID Session $sessionID", "Graph60", "RQ-chart-3", "Question", "Responses", $SQLStringEither);
}

//ATTENDENCE PIE CHART
//MakePieChart("Average Percentage of Students correctly Question for $dateID Session $sessionID", "Graph70", "PerQ-chart-1", "Question", "AveragePercentage",$SQLString);






