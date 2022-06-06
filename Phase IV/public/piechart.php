<?php
$report_array = array(array('Resource', 'Read'));
$query1 = "SELECT DISTINCT resource_id from read_record";
$resource_result = mysqli_query($conn, $query1);
$Rname = array();
$Readed_Num = array();
while ($row = mysqli_fetch_assoc($resource_result)) {
    $current_resource_id = $row['resource_id'];
    $rname = mysqli_fetch_assoc(mysqli_query($conn, "SELECT DISTINCT resource_title FROM resource INNER JOIN read_record ON resource.resource_id = $current_resource_id;"));
    $read = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) FROM read_record WHERE resource_id = $current_resource_id AND MONTH(date_read) = MONTH(now())-1
    and YEAR(date_read) = YEAR(now())"));
    array_push($report_array, [$rname['resource_title'], $read['COUNT(*)']]);
    $chart_data="";
    
    // while ($row = mysqli_fetch_array($report_array)) { 
    array_push($Rname, $rname['resource_title']);
    array_push($Readed_Num, $read['COUNT(*)']);
            $data = json_encode($report_array);
    }
echo $data;
?>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        function drawChart() {

            var jsonData = $.ajax({
                url: "piechart.php",
                dataType: "json",
                async: false
            }).responseText;

            var data = new google.visualization.DataTable(jsonData);


            var chart = new google.visualization.PieChart(document.getElementById('download_info'));
            chart.draw(data, {
                width: 400,
                height: 240
            });
        }

        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

    </script>
</head>

<body>
    <div id="download_info"></div>
</body>

</html>