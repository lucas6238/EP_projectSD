<!DOCTYPE html>
<!--
Lucas web 
NEW USER
DEBUG VERSION
-->

<?php

include ("../all/connectDatabase.php");
include ("../all/helperfunctions.php");

?>


<html>
    <head>
        <title>Create Account</title>
        <meta charset="UTF-8">
        <link  type="text/css" rel="stylesheet" href="../all/EP_CSS.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class='wrapper'>
           
                <form  method='POST' >
                <h1> Create New Account </h1>
                    <p><input type='text'  name='fname'  placeholder="First Name"></p>
                    <p><input type='text'  name='lname'  placeholder="Last Name"></p>
                    <p><input type='text'  name='email'  placeholder="email"></p>
                    <p><input type='text'  name='email2'  placeholder="re-enter email"></p>
                    <p><input type='password'  name='password'  placeholder="password"></p> 
                     <p><input type='password'  name='password2'  placeholder="re-enter password"></p> 
                     <p><input type='text'  name='key'  placeholder="Key"></p> 
                    <p> <input type="submit" name = "submit" value="Create Account" ></p>
                    
                    
  
                </form>
                
            
        </div>
        
        <?php
        
         
         
        //FIRST NAME
        $fnameSuccess = false;
        $filterFName = filter_input(INPUT_POST,"fname");
        if(isset($filterFName)){
            $fname = $filterFName;
            $fnameSuccess =true;
        }
        else{
            echo "please enter a first name";
        }
       
        

        //LAST NAME
        $lnameSuccess = false;
        $filterLName = filter_input(INPUT_POST,"lname");
        if(isset($filterLName)){
            $lname = $filterLName;
            $lnameSuccess = true;
        }
        else{
            echo "enter a Last Name";
        }
        
      
           
       
       
        
        
        $emailSuccess =false;
        
      //EMAIL_____________
        $filterEmail = filter_input(INPUT_POST, "email");
        $filterEmail2 = filter_input(INPUT_POST, "email2");
        if (!empty($filterEmail) && !empty($filterEmail2)) {
            if (isset($filterEmail)&& isset($filterEmail2)) {
                
                if (isValidEmail($filterEmail)) {

                    $emailChecked = $filterEmail;
                    $email2 = $filterEmail2;
                    
                    if(ifFieldsMatch($emailChecked, $email2)){
                       if (ifEmailExists($emailChecked, $connection)) {
                            echo "Email not accepted email already exists <br>";
                           
                            
                        } 
                        else {
                        echo "Email does not exist <br>";
                        $emailSuccess = true;
                        } 
                    }
                    else{
                       
                        echo "emails dont match";
                    }
                    
                }
                else{
                   
                    echo "email not valid";
                }
            } 
            else {
                
                echo "email fields not set";
            }    
        }
        else{
        echo "email 1 or email two is empty";    
        }
        
        
        //password
        $passwordSuccess = false;
        $filterPassword = filter_input(INPUT_POST, "password");
        $filterPassword2 = filter_input(INPUT_POST, "password2");
        
        
        if(!empty($filterPassword) && !empty($filterPassword2) ){
            if(isset($filterPassword)&& isset($filterPassword2)){
            $pass1 = $filterPassword;
            $pass2 = $filterPassword2;
            
            if(ifFieldsMatch($pass1,$pass2)){
                $passwordSuccess = true;
                echo "passwords match <br>";
               $hpass = password_hash($filterPassword, PASSWORD_BCRYPT);  
            }
            else{
                echo "passwords dont match! <br>";
            }
        }         
        }
        else{
            echo " <br> password 1 or password 2 is empty <br>";
            
        }
        
        //KEY VERIFICATION
        $keySuccess = False;
        $filterKey = filter_input(INPUT_POST,"key");
        if(isset($filterKey)){
            $key = $filterKey;
            if(ifKeyMatches($key)){
                echo "key matches";
                $keySuccess = true;
            }
            else{
                
                echo "key does not match";
            }
        }
        
       // INSERTION INTO DATABASE
if ($fnameSuccess && $lnameSuccess && $emailSuccess 
       
        && $passwordSuccess && $keySuccess) { 
        $tempID= rand(100000,999999);
            $sqlInsert = "INSERT into user "
                    . "values ('$tempID','$fname','$lname','$hpass',"
                    . "'$emailChecked')";

            if (mysqli_query($connection, $sqlInsert)) {
                console.log( "Data inserted succssfully <br>");
            } else {
                echo "error: " . mysqli_error($connection);
            }
            header("Location: SignIn.php");
            mysqli_close($connection);
            exit;
        }
       
        mysqli_close($connection);
        ?>
        
        
    </body>
</html>
