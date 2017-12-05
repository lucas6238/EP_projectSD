<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function isValidEmail($email) {

    $emailIsValid = FALSE;

    // MAKE SURE AN EMPTY STRING WASN'T PASSED

    if (!empty($email)) {
        // GET EMAIL PARTS

        $domain = ltrim(stristr($email, '@'), '@');
        $user = stristr($email, '@', TRUE);

        // VALIDATE EMAIL ADDRESS

        if
        (
                !empty($user) &&
                !empty($domain) &&
                checkdnsrr($domain)
        ) {
            $emailIsValid = TRUE;
        }
    }

    // RETURN RESULT

    return $emailIsValid;
}

function ifEmailExists($email, $conn) {
    $sqlEmailExists = "Select email from User where email = '$email'";

    $result = mysqli_query($conn, $sqlEmailExists);
    $row = mysqli_num_rows($result);
    // echo $row;


    if ($row > 0) {
        //echo "Email already exists <br>";
        return true;
    } else {
        return false;
        //echo "email accepted taken <br>";
    }
}

function ifPasswordMatches($email, $pass, $conn) {
    //select hash from database
    $pBool = false;
    if (empty($conn)) {
        echo "no connection";
    } else {
        if (isset($email) && isset($pass)) {
            $sqlFindHash = "Select HashedPassword from User where email = '$email'";
            $result = mysqli_query($conn, $sqlFindHash);
            $row = mysqli_fetch_assoc($result);

            $foundhash = $row["HashedPassword"];
            //echo "input password " . $pass . "<br>";
           // echo "found hash " . $foundhash . "<br>";
            $verify = password_verify($pass, $foundhash);
            if ($verify) {
                $pBool = true;
                
            } else {
               echo "password not verifed";
            }

            mysqli_free_result($result);
        } else {
            
            echo "email is missing";
        }
        
    }
    return $pBool;
}

function ifKeyMatches($key) {
    if (strcasecmp($key, 'cis2017') == 0) {
        return true;
    } else {
        return false;
    }
}

function ifFieldsMatch($field1, $field2) {
    if (strcasecmp($field1, $field2) == 0) {
        return true;
    } else {
        return false;
    }
}

function testHashs($x) {
    $testrr = "4444";
    $hpass = password_hash("loop", PASSWORD_BCRYPT);
    echo $hpass . "<br>";
    $verify = password_verify('loop', '$2y$10$lMS7mHlwOyORycpDDjOKQOJw2JWCR8NcIwFO4upGJ62.cJhyJl99K');
  
    
    if($verify){
        echo"<p style=\"color:white;\">success</p>";
        return true;
    } else {
        echo"<p style=\"color:white;\">failure</p>";
        return false;
    }
}
function ViewFilterInput(){
    $filterPass = filter_input(INPUT_POST, "password");
    echo $filterPass;
}

function printFName($email, $conn) {
    $sqlFindHash = "Select FName from User where email = '$email'";
    $result = mysqli_query($conn, $sqlFindHash);
    $row = mysqli_fetch_assoc($result);
    $foundName = $row["FName"];
    if (!empty($foundName)) {
        return $foundName;
    } else {
        return "No Name Saved in Database for user";
    }
    mysqli_free_result($result);
}

function printLName($email, $conn) {
    $sqlFindHash = "Select LName from User where email = '$email'";
    $result = mysqli_query($conn, $sqlFindHash);
    $row = mysqli_fetch_assoc($result);
    $foundName = $row["LName"];
    if (!empty($foundName)) {
        return $foundName;
    } else {
        return "No Name Saved in Database for user";
    }
    mysqli_free_result($result);
}

function selectNewID($conn) {
    
}
