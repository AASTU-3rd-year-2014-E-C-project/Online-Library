<?php

include_once("../inc/session.php");
include_once("../inc/conn.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Donate book</title>
    <meta charset="UTF-8">
    <meta name="description" content="Library Managment About us page">
    <meta name="keywords" content="Books">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/index.png" type="image/png">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/page_structure_style.css">
    <link rel="stylesheet" href="_fontawesome/css/all.min.css">
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
                <li> <a href="../public/book_list.php">BOOK LIST</a></li>
                <li><a href="about_us.php">ABOUT US</a></li>
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
            </ul>
        </div>
        <i class="fas fa-bars" id="menu-dropdown-btn"></i>
    </div>
    <script src="../javascript/dropdown.js"> </script>
    <section class="top">
        <div class="text-box">
            <h1>Donate Us</h1>
            <h3>Dear AASTU online library partners</h3>
            <p>Right now, we need your help. As a project of the Internet Archive—a nonprofit internet library dedicated
                to promoting
                Access to All posible Knowledge—our site is working to make digital books available to everyone,
                everywhere. And we're
                tring to move faster.
                <br>
                This site won't be possible if it is not with you. so we ask you here for your generosity to donate in
                what ever you
                have.
            </p>
            <a href="#donate_1" class="donate-button">I will Donate</a>
        </div>

    </section>

    <section class="content">

        <form action="../inc/upload.php" method="POST" enctype="multipart/form-data">
            <div class="form">


                <h2 id="donate_1">To Donate us Please enter the below information</h2>
                <br>

                <div id="browse">
                    &nbsp Enter the file to be Donated here:
                    <input type="file" id="myfile1" name="myfile" accept=".pdf" required><br><br>
                </div>
                <?php

                if ($_SESSION['user_type'] == 'admin') {
                ?>
                    <label class="container">Book
                        <input type="radio" checked="checked" name="radio" value="Book">
                        <span class="checkmark"></span>
                    </label>
                <?php } ?>
                <label class="container">Assignment
                    <input type="radio" name="radio" value="Assignment">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Research Paper
                    <input type="radio" name="radio" value="Research book">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Test and Quiz
                    <input type="radio" name="radio" value="Test and Quiz">
                    <span class="checkmark"></span>
                </label>
                <input type="text" name="Title" id="donateTitle" placeholder="Title" required><br><br>
                <input type="text" name="Author" id="donateAuthor" placeholder="Author" required><br><br>
                Genre:
                <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                <!-- <div class="custom-select" style="width:95%;"> -->
                <div class="multiple-select" style="width:95%;">
                    <select name="genre[]" multiple="multiple">
                        <?php

                        $genre_query = "SELECT * FROM tag";
                        $result = mysqli_query($conn, $genre_query);

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                            <option value="<?= $row['tag_id'] ?>">&#128073 <?= $row['tag_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br><br>
                <div id="browse2">
                    &nbsp Cover Image
                    <input type="file" id="cover" name="cover"><br><br>
                </div>

                <script>
                    var x, i, j, l, ll, selElmnt, a, b, c;
                    /*look for any elements with the class "custom-select":*/
                    x = document.getElementsByClassName("custom-select");
                    l = x.length;
                    for (i = 0; i < l; i++) {
                        selElmnt = x[i].getElementsByTagName("select")[0];
                        ll = selElmnt.length;
                        /*for each element, create a new DIV that will act as the selected item:*/
                        a = document.createElement("DIV");
                        a.setAttribute("class", "select-selected");
                        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                        x[i].appendChild(a);
                        /*for each element, create a new DIV that will contain the option list:*/
                        b = document.createElement("DIV");
                        b.setAttribute("class", "select-items select-hide");
                        for (j = 1; j < ll; j++) {
                            /*for each option in the original select element,
                            create a new DIV that will act as an option item:*/
                            c = document.createElement("DIV");
                            c.innerHTML = selElmnt.options[j].innerHTML;
                            c.addEventListener("click", function(e) {
                                /*when an item is clicked, update the original select box,
                                and the selected item:*/
                                var y, i, k, s, h, sl, yl;
                                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                                sl = s.length;
                                h = this.parentNode.previousSibling;
                                for (i = 0; i < sl; i++) {
                                    if (s.options[i].innerHTML == this.innerHTML) {
                                        s.selectedIndex = i;
                                        h.innerHTML = this.innerHTML;
                                        y = this.parentNode.getElementsByClassName("same-as-selected");
                                        yl = y.length;
                                        for (k = 0; k < yl; k++) {
                                            y[k].removeAttribute("class");
                                        }
                                        this.setAttribute("class", "same-as-selected");
                                        break;
                                    }
                                }
                                h.click();
                            });
                            b.appendChild(c);
                        }
                        x[i].appendChild(b);
                        a.addEventListener("click", function(e) {
                            /*when the select box is clicked, close any other select boxes,
                            and open/close the current select box:*/
                            e.stopPropagation();
                            closeAllSelect(this);
                            this.nextSibling.classList.toggle("select-hide");
                            this.classList.toggle("select-arrow-active");
                        });
                    }

                    function closeAllSelect(elmnt) {
                        /*a function that will close all select boxes in the document,
                        except the current select box:*/
                        var x, y, i, xl, yl, arrNo = [];
                        x = document.getElementsByClassName("select-items");
                        y = document.getElementsByClassName("select-selected");
                        xl = x.length;
                        yl = y.length;
                        for (i = 0; i < yl; i++) {
                            if (elmnt == y[i]) {
                                arrNo.push(i)
                            } else {
                                y[i].classList.remove("select-arrow-active");
                            }
                        }
                        for (i = 0; i < xl; i++) {
                            if (arrNo.indexOf(i)) {
                                x[i].classList.add("select-hide");
                            }
                        }
                    }
                    /*if the user clicks anywhere outside the select box,
                    then close all select boxes:*/
                    document.addEventListener("click", closeAllSelect);
                </script>
                <!-- ----------------------------------------------------------------------------------------------------------------------- -->

                <input type="description" name="description" id="donateDesc" placeholder="Description" required><br><br>
                <div id="overlay" onclick="off()">
                    <div id="text">We Thank you very much for your book Donation</div>
                </div>
                <button type="submit" name="submit" class="btn_donate" onclick="on()">Donate</button>
            </div>
        </form>

        <script>
            function on() {
                var email = document.getElementById('txtusername');
                var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var d = document.getElementById("myfile").value;
                var d2 = document.getElementById("myfile1").value;
                var t = document.getElementById("donateTitle").value;
                var a = document.getElementById("donateAuthor").value;
                var g = document.getElementById("donateGenre").value;
                var str = document.getElementById("name").value;
                var ptr = /^[A-z]+$/;
                var x = ptr.test(str);
                var regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;

                if (str.trim().length == 0)
                    alert("name can not be empty");

                else if (x == 0)
                    alert("name can only be alphabet");
                else if (!emailFilter.test(email.value)) {
                    alert('Please provide a valid email address');
                    email.focus;
                    return false;
                } else if (d.trim().length == 0 && d2.trim().length == 0) {
                    alert("Please Insert the book");
                } else if (d.trim().length != 0 && !regexp.test(d))
                    alert("Please enter valid url.");

                else if (t.trim().length == 0 || a.trim().length == 0 || g.trim().length == 0)
                    alert("Book Title, Author or Genre can't be Empty");
                else
                    document.getElementById("overlay").style.display = "block";

            }

            function off() {
                document.getElementById("overlay").style.display = "none";
            }
        </script>

        <div class="other">
            <font size="7">Other ways to Donate Us</font><br>
            <dl>
                <dt>
                    Bank:
                </dt>
                <dd>&nbsp;Ethiopian commercial bank: 100015646289<br><br>
                    &nbsp; Dashin Bank: 524562088251</dd><br>
                <dt>Call on our Phone: </dt><br>
                <dd>&nbsp;&nbsp;&nbsp;+251941606496<br><br>
                    &nbsp;&nbsp;&nbsp;+251939656144</dd>
            </dl>
        </div>
    </section>



</body>

</html>