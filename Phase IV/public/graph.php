<?php

session_start();
include_once("../inc/conn.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
</head>

<body>
    <div style="width:30%;hieght:20%;text-align:center">
        <h2 class="page-header">Analytics Reports </h2>
        <div>Product </div>
        <canvas id="chartjs_bar"></canvas>
    </div>
    <?php
    if (!$conn) {
        echo "Problem in database connection! Contact administrator!" . mysqli_error();
    } else {
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        $chart_data = "";
        while ($row = mysqli_fetch_array($result)) {

            $productname[]  = $row['Product'];
            $sales[] = $row['TotalSales'];
        }
    }


    ?>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</body>

</html>