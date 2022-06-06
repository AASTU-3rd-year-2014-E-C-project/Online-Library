<?php
if (!$conn) {
    echo "Problem in database connection! Contact administrator!";
} else {
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
        $chart_data = "";
        array_push($Rname, $rname['resource_title']);
        array_push($Readed_Num, $read['COUNT(*)']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
</head>

<body>
    <div style="width:100%;height:50%;text-align:center">
        <h2 class="page-header">Reading Reports </h2>
        <div>Resources</div>
        <canvas id="chartjs_bar"></canvas>
    </div>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($Rname); ?>,
                datasets: [{
                    backgroundColor: [
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e",
                        "#000000",
                        "#000080",
                        "#800080",
                        "#808000",
                        "#800000",
                        "#00FFFF",
                        "#FFFF00",
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e",
                        "#000000",
                        "#000080",
                        "#800080",
                        "#808000",
                        "#800000",
                        "#00FFFF",
                        "#FFFF00"
                    ],
                    data: <?php echo json_encode($Readed_Num); ?>,
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },


            }
        });
    </script>
</body>

</html>