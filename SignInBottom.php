<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

setcookie("logon",false,time()+(6400 *30),"/");
 $emailChecked = "";
 
        $oneEmail = filter_input(INPUT_POST, "email");
        $SignInEmailSuccess = false;
        if(empty($oneEmail)){
            echo "email is empty<br>";
        }
        else{
        if (isset($oneEmail)) {
            
            if (isValidEmail($oneEmail)) {

                $emailChecked = $oneEmail;
                if (ifEmailExists($emailChecked, $connection)) {
                    $tempEmail = $oneEmail;
                    $SignInEmailSuccess = true;
                    echo "User email $tempEmail exists  <br>";
                    $tempEmail = "";
                } else {
                    echo "Email does not exist <br>";
                    $allValid = false;


                    //make a red dot a writing next to the email field
                }
            } else {
                echo "email not valid<br>";
            }
        }
        }
        $SignInPasswordSuccess = false;
        if(empty(filter_input(INPUT_POST,"password"))){
            echo "password empty <br>";
        }
        else{
            $filterPass = filter_input(INPUT_POST,"password");
        
        
        
        
        if (isset($filterPass)) {
            $pass = $filterPass;
            
            
                //echo $emailChecked . "<br>";
                
                if (ifPasswordMatches($emailChecked, $pass, $connection)) {
                    $SignInPasswordSuccess = true;
                }
                else{
                    
                $allValid =false;
                }
            } else {
                echo "password is empty <br>";
                $allValid = false;
            
        }
        }
        $logonSuccess=false;

        if ($SignInEmailSuccess && $SignInPasswordSuccess) {
                if (!session_id()){
              
                }
                $tempFName = printFName($emailChecked,$connection);
                $tempLName = printLName($emailChecked,$connection);
                
            
            setcookie("logon",true,time()+(6400 *30),"/");
            setcookie("fname",$tempFName,time()+(6400 *30),"/");
            setcookie('lname',$tempLName,time()+(6400 *30),"/");
            
          
            $_POST["email"]="";
            $_POST["password"]="";
            header("Location: homePage.php");
            mysqli_close($connection);
            exit;
        }
        else{
            session_destroy();
        }

        mysqli_close($connection);