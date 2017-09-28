<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<style>
<?php include 'EP_CSS.css'; ?>
</style>
<head>
    <title>Clicker Data Display</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<?php
/*
  Lucas Chacon
  CIS 4990
  9/14/17
  Enterprise Project
  Page Header and Footer
  display data from a database in meaningful ways
 * Clicker data from iclickers
 */
?>

<body class="wrapper">

    <?php
//this line of php code refences another php file that will run at this point in the program
//since it switches to the php file the
    include("EP_Header.php");
    ?>
    <p>
        <a href="questionSummary.php">Question Summary</a>
    </p>

    <p>
        <table>
            <tr>
                <td>Question Id</td>
                <td><input type="text" name="inputText"/></td>
            </tr>
            <tr>
                <td>Session Id</td>
                <td><input type="text" name="inputText"/></td>
            </tr>
             
         </table>
         <input type="submit" name="Submit Question"/>   
                
                
                




                <?php
//here at the end, another file is refeneced that will execute at this point in the file 
//as if it had been written here.
                include("EP_Footer.php");
                ?> 





                </body>
                </html>
