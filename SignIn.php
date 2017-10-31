<!DOCTYPE HTML>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  type="text/css" rel="stylesheet" href="../all/EP_CSS.css">
    </head>
    <body >

        <?php
        //include("../all/EP_Header.php");
        include ("connectDatabase.php");
        include ("helperfunctions.php");
        
        session_start();
            
        
           
        ?>
        <div class="outsideWrapper">
        
            
                <img class="splashIMG" src="wmu.png" >
                <h2 class="splshText">Login to Clicker Data Viewer</h2>
<div class="center">
                <form action="
                      <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST' id="formSelf" >
                    <table>
                        <tr><td style="float:left">Email</td><td><input  type='text'  name='email'  placeholder="email"></td></tr>
                        <tr><td style="float:left">Password</td><td><input  type='password'  name='password' placeholder="password"></td></tr>
                    </table>
                    

                     
 
                </form>
                
                <form action="NewUser.php" id="formNewUser"></form>


                <table class="buttonTable">
                    <td><button class="button1" form="formSelf" width="100%" type="submit" name = "submit" value="Login" >Login</button></td>
                    <td><button class="button1" form="formNewUser" type="submit" value="New User">New User</button></td>
                </table>
            
        </div>
        </div>


        <?php
        include('SignInBottom.php');
        include("EP_Footer.php");
         
         
        ?>


    </body>
</html>
