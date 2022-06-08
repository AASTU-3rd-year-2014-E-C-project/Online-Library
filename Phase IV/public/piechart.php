<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM user WHERE user_type = 'user'"))['count'];
$male = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM user WHERE user_type = 'user' AND gender = 'M'"))['count'] / $total ) * 100;
$female = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM user WHERE user_type = 'user' AND gender = 'F'"))['count']  / $total ) * 100;
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
                echo "['Male'," . $male . "], ['Female', ". $female . "]";
                ?>
            ]);

            var options = {
                title: '   Gender Statistics in %',
            };

            var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>