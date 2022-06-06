<?php
include("../inc/conn.php");
include("../inc/session.php");

$arr = array(
    "r5" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE rating=5 AND resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)'],
    "r4" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE rating=4 AND resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)'],
    "r3" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE rating=3 AND resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)'],
    "r2" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE rating=2 AND resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)'],
    "r1" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE rating=1 AND resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)'],
    "total" => mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM rating WHERE resource_id='{$_SESSION['comment_resource_id']}'"))['COUNT(*)']

);


echo json_encode($arr);
// echo "gfjgg";
?>
 