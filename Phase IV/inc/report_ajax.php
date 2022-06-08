<?php
session_start();
include_once('../inc/conn.php');

$type = $_POST['type'];
$current_month = date('m');


if ($type == 'current-year-read') {
    $ret = array();
    for ($i = 0; $i < $current_month; $i++) {
        $query = "SELECT COUNT(*) AS count FROM read_record WHERE MONTH(date_read) = MONTH(\"0000-" . ($i + 1) . "-00 00:00:00\")";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
} else if ($type == 'current-year-downloaded') {
    $ret = array();
    for ($i = 0; $i < $current_month; $i++) {
        $query = "SELECT COUNT(*) AS count FROM download_record WHERE MONTH(date_downloaded) = MONTH(\"0000-" . ($i + 1) . "-00 00:00:00\")";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
} else if ($type == 'current-year-shared') {
    $ret = array();
    for ($i = 0; $i < $current_month; $i++) {
        $query = "SELECT COUNT(*) AS count FROM donate_record WHERE MONTH(donate_date) = MONTH(\"0000-" . ($i + 1) . "-00 00:00:00\")";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
} else if ($type == 'weekly-read-count') {
    $recieved_date = $_POST['arr'];
    $ret = array();
    for ($i = 0; $i < 7; $i++) {
        $query = "SELECT COUNT(*) AS count FROM read_record WHERE YEAR(date_read) = {$recieved_date[$i][0]} AND MONTH(date_read) = {$recieved_date[$i][1]} AND DAY(date_read) = {$recieved_date[$i][2]}";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
} else if ($type == 'weekly-download-count') {
    $recieved_date = $_POST['arr'];
    $ret = array();
    for ($i = 0; $i < 7; $i++) {
        $query = "SELECT COUNT(*) AS count FROM download_record WHERE YEAR(date_downloaded) = {$recieved_date[$i][0]} AND MONTH(date_downloaded) = {$recieved_date[$i][1]} AND DAY(date_downloaded) = {$recieved_date[$i][2]}";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
} else if ($type == 'weekly-share-count') {
    $recieved_date = $_POST['arr'];
    $ret = array();
    for ($i = 0; $i < 7; $i++) {
        $query = "SELECT COUNT(*) AS count FROM donate_record WHERE YEAR(donate_date) = {$recieved_date[$i][0]} AND MONTH(donate_date) = {$recieved_date[$i][1]} AND DAY(donate_date) = {$recieved_date[$i][2]}";
        array_push($ret, mysqli_fetch_assoc(mysqli_query($conn, $query))['count']);
    }

    echo json_encode($ret);
}

// echo json_encode(array("try" => $type));
