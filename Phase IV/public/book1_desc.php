<?php

include_once("../inc/session.php");
include_once("../inc/conn.php");

if (array_key_exists('read-online-btn', $_POST)) {
    header("Location: book1.php?resource_id=1");
}

if (array_key_exists('download-btn', $_POST)) {
    // button1();
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
                    background-color: #faebd7;
                    padding: 20px 30px;
                    border-radius: 5px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: row;
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
                        <a href="../index.php"> My Library</a>
                    </div>

                    <div class="menu">
                        <ul>
                            <li><a href="../index.php">HOME</a></li>
                            <li><a href="../public/book_list.php">BOOK LIST</a></li>
                            <li><a href="upload.php">DONATE BOOK</a></li>
                            <li><a href="../inc/logout.php">LOG OUT</a></li>
                        </ul>
                    </div>
                    <i class="fas fa-bars" id="menu-dropdown-btn"></i>
                </div>
                <div class="main">
                    <div class="book">
                        <div class="cover-container">
                            <img src="../uploads/resource_covers/<?= !empty($row['resource_cover']) ? $row['resource_cover'] : "no_cover.jpg" ?>" alt="
                    <?= strtolower(str_replace(' ', '_', $row['resource_title'])) ?>_cover">
                        </div>
                        <div class=" title ">
                            <h1 class="book_title "><?= $row['resource_title'] ?></h1>
                            <p class=" book_desc "><?= $row['resource_desc'] ?></p>
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



                        <div class="buttons">
                            <form method="POST">
                                <!-- <a href="book1.html" class="read-btn">Read Online</a> -->
                                <input type="submit" name="read-online-btn" class="read-btn" value="Read Online" style="text-decoration: none;
                color: #000;
                border: 1px solid rgb(0, 157, 219);
                background-color: rgb(0, 157, 219);
                font-size: 19px;
                border-radius: 7px;
                cursor: pointer;
                padding: 7px;
                font-weight: bold;
                margin-left: 8px;
                color: #fff;">
                                <!-- <a href="resources/Books/the_philosophy_of_history.pdf " class="download-btn" Download>Download</a> -->
                                <input type="submit" name="download-btn" class="download-btn" value="Download" style="text-decoration: none;
                color: #000;
                border: 1px solid rgb(0, 157, 219);
                background-color: rgb(0, 157, 219);
                font-size: 19px;
                border-radius: 7px;
                cursor: pointer;
                padding: 7px;
                font-weight: bold;
                margin-left: 8px;
                color: #fff;">
                            </form>
                        </div>
                    </div>
                    <div class="other comments-container">
                        <h2>Comments</h2>
                        <hr>
                        <div class="comments">

                            <?php

                            $comment_query = "SELECT * FROM comment_and_rating WHERE resource_id=$resource_id";
                            $comment_result = mysqli_query($conn, $comment_query);

                            while ($comm_info = mysqli_fetch_assoc($comment_result)) {

                            ?>


                                <div class="comment">
                                    <div class="profile-pic-container">
                                        <img src="../image/login_icon.jpg" alt="" class="profile-pic">
                                    </div>
                                    <div class="name-date">
                                        <?php
                                        $commenter_name_query = "SELECT first_name, last_name FROM user WHERE user_id={$comm_info['user_id']}";
                                        $commenter_name_result = mysqli_query($conn, $commenter_name_query);
                                        $commenter = mysqli_fetch_assoc($commenter_name_result);

                                        ?>
                                        <h3 class="comment-giver-name"><?= $commenter['first_name'] . ' ' . $commenter['last_name'] ?></h3>
                                        <h4 class="date-and-time"><?= $comm_info['comment_date'] ?></h4>
                                    </div>
                                    <p class="comment-text"><?= $comm_info['comment'] ?></p>
                                </div>

                            <?php } ?>


                        </div>
                        <button id="addCommentBtn" onclick="commentPopup()">Add Comment</button>
                    </div>
                    <div class="other related-container">
                        <h2>Related books</h2>
                        <hr>
                        <div class="book-container related-books">
                            jj
                        </div>
                    </div>
                </div>

                <form action="comment.inc.php" method="POST">
                    <div class="add-comment-form">
                        <h3 class="comment-add-title">Comment</h3>
                        <div class="star-container">
                            <div class="stars">
                                <input type="radio" name="rate" id="rate-5" value="5">
                                <label for="rate-5" class="fa fa-star"></label>
                                <input type="radio" name="rate" id="rate-4" value="4">
                                <label for="rate-4" class="fa fa-star"></label>
                                <input type="radio" name="rate" id="rate-3" value="3">
                                <label for="rate-3" class="fa fa-star"></label>
                                <input type="radio" name="rate" id="rate-2" value="2">
                                <label for="rate-2" class="fa fa-star"></label>
                                <input type="radio" name="rate" id="rate-1" value="1">
                                <label for="rate-1" class="fa fa-star"></label>
                            </div>
                        </div>
                        <textarea name="comment" id="" cols="40" rows="10" class="comment-field comment-text-area"></textarea>

                        <div class="comment-add-btn">
                            <button type="submit" id="addCommBtn" class="comment-btn add-comment-btn" name="commentSubmit">Comment</button>
                            <button id="cancelCommBtn" class="comment-btn cancel-btn">Cancel</button>
                        </div>
                    </div>
                    <script src="../javascript/book_desc.js"></script>
                    <script src="../javascript/dropdown.js"></script>
                    <script src="../javascript/book_list.js"></script>
            </div>
        </body>
        </form>

        </html>

<?php
    } else
        header("Location: ../index.php");
} else
    header("Location: ../index.php");

?>