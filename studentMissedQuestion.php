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
a  an array of all students
b  an array of all the students that got the question right
if b is not in a save it in another array


loop through all students
210045
is this student ID in the students who got it correct
yes - dont do anything 
no save the id in the student who got it wrong array  

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
    //echo $dataDate . "<br>";
    
     $dataQuestion = $_GET["dataQuestion"];
    //echo $dataQuestion. "<br>";
    //echo $dataQuestion;
$table = "studentscores";
$Qcol = "Q".$dataQuestion;
//echo $Qcol;

//STUDENTS WHO GOT IT CORRECT
$SQLString = "select * from  ep_project.studentscores where Date='$dataDate' and $Qcol=2  order by SID asc";

$queryResult = mysqli_query($connection, $SQLString);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }
     
   

    $correctStudents = array();
    $i = 0;
    echo "<table class=\"tb\">";
   //echo"<th>Students Who got Question  $dataQuestion Correct</th>";
    while ($row = mysqli_fetch_assoc($queryResult)) {
       
        array_push($correctStudents,$row["SID"]);
        //echo "<tr><td>" .$row["SID"] ."<td></tr>";
        
       
        $i++;
    }
    echo "</table>";
    //echo "times ran " . $i . "<br>";
    
    
    for($x=0;$x<count($correctStudents);$x++){
      //  echo $correctStudents[$x] . "<br>";
    }
    
    //ARRAY OF ALL STUDENTS
    $SQLStrStudent = "select distinct SID from  student  order by SID asc";

    $queryResultStudent = mysqli_query($connection, $SQLStrStudent);
    if ($queryResult === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($connection)
        . ": " . mysqli_error($connection) . "</p>";
    }
     
   

    $allStudents = array();
    $i = 0;
    echo "<table class=\"tb\">";
    //echo"<th>All Students </th>";
    while ($row = mysqli_fetch_assoc($queryResultStudent)) {
       
        array_push($allStudents,$row["SID"]);
        //echo "<tr><td>" .$row["SID"] ."<td></tr>";
        
       
        $i++;
    }
    echo "</table>";
    //echo "times ran " . $i . "<br>";
    
    
    
    //create a new array that starts as all students but remove all those that got it correct
    $studentsMissed = array();
    //loop through
    
    foreach($allStudents as $everyStudent){
        $matchFlag = false;
        foreach($correctStudents as $corStudent){
            
            if(strcasecmp($everyStudent, $corStudent)==0){
                //echo "EveryStudent matches " . $everyStudent . "Matches " .$corStudent ."  <br>" ;
                //match flag thrown showing that $everyStudent found a match
                $matchFlag = true;
                break;
            }
           
        }
        if(!$matchFlag){
        //echo "this student had not match" . $everyStudent . "<br>";
        array_push($studentsMissed,$everyStudent);
        }
    }
    echo "<table class=\"tb\">";
    echo "<th class=\"tb\"> Students that missed Question $dataQuestion on $dataDate </th>";
    
     for($x=0;$x<count($studentsMissed);$x++){
       echo "<tr class=\"tb\"><td class=\"tb\">" . $studentsMissed[$x] . "</tr></td>";
    }
    
    
    echo "</table>";
    
    mysqli_free_result($queryResultStudent);
    
    ?>
   
    
   
    </div>



    
                <?php
                include("EP_Footer.php");
                
                ?> 





                </body>
                </html>
