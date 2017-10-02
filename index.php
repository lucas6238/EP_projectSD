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
    session_start();
    
//this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
    include("EP_Header.php");
    $questionID = $errQID = "";
    $sessionID = $errSessID = "";
    $dateID = $errDate = "";
    $DateComplete = false;
    $Qcomplete= false;
    $Scomplete =false;
    $_SESSION['Qpick'] =0;
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Question
        if(empty($_POST["questionID"])){
           // $errQID = "QuestionID is not required";
           
           
        }
        else{
            $questionID = $_POST["questionID"];
             $Qcomplete = true;
           // include("questionSummary.php");
        }
         //Session
        if(empty($_POST["sessionID"])){
           // $errSessID = "sessionID is  not required";
           
        }
        else{
            $sessionID = $_POST["sessionID"];
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
   
    <p>
        
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
                
            </tr>
        
            <tr>
                <td>Session</td>
                <td><select class="dropDown" name="sessionID">
                             
                        
                        
                        <option value="">Both</option>
                        <option value="10AM">10AM</option>
                        <option value="11AM">11AM</option>
                    </select>
                    
                </td>
                
            </tr>
        <!--
            <tr>
                <td>Date</td>
                <td><input type="text" name="dateID" 
                           value="<?php echo $dateID?>"/></td>
                <td><span class="error"> <?php echo $errDate?></span></td>
            </tr>
        
            <tr>
                <td>Session</td>
                <td><input type="text" name="sessionID" 
                           value="<?php echo $sessionID?>"/></td>
                <td><span class="error"> <?php echo $errSessID?></span></td>
            </tr>
        -->
        <tr>
                <td>Question</td>
                <td><input type="text" name="questionID" 
                           value="<?php echo $questionID?>"/></td>
                <td><span class="error"> <?php echo $errQID?></span></td>
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
                include("EP_Footer.php");
                session_destroy();
                ?> 





                </body>
                </html>
