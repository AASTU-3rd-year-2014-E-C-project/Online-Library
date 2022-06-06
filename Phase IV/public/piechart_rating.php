<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$chartQuery = "SELECT * FROM rating";
$chartQueryRecords = mysqli_query($conn, $chartQuery);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://www.google.com/jsapi"></script>
    <style>
        .pie-chart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Pie Chart</h2>
    <div id="chartDiv" class="pie-chart"></div>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            google.load("visualization", "1.1", {
                packages: ["corechart"],
                callback: 'drawChart'
            });
        };

        function drawChart() {
            var data = new google.visualization.arrayToDataTable([
                ['Books', 'Rating'],
                <?php
                while ($row = mysqli_fetch_assoc($chartQueryRecords)) {
                    $current_resource_id = $row['resource_id'];
                    $resourceName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT resource_title FROM resource WHERE resource_id = $current_resource_id"));
                    echo "['" . $resourceName['resource_title'] . "', " . $row['rating'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Popularity of books',
            };

            var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>