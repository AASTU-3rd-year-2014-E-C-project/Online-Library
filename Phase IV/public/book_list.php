<?php

session_start();

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
        <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
    </head>

    <body onload="displayBooks(-1)">
        <div class="header">
            <div class="logo">
                <a href="../index.html"> My Library</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="about_us.html">ABOUT</a></li>
                    <li><a href="upload.html">DONATE BOOK</a></li>
                    <li><a href="../inc/logout.php">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" id="menu-dropdown-btn"></i>
        </div>


        <div class="main">
            <h1 class="page-title">Book List</h1>
            <div class="search-container">
                <input type="text" class="search-box" id="search-box" placeholder="Search...">
                <input type="button" class="search-input-btn btn" value="Search" onclick="searchText()">
                <input type="button" class="reset-search-btn btn" id="resetBtn" value="Reset" onclick="resetText()">
            </div>

            <div class="paper-tab">
                <a href="#">Books</a>
                <a href="#">Research</a>
                <a href="#">Assignments</a>
                <a href="#">Test & Quizzes</a>
            </div>

            <div class="book-container">

            </div>

            <script src="javascript/book_list.js"></script>
        </div>
        <script src="javascript/dropdown.js"> </script>

    </body>

    </html>

<?php

} else
    header("Location: ../index.php");

?>