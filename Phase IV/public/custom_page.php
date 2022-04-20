<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/page_structure_style.css">
    <title>Document</title>
</head>

<body>
    <h2>Last month's read count for book:
        <?php

        include_once("../inc/conn.php");
        $query = "SELECT COUNT(*) FROM read_record WHERE (date_read BETWEEN '2022-04-01 00:00:00' AND '2022-04-30 23:59:59') AND resource_id=1";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['COUNT(*)'];
        }

        ?>
    </h2>
</body>

</html>