<?php

include_once("../inc/conn.php");
include_once("../inc/session.php");

$resource_id = $_GET['resource_id'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO read_record(date_read, resource_id, user_id) VALUES (now(),$resource_id,$user_id)";
mysqli_query($conn, $query);

if (isset($_SESSION['user_id'])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title id="htmlTitle">The Philosophy of History - Read Online</title>
        <link rel="shortcut icon" href="../image/index.png" type="image/png">
        <link rel="stylesheet" href="../css/page_structure_style.css">
        <link rel="stylesheet" href="../css/read_online_style.css">
        <link rel="stylesheet" href="_fontawesome/css/all.min.css">
        <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
    </head>

    <body onload="readOnLoad()">
        <?php

        $filename = "/path/to/the/file.pdf";

        // Header content type
        header("Content-type: application/pdf");

        header("Content-Length: " . filesize($filename));

        // Send the file to the browser.
        readfile($filename);

        ?>
    </body>

    </html>

<?php

} else
    header("Location: ../index.php");

?>