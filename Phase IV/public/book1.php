<?php

include_once("../inc/conn.php");
include_once("../inc/session.php");

$resource_id = $_GET['resource_id'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO read_record(date_read, resource_id, user_id) VALUES (now(),$resource_id,$user_id)";
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
} else
    header("Location: ../index.php");
