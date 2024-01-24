<?php

include_once("../inc/session.php");
include_once("../inc/conn.php");

if (array_key_exists('read-online-btn', $_POST)) {
    header("Location: read-online.php?resource_id={$_GET['resource_id']}");
}

if (array_key_exists('download-btn', $_POST)) {
    mysqli_query($conn, "INSERT INTO download_record (date_downloaded, resource_id, user_id) VALUES (now(), '{$_GET['resource_id']}', '{$_SESSION['user_id']}')");
    $q = "SELECT resource_file FROM resource WHERE resource_id={$_GET['resource_id']}";
    $res = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($res)['resource_file'];
    header("Location: ../uploads/resource_files/$row");
}
if (isset($_SESSION['user_id'])) {

    $resource_id = $_GET['resource_id'];
    $_SESSION['comment_resource_id'] = $resource_id;
    $query = "SELECT * FROM resource WHERE resource_id=$resource_id";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

?>

        <!DOCTYPE html>
        <html>

        <head>
            <title><?= $row['resource_title'] . ' - ' . $row['resource_type'] ?></title>
            <meta charset="UTF-8">
            <meta name="description" content="Library Managment About us page">
            <meta name="keywords" content="Books">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="../image/index.png" type="image/png">
            <link rel="stylesheet" href="../css/page_structure_style.css">
            <link rel="stylesheet" href="../css/book_desc_style.css">
            <link rel="stylesheet" href="../_fontawesome/css/all.min.css">
            <style>
                .star-container {
                    width: 320px;
                    background-color: #fff;
                    padding: 10px 10px;
                    border-radius: 5px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: row;
                    display: inline-block;
                }

                .stars input {
                    display: none;
                }

                .stars label {
                    font-size: 30px;
                    color: #555;
                    padding: 10px;
                    float: right;
                    transition: all 0.3s ease;
                    cursor: pointer;
                }

                input:not(:checked)~label:hover,
                input:not(:checked)~label:hover~label {
                    color: #fd4;
                }

                input:checked~label {
                    color: #fd4;
                }
            </style>
            <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
            <script src="../javascript/book_list.js"></script>
        </head>

        <body onload="onLoadFunction()" class="body">
            <div class="darkify">
                <div class="header">
                    <div class="logo">
                        <a href="../index.php"> AASTU Digital Library</a>
                    </div>

                    <div class="menu">
                        <ul>
                            <li><a href="../index.php">HOME</a></li>

                            <li><a href="upload.php">SHARE</a></li>
                            <?php

                            $qu = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";

                            $result = mysqli_query($conn, $qu);
                            $username = mysqli_fetch_assoc($result)['username'];

                            ?>
                            <div class="dropdown">
                                <li class="dropbtn"><?= $username ?> <i class="fas fa-caret-down" style="margin-left: 10px; font-size: 20px;"></i></li>
                                <div class="dropdown-content">
                                    <?php
                                    if ($_SESSION['user_type'] == 'admin') {
                                    ?>
                                        <a href="report.php">REPORT PAGE</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="profile.php">PROFILE</a>
                                    <a href="../inc/logout.php">LOG OUT</a>

                                </div>
                            </div>
                        </ul>
                    </div>
                    <i class="fas fa-bars" id="menu-dropdown-btn"></i>
                </div>
                <div class="main">
                    <div class="book">
                        <div class="flex-book">
                            <div class="cover-container">
                                <img src="../uploads/resource_covers/<?= !empty($row['resource_cover']) ? $row['resource_cover'] : "no_cover.jpg" ?>" alt="
                    <?= strtolower(str_replace(' ', '_', $row['resource_title'])) ?>_cover">
                            </div>
                            <div class=" title ">
                                <h1 class="book_title "><?= $row['resource_title'] ?></h1>
                                <p class=" book_desc "><?= $row['resource_desc'] ?></p>
                            </div>
                        </div>


                        <h3 class="book_author">Author: <span style="font-weight: normal;"><?= $row['resource_author'] ?></span></h3>
                        <h4 class="book_genre"><span style="font-weight: bold;">Genre: </span>
                            <?php

                            $genre_query = "SELECT * FROM tag INNER JOIN resource_tag ON tag.tag_id = resource_tag.tag_id WHERE resource_id=${row['resource_id']}";

                            $genre_array = array();

                            $genre_result = mysqli_query($conn, $genre_query);

                            while ($row = mysqli_fetch_assoc($genre_result)) {
                                array_push($genre_array, $row['tag_name']);
                            }

                            if (mysqli_num_rows($genre_result) < 1) {
                                echo 'none provided';
                            } else {
                                for ($i = 0; $i < count($genre_array); $i++) {
                                    if ($i < count($genre_array) - 1) {
                                        echo $genre_array[$i];
                                        echo ', ';
                                    } else {
                                        echo $genre_array[$i];
                                    }
                                }
                            }

                            unset($genre_array);

                            ?>
                        </h4>

                        <style>
                            .rating-label {
                                font-weight: bold;
                            }

                            /* Rating bar width */
                            .rating-bar {
                                width: 300px;
                                padding: 8px;
                                border-radius: 5px;
                            }

                            /* The bar container */
                            .bar-container {
                                width: 100%;
                                background-color: #f1f1f1;
                                text-align: center;
                                color: white;
                                border-radius: 20px;
                                cursor: pointer;
                                margin-bottom: 5px;
                            }

                            /* Individual bars */
                            .bar-5 {
                                width: 70%;
                                height: 13px;
                                background-color: #FBC02D;
                                border-radius: 20px;

                            }

                            .bar-4 {
                                width: 30%;
                                height: 13px;
                                background-color: #FBC02D;
                                border-radius: 20px;

                            }

                            .bar-3 {
                                width: 20%;
                                height: 13px;
                                background-color: #FBC02D;
                                border-radius: 20px;

                            }

                            .bar-2 {
                                width: 10%;
                                height: 13px;
                                background-color: #FBC02D;
                                border-radius: 20px;

                            }

                            .bar-1 {
                                width: 0%;
                                height: 13px;
                                background-color: #FBC02D;
                                border-radius: 20px;

                            }
                        </style>
        </body>
        </form>

        </html>

<?php
    } else
        header("Location: ../index.php");
} else
    header("Location: ../index.php");

?>