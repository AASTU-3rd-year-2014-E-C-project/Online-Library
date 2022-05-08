<?php

    include_once("../inc/conn.php");
    include_once("../inc/session.php");

    $resource_id = $_GET['resource_id'];
    $user_id = 1;

    $query = "INSERT INTO read_record(date_read, resource_id, user_id) VALUES (now(),$resource_id,$user_id)";
    mysqli_query($conn, $query);

    if(isset($_SESSION['user_id'])){

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title id="htmlTitle">The Philosophy of History - Read Online</title>
    <link rel="shortcut icon" href="../image/index.png" type="image/png">
    <link rel="stylesheet" href="../css/page_structure_style.css">
    <link rel="stylesheet" href="../css/read_online_style.css">
    <link rel="stylesheet" href="_fontawesome/css/all.min.css">
    <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
</head>

<body onload="readOnLoad()">
    <div class="header">
        <div class="logo">
            <a href="../index.php"> My Library</a>
        </div>

        <div class="menu">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="about_us.php">ABOUT</a></li>
                <li><a href="upload.php">DONATE BOOK</a></li>
            </ul>
        </div>
        <i class="fas fa-bars" id="menu-dropdown-btn"></i>
    </div>
    <div class="main">
        <div class="read_online">
            <h1 class="book_title_read">The Philosophy of History - Read Online</h1>
            <iframe src="resources/Books/the_philosophy_of_history.pdf" style="pointer-events: none;"></iframe>
        </div>
    </div>
    <script src="../javascript/dropdown.js">  </script>
    <script src="../javascript/book_list.js"></script>
</body>

</html>

<?php 

}

else
    header("Location: ../index.php");

?>