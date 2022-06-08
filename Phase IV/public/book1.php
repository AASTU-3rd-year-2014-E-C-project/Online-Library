<?php

include_once("../inc/conn.php");
include_once("../inc/session.php");

$resource_id = $_GET['resource_id'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO read_record(date_read, resource_id, user_id) VALUES (now(),'$resource_id','$user_id')";
mysqli_query($conn, $query);

if (isset($_SESSION['user_id'])) {
    $resource_q = "SELECT resource_title, resource_file FROM resource WHERE resource_id=$resource_id";
    $result = mysqli_query($conn, $resource_q);
    $row = mysqli_fetch_assoc($result);

    // The location of the PDF file
    // on the server
    $filename = "../uploads/resource_files/{$row['resource_file']}";

    // Header content type
    header("Content-type: application/pdf");

    header("Content-Length: " . filesize($filename));

    // Send the file to the browser.
    readfile($filename);

//     header("Content-Length: " . filesize ("../uploads/resource_files/' . {$row['resource_file']}" ) ); 
// header("Content-type: application/pdf"); 
// header("Content-disposition: inline;     
// filename=".basename("../uploads/resource_files/' . {$row['resource_file']}"));
// header('Expires: 0');
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
// $filepath = readfile("../uploads/resource_files/' . {$row['resource_file']}");
?>
    <!-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Read Online</title>
    </head>
    <body>
        <iframe src="../uploads/resource_files/" frameborder="0"></iframe>
    </body>
    </html> -->
<?php
} else
    header("Location: ../index.php"); ?>