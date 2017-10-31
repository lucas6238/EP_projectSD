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
    <?php include("EP_Header.php"); ?>
 
    
    <?php
    session_start();
   // error_reporting(0);
//this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
    
    $questionID  = "";
    $sessionID  = "";
    $dateID = "";
    $errDate = "";
    $DateComplete = false;
    $Qcomplete= false;
    $Scomplete =false;
    $sessionDisplay="";
    $questionDisplay="";
    $dateDisplay="";
    $_SESSION['Qpick'] =0;
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Question
        if($_POST["questionID"] == 0){
            $questionDisplay="All";
           // $errQID = "QuestionID is not required";
           
           
        }
        else{
            $questionID = $_POST["questionID"];
            $questionDisplay=$questionID;
             $Qcomplete = true;
           // include("questionSummary.php");
        }
         //Session
        if(strcasecmp($_POST["sessionID"], "Both") == 0){
            $sessionID = "";
            $sessionDisplay = "Both";
           
           
        }
        else{
            
            $sessionID = $_POST["sessionID"];
            $sessionDisplay = $sessionID;
             $Scomplete = true;
           // include("questionSummary.php");
        }
        //Date
        if(empty($_POST["dateID"])){
            $errDate = "Date is required";
           
        }
        else{
            $dateID = $_POST["dateID"];
             $DateComplete = true;
           // include("questionSummary.php");
        }
    }
    
    ?>
   
   
    <div class="outsideWrapper">      
<h2>Question Data</h2>




<form  method="POST" 
       action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <table>
        <tr>
                <td>Date</td>
                <td><select class="dropDown" name="dateID"
                            >
                        <option value="<?php echo$dateID?>">Last used:<?php echo $dateID?></option>
                    <?php include("selectUniqueDates.php");?>       
                    </select>
                    
                </td>
                <td><span class="error"><?php echo $errDate?></span></td>
                
            </tr>
        
            <tr>
                <td>Session</td>
                <td><select class="dropDown" name="sessionID">
                             
                        
                        <option value="<?php echo$sessionDisplay?>">Last used:<?php echo $sessionDisplay?></option>
                        <option value="Both">Both</option>
                        <option value="10AM">10AM</option>
                        <option value="11AM">11AM</option>
                    </select>
                    
                </td>
                
            </tr>
        
             <tr>
                <td>Question</td>
                <td><select class="dropDown" name="questionID">
                        <option value="<?php echo$questionID?>">Last used:<?php echo $questionDisplay?></option>
                        <option value="0">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    
                </td>
                
            </tr>
       
            <tr>
                <td></td>
                <td> <input style="width:100%;" type="submit" name="submitQuestion" value="Select Question"/> </td> 
            </tr>
             
         </table>
          
         </form>       
                
                




                <?php
                //Date Session Question
                if($Qcomplete && $Scomplete && $DateComplete){
                $_SESSION['Qpick']=1;
                    //all three
                
                }
                //Date Session
                if($DateComplete && $Scomplete && !$Qcomplete){
                    $_SESSION['Qpick']=2;
                    //run specific query
                }
                //Date Question
                if($DateComplete && $Qcomplete && !$Scomplete){
                    $_SESSION['Qpick']=3;
                   
                }
                //Date
                if($DateComplete && !$Qcomplete && !$Scomplete){
                    $_SESSION['Qpick']=4;
                    
                }
                
                include("questionSummary.php");
               
                
                
//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.
                
                session_destroy();
                ?> 
                </div>
                <?php
                include("EP_Footer.php"); 
                ?>



                
                </body>
                </html>
