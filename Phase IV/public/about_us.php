<?php session_start(); 
include_once('../inc/conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Library Managment About us page">
    <meta name="keywords" content="Books">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
    <link rel="shortcut icon" href="../image/index.png" type="image/png">
    <link rel="stylesheet" href="../css/about_us.css">
    <link rel="stylesheet" href="../css/page_structure_style.css">
    <link rel="stylesheet" href="../_fontawesome/css/all.min.css">
    <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php"> AASTU Digital Library</a>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="../index.php">HOME</a></li>
                <?php

                    if(isset($_SESSION['user_id'])){
                
                ?>

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
                        if ($_SESSION['user_type'] == 'admin'){
                            ?>
                        <a href="report.php">REPORT PAGE</a>
                        <?php
                        }
                        ?>
                   <a href="../inc/logout.php">LOG OUT</a>

                    </div>
                    </div>
                <?php }
                else{
                ?>
                <li> <a href="../index.php">SIGN UP</a></li>
                <?php } ?>
            </ul>
        </div>
        <i class="fas fa-bars" id="menu-dropdown-btn"></i>
    </div>


    <section class="main1">
        <div class="about-us-container">
            <div class="image-container">
                <img src="../image/student.png" alt="A Picture">
            </div>
            <div class="about">
                <h1>About us</h1>
                <p>
                    The online library has been completely automated and for this it has library management program customized to its needs. This website can keep records of collection in pdfs, can also be used for online reading, circulation activities and user profiles,
                    and many other features necessary for the users and the library management as well.
                </p>
            </div>
        </div>
    </section>
    <hr>
    <section class="about_us">
        <h1>Digital Web Online Library</h1>
        <p>We offer a library service for free so that you can read more with a comfort</p>

        <div class="row">

            <div class="content">
                <dt>
                <h3> Objective </h3>
                <br>
            </dt>
                <dd>To collect, organize and collate print and digital information and disseminate at the point of care and for future use.
                </dd>
                <dd>To provide seamless access to information</dd>
                <dd>To develop in to a single access point library</dd>
            </div>
            <div class="content">
                <a href="upload.php">
                    <h3>Share US</h3>
                    <br>
                </a>
                <a href="upload.php">
                    <p>Our system work almost for free and for every one so helping as is much encouraged and also do forget they say “ Sharing is caring &#128519“.</p>
                </a>
            </div>
            <div class="content">
                <a href="book_list.html">
                    <h3>Book Lists</h3>
                    <br>
                    <div id="list">

                        <p>&#128073 Philosopy</a></p>
                        <p>&#128073 Biology</a></p>
                        <p>&#128073 Physics</a></p>
                    </div>
                </a>
            </div>

        </div>
    </section>
    <script src="../javascript/dropdown.js">  </script>

</body>

</html>
