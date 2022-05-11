<?php


include_once('../inc/conn.php');
session_start();

if(isset($_POST['save'])){
    $user_id = $_POST['user_id'];
    $ratedIndex = $_POST['rate'];
    $ratedIndex++;

    if($user_id===0){
    $conn->query("INSERT INTO comment_and_rating (rating) values ('$ratedIndex')");
}else
$conn->query("UPDATE comment_and_rating SET rating=$ratedIndex WHERE user_id=$uid");
}

$sql= $conn->query("SELECT user_id FROM comment_and_rating");
// $numR = $sql->num_row;
$numR=1;

$sql = $conn->query("SELECT SUM(rating) AS total FROM comment_and_rating");
$Data = $sql->fetch_array();
$total = $Data['total'];
$avg = $total / $numR;

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

    <body>
        <div class="header">
            <div class="logo">
                <a href="../index.php"> My Library</a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="about_us.php">ABOUT</a></li>
                    <li><a href="upload.php">DONATE BOOK</a></li>
                    <li><a href="../inc/logout.php">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" id="menu-dropdown-btn"></i>
        </div>


        <div class="main">
            <h1 class="page-title">Book List</h1>
            <div class="search-container">
                <input type="text" class="search-box" id="search-box" placeholder="Search...">
                <div id="list1" class="dropdown-check-list" tabindex="100">
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
                <input type="button" class="search-input-btn btn" value="Search" onclick="searchText()">
                <input type="button" class="reset-search-btn btn" id="resetBtn" value="Reset" onclick="resetText()">
            </div>

            <div class="paper-tab">
                <a class="books-tab-btn">Books</a>
                <a class="research-tab-btn">Research</a>
                <a class="assignments-tab-btn">Assignments</a>
                <a class="tests-tab-btn">Test & Quizzes</a>
            </div>

            <div class="book-container">

                <?php

                $query = "SELECT * FROM resource";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="book-card <?php echo $row['resource_id']; ?>">
                        <div class="cover-container">
                            <img src="../uploads/resource_covers/<?= !empty($row['resource_cover']) ? $row['resource_cover'] : "no_cover.jpg" ?>" alt="
                    <?= strtolower(str_replace(' ', '_', $row['resource_title'])) ?>_cover">
                        </div>
                        <div class="title">
                            <?php echo $row['resource_title']; ?>
                        </div>
                        <div class="author">
                            <?php echo $row['resource_author']; ?>
                        </div>
                        <div class="genre">
                            <?php

                            $genre_query = "SELECT * FROM tag INNER JOIN resource_tag ON tag.tag_id = resource_tag.tag_id WHERE resource_id=${row['resource_id']}";

                            $genre_array = array();

                            $genre_result = mysqli_query($conn, $genre_query);

                            while ($row = mysqli_fetch_assoc($genre_result)) {
                                array_push($genre_array, $row['tag_name']);
                            }

                            for ($i = 0; $i < count($genre_array); $i++) {
                                if ($i < count($genre_array) - 1) {
                                    echo $genre_array[$i];
                                    echo ', ';
                                } else {
                                    echo $genre_array[$i];
                                }
                            }

                            unset($genre_array);
                        
                        ?>
                </div>
                
                <div class="rating">
                    <i class="fas fa-star fa-2x" data-index="0"></i>
                    <br>
                    <?php echo round($avg, 2) ?>
                    <em>3/10</em>
                </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script>
      var ratedIndex = -1;

      if(localStorage.getItem['ratedIndex'] != null)
      setStars(parseInt(localStorage.getItem(ratedIndex)));
      $(document).ready(function () {
        resetStarColors();
        $('.fa-star').on('click'.function(){
            ratedIndex= parseInt($(this).data('index'));
            localStorage.setItem['ratedIndex'.ratedIndex];
            saveToDb();
        });

          $('.fa-star').mouseover(function() {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStars(currentIndex);
            
          });
          
          $('.fa-star').mouseleave(function() {
            resetStarColors();
            if(ratedIndez!=-1)
           setStars(ratedIndex);
});
      });

      function saveToDb(){
          $.ajax({
              url:"book_list.php",
              method:"POST",
              dataType: 'json',
              data:{
                  save: 1,
                  user_id: uid,
                  rating: ratedIndex
              }, success: function(r){
                  user_id=r.uid;
              }
          });
      } 

      function setStars(max){
        for(var i=0; i<= max; i++)
            $('.fa-star:eq('+i+')').css('color','goldenrod');
      }

      function resetStarColors(){
          $('.fa-star').css('color', 'white');
      }
  </script>

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