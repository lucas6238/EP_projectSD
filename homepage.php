<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">"); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        
         <nav>
        <a href='homepage.php'>Home</a>
        <a href='StudentSection/studentSelection.php'>Student</a>
        <a href='QuestionSection/QuestionSelection.php'>Question</a>
        </nav>
        
        <?php include("all/EP_Header.php");?>
        <h3><?php echo "welcome USERNAME" ?></h3>
       
        
        <table>
            
            <tr>
                <td>
                  <a href="QuestionSection/questionSelection.php">Question Selection</a>  
                </td>
                
            </tr>
            <tr>
                <td>
                   <a href="StudentSection/studentSelection.php">Student Selection</a>  
                </td>
                
            </tr>
        </table>
        <h4>About this Project</h4>
        <p>
            this project is a web viewer for clicker data captured <br>
             in CIS 1020 classes at Western Michigan University 
        </p>
        
        <a href="logoff.php">Sign off</a>
        <?php include("all/EP_Footer.php");?>
    </body>
</html>
