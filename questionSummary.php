<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">"); ?>
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
    if ($connection) {
        echo"connection success";
    } else {
        echo"no connection";
    }

//after the php sectiont closes the text statements are written as lines with bold
//numbers at the end of the lines 

    if (mysqli_select_db($connection, $DBname) === FALSE) {
        echo "<p>Could not select the \"$DBname\" " .
        "database: " . mysqli_error($connection) . "</p>\n";
    }



    $SQLString = "Select * from questions";

    $queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }
    echo "<h3>Clicker Data Viewer</h3>" .
    "<h2>Question Specific Results</h2>" .
    "<table width='100%' border='1'>" .
    "<tr><th>SessionID</th>" .
    "<th>QuestionID</th>" .
    "<th>Average Score</th>" .
    "<th>Percentage Correct</th>" .
    "<th>Difficulty</th>";


    $i = 0;
    while ($row = mysqli_fetch_assoc($queryResult)) {
        
        // extract($row);
        echo "<tr><td>" . $row["SessionID"] . "</td>\n";
        echo "<td>" . $row["QuestionID"] . "</td>\n";
        echo "<td>" . $row["averageScore"] . "</td>\n";
        echo "<td>" . $row["difficulty"] . "</td>\n";
        echo "<td>" . $row["difficulty"] . "%</td>\n";
      
        "\">Update</a></td></tr>\n" .
        "</table>\n";
        $i++;
    }
    echo "times ran " . $i;
    mysqli_free_result($queryResult);
    echo "</table>\n";
    



//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.\
    echo"<br> <a href=\"index.php\"> Return Home</a>";
    include("EP_Footer.php");
    ?> 





</body>
</html>
