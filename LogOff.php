
<?php
   setcookie("logon",false,time()+(6400 *30),"/");
   setcookie("fname","",time()+(6400 *30),"/");
   setcookie("lname","",time()+(6400 *30),"/");
   header("Location: SignIn.php");
?>

