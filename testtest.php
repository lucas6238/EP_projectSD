<!DOCTYPE html>
<?php
    /*
        Include the `fusioncharts.php` file that contains functions to embed the charts.
    */
    include("js/fusioncharts.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FusionCharts XT - Pie 2D Chart</title>
        <!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->
        <script src="js/fusioncharts.js"></script>
    </head>
    <body>
        <?php
            /* `$arrData` is the associative array that is initialized to store the chart attributes. */
            $arrData = array(
                "chart" => array(
                    "caption"=> "Split of visitors by age group",
                    "subCaption"=> "Last year",
                    "enableSmartLabels"=> "0",
                    "showPercentValues"=> "1",
                    "showLegend"=> "1",
                    "decimals"=> "1",
                    "theme"=> "zune"
                )
            );
            /*
                The data to be plotted on the chart is stored in the `$actualData` array in the key-value form.
            */
            $actualData = array(
                "Teenage" => 1250400,
                "Adult" => 1463300,
                "Mid-age" => 1050700,
                "Senior" => 491000
            );
            /*
                Convert the data in the `$actualData` array into a format that can be consumed by FusionCharts. The data for the chart should be in an array wherein each element of the array is a JSON object having the "label" and “value” as keys.
            */
            $arrData['data'] = array();
            // Iterate through the data in `$actualData` and insert in to the `$arrData` array.
            foreach ($actualData as $key => $value) {
                array_push($arrData['data'],
                    array(
                        'label' => $key,
                        'value' => $value
                    )
                );
            }

            /*
                JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
            */
            $jsonEncodedData = json_encode($arrData);
            /*
                Create an object for the pie chart  using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.
            */
            $pieChart = new FusionCharts("pie2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);
            // Render the chart
            $pieChart->render();
        ?>
        <div id="chart-1">Fusion Charts will render here</div>
    </body>
</html>