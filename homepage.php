<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">"); ?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       <?php
        if((filter_input(INPUT_COOKIE,"logon")) ==  true){
            
        }
        else{
            echo "you have not logged on";
            header('Location: SignIn.php');
        }
        ?>
        
    
        
        
        <?php
        include("EP_Header.php");
        session_start();
        ?>
        
        <div class="outsideWrapper">
            <h1 class="header"><img src="pictures/hcob2.jpg" width="20%" height="20%">Clicker-Viewer</h1>
            <?php
        
        ?>
            <div class="homepageWrapper">
        <h3>
            Welcome <?php if(isset($_COOKIE['fname'])&& $_COOKIE['lname']){
             echo ucFirst($_COOKIE['fname']) . " " . ucfirst($_COOKIE['lname']);}?> 
        </h3>
       
         
        
        <table>
            
            <tr>
                <td>
                  <a class="fancyLink" href="questionSelection.php">Question Selection</a>  
                </td>
                
            
            
                <td>
                   <a class="fancyLink" href="studentSelection.php">Student Selection</a>  
                </td>
                
            </tr>
        </table>
        <h4>About this Project</h4>
        <p>
            this project is a web viewer for clicker data captured <br>
             in CIS 1020 classes at Western Michigan University 
        </p>
            </div>
        
        
        </div>
        <?php include("EP_Footer.php");?>
    </body>
</html>
