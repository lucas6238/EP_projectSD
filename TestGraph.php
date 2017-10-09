<!DOCTYPE html>
	<html>
	<head>
	  <title>FusionCharts Column 2D Sample</title>
	</head>
	<body>
	  <div id="chart-container">FusionCharts will render here</div>
	  <script src="js/jquery-2.1.4.js"></script>
	  <script src="js/fusioncharts.js"></script>
	  <script src="js/fusioncharts.charts.js"></script>
	  <script src="js/themes/fusioncharts.theme.zune.js"></script>
	  <script src="js/app.js"></script>
          
          
          
          
          <?php




$jsonArray = array();



include("all/connectDatabase.php");
$table= "questionData";
$SQLString = "select * from $table";
 $queryResult = mysqli_query($connection, $SQLString);
 
 $i = 0;
    while ($row = mysqli_fetch_assoc($queryResult)) {
        
        
         $i++;
         }
    echo "times ran " . $i;
    mysqli_free_result($queryResult);
   ?>
	</body>

