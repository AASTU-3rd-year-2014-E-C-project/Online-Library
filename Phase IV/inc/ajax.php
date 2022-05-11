<?php
session_start();
include_once("../inc/conn.php");

$resource_type = $_REQUEST['resource_type'];
$query = "SELECT * FROM resource WHERE resource_type=\"{$resource_type}\"";
$result = mysqli_query($conn, $query);

$res = "";

while($row = mysqli_fetch_assoc($result)){
    $res .= "
    <div class=\"book-card {$row['resource_id']}\">
                        <div class=\"cover-container\">
                            <img src=\"../uploads/resource_covers/";
                            $res .= !empty($row['resource_cover']) ? $row['resource_cover'] : "no_cover.jpg";
                            $res .=  "\" alt=\"
                    <?= strtolower(str_replace(' ', '_', {$row['resource_title']})) ?>_cover\">
                        </div>
                        <div class=\"title\">
                            {$row['resource_title']}
                        </div>
                        <div class=\"author\">
                            {$row['resource_author']}
                        </div>
                        <div class=\"genre\">";

                            $genre_query = "SELECT * FROM tag INNER JOIN resource_tag ON tag.tag_id = resource_tag.tag_id WHERE resource_id=${row['resource_id']}";

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
                            <em>3/10</em>
                        </div>
                    </div>
    ";
}

echo $res;

?>