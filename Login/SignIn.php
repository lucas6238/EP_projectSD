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
        <link  type="text/css" rel="stylesheet" href="w3.css">
    </head>
    <body class = " w3-blue">

        <?php
       
        include 'StartConnection.php';
        ?>

        <div class=' w3-container w3-section w3-center'>
            <div class = "w3-white w3-padding-large">
                <h1 >Login</h1>

                <form action="SignInFORM.php" method='POST' >

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
         include 'SignInBottom.php';
        
        ?>


    </body>
</html>
