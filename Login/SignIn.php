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
        
        include ("../all/connectDatabase.php");
        include ("../all/helperfunctions.php");
        
        session_start();
            testHashs();
        ?>

        <div>
            <div >
                <h1 >Login</h1>

                <form action="
                      <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST' >

                    <p><input type='text'  name='email'  placeholder="email"></p>

                    <p> <input type='password'  name='password' placeholder="password"></p>

                    <p> <input type="submit" name = "submit" value="Login" ></p>

                </form>



            </div>
            <div>
                <h4>Don't have an account</h4>
                <a href='NewUser.php'>Click here to create a new account</a>
            </div>
        </div>



        <?php
         include('SignInBottom.php');
         
        ?>


    </body>
</html>
