<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul>
     <li><a href='homepage.php'>Home</a></li>
     <li><a href='studentSelection.php'>Student</a></li>
     <li><a href='QuestionSelection.php'>Question</a></li>
     <li style="float:right;"><a href="LogOff.php">Log off </a></li>
     <li style="float:right;" class="name">Logged on as <?php echo $_COOKIE['fname'] . " " . $_COOKIE['lname']; ?></li>
         
 </ul>
