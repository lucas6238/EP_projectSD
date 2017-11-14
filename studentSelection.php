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
    ////this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
    //include("../all/EP_Header.php");
    if(isset($studentID)){
        
    }
    else{
       $studentID  = "0";  
    }
   
    $studentDisplay="";
    $errStudent="";
    $studentComplete = false;
    
    $sessionID  = "Both";
    $dateID = "0";
    $dateDisplay = "";
    $DateComplete = false;
    $Qcomplete= false;
    $Scomplete =false;
    $sessionDisplay="";
    $questionDisplay="";
   // $_SESSION['Spick'] =0;
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Student
        if($_POST["studentID"] == 0){
            $errStudent="Student Does not exist";
           // $errQID = "QuestionID is not required";  
        }
        else{
            $studentID = $_POST["studentID"];
            $studentDisplay=$studentID;
             $studentComplete = true;
          
        }
        
        if(empty($_POST["dateID"])){
            $errDate = "Date is not required";
           
        }  
            else{
            $dateID = $_POST["dateID"];
            $dateDisplay = $dateID;
             $DateComplete = true;
           
            
        }
         
         
    }
    
    ?>
   
    
    <div class="studentWrapper">
        <div class="swL">
<h2>Student Data</h2>




<form  method="POST" 
       action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <table>
        
       <!-- <tr>
                <td>Date</td>
                <td><select class="dropDown" name="dateID">
                        <option value="<?php echo$dateID?>">Last used:<?php echo $dateDisplay?></option>
                        <option value="All">All</option>
                    <?php include("selectUniqueDates.php");?>       
                    </select>
                    
                </td>
              
            </tr>-->
        
         <tr>
                <td>Student Overall Summary</td>
                <td><select class="dropDown" name="studentID">
                        <option value="<?php echo$studentID?>">Last used:<?php echo $studentDisplay?></option>
                        
                    <?php include("selectUniqueStudents.php");?>       
                    </select>
                    
                </td>
              
            </tr>
        <tr>
                <td>Date</td>
                <td><select class="dropDown" name="dateID">
                        <option value="<?php echo$dateID?>">Last used:<?php echo $dateDisplay?></option>
                        
                    <?php include("selectUniqueDates.php");?>       
                    </select>
                    
                </td>
              
            </tr>
        
        
      
            <tr>
                <td></td>
                <td> <input style="width:100%;" type="submit" name="submitQuestion" value="Submit"/> </td> 
            </tr>
             
         </table>
          
         </form>       
            <div id="DatesTotal-chart-1"></div>
            <div id="DatesTotal-chart-2"></div>
            <div id="DatesTotal-chart-3"></div>
                


    

                <?php
                //Date Session Question
                include("studentSummary.php");
               
                
                
//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.
                ?>
                </div>
    <div class="swR">
        <h1>Student Specific Date</h1>
       
        <?php
        
            include('StudentQuestionSummary.php');
            
        ?>
    </div>
    </div>
    
    
    
    
    
    
    
    
    
    
                <?php
                include("EP_Footer.php");
                
                ?> 





                </body>
                </html>
