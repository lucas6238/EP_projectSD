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
                    echo "User email Exists hello <br>";
                } else {
                    echo "Email does not exist <br>";
                    $allValid = false;


                    //make a red dot a writing next to the email field
                }
            } else {
                echo "email not valid";
            }
        }
        
        $filterPass = filter_input(INPUT_POST,"password");
        
        $SignInPasswordSuccess = false;
        if (isset($filterPass)) {
            $pass = $filterPass;
            
            
                echo $emailChecked . "<br>";
                
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
              
                }
                $tempFName = printFName($emailChecked,$connection);
                $tempLName = printLName($emailChecked,$connection);
                
            $_SESSION['logon'] = true;
           
            setcookie("fname",$tempFName,time()+(6400 *30),"/");
            setcookie('lname',$tempLName,time()+(6400 *30),"/");
            
          
            $_POST["email"]="";
            $_POST["password"]="";
            header("Location: ../homePage.php");
            mysqli_close($connection);
            exit;
        }
        else{
            session_destroy();
        }

        mysqli_close($connection);