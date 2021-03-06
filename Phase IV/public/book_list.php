<?php session_start();
include_once('../inc/conn.php');

if (isset($_SESSION['user_id'])) {
?>
    <!DOCTYPE html>

    <head lang="en">
        <title>Books List</title>
        <meta charset="UTF-8">
        <meta name="description" content="Library Managment About us page">
        <meta name="keywords" content="Books">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../image/index.png" type="image/png">
        <link rel="stylesheet" href="../css/book_list.css">
        <link rel="stylesheet" href="../css/page_structure_style.css">
        <link rel="stylesheet" href="../_fontawesome/css/all.min.css">
    </head>

    <body>
        <div class="header">
            <div class="logo">
                <a href="../index.php"> AASTU Digital Library</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="about_us.php">ABOUT</a></li>
                    <li><a href="upload.php">SHARE</a></li>
                    <?php

                    $qu = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";

                    $result = mysqli_query($conn, $qu);
                    $row = mysqli_fetch_assoc($result)['username'];

                    ?>
                    <div class="dropdown">
                        <li class="dropbtn"><?= $row ?> <i class="fas fa-caret-down" style="margin-left: 10px; font-size: 20px;"></i></li>
                        <div class="dropdown-content">
                            <?php
                            if ($_SESSION['user_type'] == 'admin') {
                            ?>
                                <a href="report.php">REPORT PAGE</a>
                            <?php
                            } else {
                            ?>
                            <a href="profile.php">PROFILE</a>
                            <?php } ?>
                            <a href="../inc/logout.php">LOG OUT</a>

                        </div>
                    </div>

                </ul>
            </div>

            <i class="fas fa-bars" id="menu-dropdown-btn"></i>
        </div>

        <div class="main">
            <h1 class="page-title">Book List</h1>
            <div class="search-container">
                <input type="text" class="search-box" id="search-box" placeholder="Search...">
                <div id="list1" class="dropdown-check-list" tabindex="100" style="display: none;">
                    <span class="anchor">Select Fruits</span>
                    <ul id="items" class="items">
                        <li><input type="checkbox" />Apple </li>
                        <li><input type="checkbox" />Orange</li>
                        <li><input type="checkbox" />Grapes </li>
                        <li><input type="checkbox" />Berry </li>
                        <li><input type="checkbox" />Mango </li>
                        <li><input type="checkbox" />Banana </li>
                        <li><input type="checkbox" />Tomato</li>
                    </ul>
                </div>
                <input type="button" class="search-input-btn btn" value="Search">
                <input type="button" class="reset-search-btn btn" id="resetBtn" value="Reset">
            </div>


            <div class="paper-tab">
                <a class="type-tab books-tab-btn click">Book</a>
                <a class="type-tab research-tab-btn">Research</a>
                <a class="type-tab assignments-tab-btn">Assignment</a>
                <a class="type-tab tests-tab-btn">Test and Quiz</a>
            </div>

            <div class="book-container">



            </div>

        </div>
        </div>
        <script src="../javascript/jquery-3.6.0.min.js"></script>
        <script src="../javascript/book_list.js"></script>
        <script src="../javascript/dropdown.js"> </script>

    </body>

    </html>

<?php
} else
    header("Location: ../index.php");

?>