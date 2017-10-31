<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $emailChecked = "";


        $oneEmail = filter_input(INPUT_POST, "email");
        $SignInEmailSuccess = false;
        if (isset($oneEmail)) {
            
            if (isValidEmail($oneEmail)) {

                $emailChecked = $oneEmail;
                if (ifEmailExists($emailChecked, $connection)) {
                    $SignInEmailSuccess = true;
                    echo "User email Exists  <br>";
                } else {
                    echo "Email does not exist <br>";
                    $allValid = false;


                    //make a red dot a writing next to the email field
                }
            } else {
                echo "email not valid 123";
            }
        }
        
        $filterPass = filter_input(INPUT_POST,"password");
        
        $SignInPasswordSuccess = false;
        if (isset($filterPass)) {
            $pass = $filterPass;
            
                if (ifPasswordMatches($emailChecked, $pass, $connection)) {
                    $SignInPasswordSuccess = true;
                }
                else{
                    
                $allValid =false;
                }
            } else {
                echo " <br> password is empty <br>";
                $allValid = false;
            
        }


        if ($SignInEmailSuccess && $SignInPasswordSuccess) {
                if (!session_id()){
              session_start();
                }
            $_SESSION['logon'] = true;
          
            $_POST["email"]="";
            $_POST["password"]="";
            header("Location: homePage.php");
            mysqli_close($connection);
            exit;
        }

        mysqli_close($connection);