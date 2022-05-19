<?php
session_start();
include_once('conn.php');

$resource_id = $_GET['resource_id'];
$rated_no = 0;
if (isset($_POST['rate']))
    $rated_no = $_POST['rate'];
echo $rated_no;
$q_rating = "SELECT * FROM rating WHERE resource_id=$resource_id AND user_id={$_SESSION['user_id']}";
$rating_res = mysqli_query($conn, $q_rating);
if (mysqli_num_rows($rating_res) > 0) {   //rating found, update database with rating
    $exec_query = "UPDATE rating SET rating='$rated_no' WHERE resource_id=$resource_id AND user_id={$_SESSION['user_id']}";
} else {      //rating not found, insert into database
    $exec_query = "INSERT INTO rating(rating, user_id, resource_id) VALUES ('$rated_no','{$_SESSION['user_id']}','$resource_id')";
}

mysqli_query($conn, $exec_query);
header("Location: ../public/book1_desc.php?resource_id=$resource_id");
