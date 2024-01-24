<?php
session_start();
include_once("../inc/conn.php");

$resource_type = $_REQUEST['resource_type'];
$query = "SELECT * FROM resource WHERE resource_type=\"{$resource_type}\"";
if (isset($_REQUEST['search'])) {
    $query .= " AND (resource_title LIKE \"%{$_REQUEST['search']}%\")";
}

$result = mysqli_query($conn, $query);

$res = "";

while ($row = mysqli_fetch_assoc($result)) {
    $resource_id = $row['resource_id'];

    $res .= "
    <div class=\"book-card {$row['resource_id']}\">
                        <div class=\"cover-container\">
                            <img src=\"../uploads/resource_covers/";
    $res .= !empty($row['resource_cover']) ? $row['resource_cover'] : "no_cover.jpg";
    $res .=  "\" alt=\"";
    $res .= strtolower(str_replace(' ', '_', $row['resource_title'])) . "_cover\">
                        </div>
                        <div class=\"title\">
                            {$row['resource_title']}
                        </div>
                        <div class=\"author\">
                            {$row['resource_author']}
                        </div>
                        <div class=\"genre\">";

    $genre_query = "SELECT * FROM tag INNER JOIN resource_tag ON tag.tag_id = resource_tag.tag_id WHERE resource_id=$resource_id";

    $genre_array = array();

    $genre_result = mysqli_query($conn, $genre_query);

    while ($row = mysqli_fetch_assoc($genre_result)) {
        array_push($genre_array, $row['tag_name']);
    }

    for ($i = 0; $i < count($genre_array); $i++) {
        if ($i < count($genre_array) - 1) {
            $res .= $genre_array[$i];
            $res .= ', ';
        } else {
            $res .= $genre_array[$i];
        }
    }

    unset($genre_array);


    $res .= "</div>";
    $res .= "<div class=\"rating\">
                            <i class=\"fas fa-star\" style=\"color: goldenrod;\"></i>
                            <em>";

    $rating_avg_query = "SELECT AVG(rating) as avg FROM rating WHERE resource_id=$resource_id";
    $rating_avg_result = mysqli_query($conn, $rating_avg_query);
    $avg = number_format(mysqli_fetch_assoc($rating_avg_result)['avg'], 1);
    // $resource_rating_avg = mysqli_fetch_assoc($rating_avg_result);

    $res .= $avg . "/5</em> <span class=\"rated-people-num\">(";

    $rated_people_num_query = "SELECT COUNT(*) as num FROM rating WHERE resource_id=$resource_id";
    $rated_people_num_res = mysqli_query($conn, $rated_people_num_query);
    $rated_people_num = mysqli_fetch_assoc($rated_people_num_res)['num'];

    $res .= $rated_people_num . ")</span>
                        </div>
                    </div>
    ";
}

echo $res;
