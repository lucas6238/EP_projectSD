
<?php
/*
 * Lucas Chacon
 * CIS 4990 
 * Making Graphs Using fusioncharts
 * Average Points by Number Graph
 */
include("js/fusioncharts.php");
?>

<html>
    <head>
        <title>FusionCharts Column 2D Sample</title>

        <script src="js/fusioncharts.js"></script>
        <script src="js/themes/fusioncharts.theme.carbon.js"></script>



    </head>
    <body>


        <?php
        //connect to database


        $_SESSION["caption"] = 0;
        switch ($_SESSION["caption"]) {
            case 0 : $caption = "Average Points per question";
                break;
            case 1 : $caption = "Average Score per question";
                break;
        }

        //caption chartID label value table date session
        function MakeBarChart($chartType, $caption, $UchartID, $chartID, $label, $value, $SQLString,$adaptive) {
            //this graph displays average points for a specific quesiton on a specific date session

            $queryResult = mysqli_query($_SESSION["connection"], $SQLString);


            if ($queryResult) {
                // The `$arrData` array holds the chart attributes and data
                $arrData = array(
                    "chart" => array(
                        "caption" => $caption,
                        "showValues" => "0",
                        "theme" => "carbon",
                        "setAdaptiveYMin" => $adaptive
                    )
                );
                $arrData["data"] = array();
                while ($row = mysqli_fetch_assoc($queryResult)) {
                    array_push($arrData["data"], array(
                        "label" => $row[$label],
                        "value" => $row[$value],
                    ));
                }

                $jsonEncodedData = json_encode($arrData);
                $columnChart = new FusionCharts($chartType, $UchartID, 600, 300, $chartID, "json", $jsonEncodedData);

                $columnChart->render();


                mysqli_free_result($queryResult);
            }
        }

        function MakePieChart($caption, $UchartID, $chartID, $label, $value, $table, $date, $session) {
            //this graph displays average points for a specific quesiton on a specific date session
            $SQLString = "select Question,AveragePoints,AveragePercentage, Responses from ep_project.$table where Date ='$date' and Session ='$session'";

            $queryResult = mysqli_query($_SESSION["connection"], $SQLString);


            if ($queryResult) {
                // The `$arrData` array holds the chart attributes and data
                $arrData = array(
                    "chart" => array(
                        "caption" => $caption,
                        "subCaption" => "Last year",
                        "enableSmartLabels" => "0",
                        "showPercentValues" => "1",
                        "showLegend" => "1",
                        "decimals" => "1",
                        "theme" => "carbon"
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
                    array_push($arrData['data'], array(
                        'label' => $key,
                        'value' => $value
                            )
                    );
                }

                $jsonEncodedData = json_encode($arrData);
                $columnChart = new FusionCharts("pie2D", $UchartID, 600, 300, $chartID, "json", $jsonEncodedData);

                $columnChart->render();


                mysqli_free_result($queryResult);
            }
        }

        function MakeSpecialStudentChart($chartType, $caption, $UchartID, $chartID, $studentID) {
            //this graph displays average points for a specific quesiton on a specific date session
            //Query for total Given
            $SQLString = "SELECT studentscores.Total, date.QuestionAmount,date.ActDate, studentscores.SID, date.ActDate FROM `date`,`studentscores` 
            where date.ActDate=studentscores.ActDate and studentscores.SID='$studentID' order by date.ActDate";
            $queryResult = mysqli_query($_SESSION["connection"], $SQLString);
            $SQLString2 = "Select ActDate from date";
            $queryResult2 = mysqli_query($_SESSION["connection"], $SQLString2);



            if ($queryResult) {
                // The `$arrData` array holds the chart attributes and data
                $arrData = array(
                    "chart" => array(
                        "caption" => $caption,
                        "showValues" => "0",
                        "theme" => "carbon"
                    )
                );
                $safety = 0;
                $arrData["data"] = array();
                while ($row = mysqli_fetch_assoc($queryResult)) {

                    if ($row["Total"] != 0) {
                        array_push($arrData["data"], array(
                            "label" => $row["ActDate"],
                            "value" => round(($row["Total"] / ($row["QuestionAmount"] * 2)), 2) * 100
                        ));
                    }
                }
                // echo count($arrData["data"]);
                $count = 0;

                while ($row2 = mysqli_fetch_assoc($queryResult2)) {
                    $dateFlag = false;
                    for ($x = 0; $x < count($arrData["data"]); $x++) {
                        if (strcasecmp($row2["ActDate"], $arrData["data"][$x]["label"]) == 0) {
                            // echo " ".$row2["ActDate"] . " " . $arrData["data"][$x]["label"] ;
                            //echo "<br>";
                            $dateFlag = true;
                        }
                    }
                    if (!$dateFlag) {
                        // echo "  flag thrown ".$row2["ActDate"] ;
                        // echo "<br>";
                        //can i put the insert here
                        array_push($arrData["data"], array(
                            "label" => $row2["ActDate"],
                            "value" => (0),
                        ));
                    }
                }
                foreach ($arrData["data"] as $key => $row) {
                    $label[$key] = $row['label'];
                    $value[$key] = $row['value'];
                }

                // Sort the data with volume descending, edition ascending
                // Add $data as the last parameter, to sort by the common key
                array_multisort($label, SORT_ASC, $value, SORT_ASC, $arrData["data"]);








                $jsonEncodedData = json_encode($arrData);
                $columnChart = new FusionCharts($chartType, $UchartID, 600, 300, $chartID, "json", $jsonEncodedData);

                $columnChart->render();


                mysqli_free_result($queryResult);
            }
        }
        ?>     


    </body>
</html>
