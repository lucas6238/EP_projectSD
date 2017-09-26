<?php echo ("<?xml version=\"1.0\" encoding=\"utf-8\"?" . ">"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>BUG DATABASE</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <?php
    /*
      Lucas Chacon
      CIS 2800 Internet Programming
      3/31/17
      PHP and SQL Database
      8-3 - software bug database

     */
    ?>

    <body>

        <h><strong>BUG DATABASE</strong></h>

        <br />


        <br />

        <?php
        /*
         * first thing this datapage file does is connect to the database
         * 
         * then it checks to see if there is a post to create a new file
         * 
         * or update a entry in the database
         * 
         * if it creates it takes the info from the post method and saves the info 
         * to the database using mysql insert query
         * 
         * if the post is update then it uses the mysql update set query to update
         * the entry
         * 
         * after all this it uses another mysql query to select everything and display i
         * it 
         * 
         * located in each of the table rows there is a link to update or delete the entry
         * this calls either deleteEntry.php or updateReport1.php
         * 
         *  
         * 
         * 
         * 
         * 
        */
        $DBname = "DevBugg";
        $DBTable = "Bugg";
        $connection = mysqli_connect("localhost", "root");


        if ($connection === FALSE)
            echo "<p>Connection failed.</p>\n";


        if ($connection === FALSE)
            echo "<p>Connection error: " . mysqli_error() . "</p>\n";
        else {
            if (mysqli_select_db($connection, $DBname) === FALSE)
                echo "<p>Could not select the \"$DBname\" " .
                "database: " . mysqli_error($connection) . "</p>\n";
            else { 
                
                if(isset($_POST["create"])){
                    echo"is posting <br>";
                    //started creation future podcuts
                    
                $tempPN = $_POST["productname"];
                $tempVersion= $_POST["version"];
                $tempHardware = $_POST["hardware"];
                $tempOS = $_POST["os"];
                $tempFrequency = $_POST["frequency"];
                $tempSolutions = $_POST["solutions"];
                
            
                
                if (empty($tempPN)) {
                    echo "Complete first field<br>";
                } else {
                    
                    $sql = "insert into $DBTable (productname, version,hardware,
                        os,frequency,solution)
                            VALUES('$tempPN','$tempVersion','$tempHardware',
                            '$tempOS','$tempFrequency', '$tempSolutions')";
                    
                   if(mysqli_query($connection, $sql)){
                       echo "query success";
                   }
                   else {
                       echo "query errorr" . mysqli_error($connection);
                   }
                  
                    
                }  
                }
                else{
                    echo "Not new entry" . mysqli_connect_error($connection) . "<br>";
                }                
                
                
                if(isset($_POST["update"])){
                  $tempID = $_POST["id"];  
                 $tempPN = $_POST["productname"];
                $tempVersion= $_POST["version"];
                $tempHardware = $_POST["hardware"];
                $tempOS = $_POST["os"];
                $tempFrequency = $_POST["frequency"];
                $tempSolutions = $_POST["solutions"];
                    
                     $sqlUpdate = "UPDATE $DBTable SET 
                             productname = '$tempPN',
                             version = '$tempVersion',
                              os ='$tempOS',
                                  hardware='$tempHardware',
                              frequency ='$tempFrequency',
                              solution ='$tempSolutions'
                              where id = '$tempID'";
                   if (mysqli_query($connection, $sqlUpdate)) {
                       echo " entry '$tempID' updated ";
                   } else {
                       echo "error: " . mysqli_error($connection) . "<br>";
                   }
                }


                $SQLString = "Select * from $DBTable";
                $queryResult = mysqli_query($connection, $SQLString);
                
                
                if ($queryResult === FALSE) {
                    echo "<p>Unable to execute the query.</p>"
                    . "<p>Error code " . mysqli_errno($connection)
                    . ": " . mysqli_error($connection) . "</p>";
                } else {
                    echo "<form  method='GET'>";
                    echo "<table width='100%' border='1' >\n"
                    . "<tr><th> id</th>"
                    . "<th>Product Name</th>"
                    . "<th>Version</th>"
                    . "<th>Hardware</th>"
                             . "<th>Operating System</th>"
                             . "<th>Frequency</th>"
                             . "<th>Solutions</th>"
                             
                    
                    . "<th>Update</th>"
                            . "<th>Delete</th>"
                    . "</tr>\n";
                    
                    while ($row = mysqli_fetch_assoc($queryResult)) {
                        
                        echo "<tr><td>" . $row["id"] . "</td>\n";
                       
                        echo "<td>" . $row["ProductName"] . "</td>\n";
                        echo "<td>" . $row["Version"] . "</td>\n";
                        echo "<td>" . $row["Hardware"] . "</td>\n";
                        echo "<td>" . $row["OS"] . "</td>\n";
                        echo "<td>" . $row["Frequency"] . "</td>\n";
                        echo "<td>" . $row["Solution"] . "</td>\n";
                        

                       echo "<td> <a href=\"UpdateReport1.php?id=".$row["id"] . "\"> update </a></td>";
                       echo "<td> <a href=\"DeleteEntry.php?id=".$row["id"] . "\"> delete </a></td>";
                       echo "<td> </td>";
                        echo"<tr>";
                    }
                    echo "</table>\n";
                   
                    echo "</form>";

                    
                }
            }

        }




            //echo "<p>Selected the \"$DBname\" database</p>\n";        
            mysqli_close($connection);
        
        // mysqli_close($connection);
        ?>

        <a href="EnterReport1.php">Create new page</a>
        
    </body>
</html>













