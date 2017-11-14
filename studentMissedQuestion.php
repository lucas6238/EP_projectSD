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

<body>
    <ul>
     <li><a href='homepage.php'>Home</a></li>
     <li><a href='studentSelection.php'>Student</a></li>
     <li><a href='QuestionSelection.php'>Question</a></li>
     <li style="float:right;"><a href="SignIn.php">Log off </a></li>    
    </ul>
    <?php
    
    include('CreateGraph.php');
    include('connectDatabase.php');
 
    ?>
    <div class="outsideWrapper">
        
    <?php
    
//    if(isset($_GET["dataDate"]) && isset($_GET["dataQuestion"]))
//    {
//        $dataDate = $_GET["dataDate"];
//        $dataQuestion = $_GET["dataQuestion"];
//    }
    $dataDate = $_GET["dataDate"];
    echo $dataDate . "<br>";
    
     $dataQuestion = $_GET["dataQuestion"];
    echo $dataQuestion. "<br>";
    //echo $dataQuestion;
$table = "studentscores";
$Qcol = "Q".$dataQuestion;
echo $Qcol;
$SQLString = "select * from  ep_project.studentscores where Date='$dataDate' and $Qcol=2  order by SID asc";

$queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }
     
   


    $i = 0;
    echo "<table class=\"tableBorder\">";
    echo"<th>Students Who missed Question $dataQuestion </th>";
    while ($row = mysqli_fetch_assoc($queryResult)) {
        
        // extract($row);
        echo "<tr><td>" .$row["SID"] ."<td></tr>";
        
       
        $i++;
    }
    echo "</table>";
    echo "times ran " . $i;
    mysqli_free_result($queryResult);
    ?>
   
    
   
    </div>



    
                <?php
                include("EP_Footer.php");
                
                ?> 





                </body>
                </html>
