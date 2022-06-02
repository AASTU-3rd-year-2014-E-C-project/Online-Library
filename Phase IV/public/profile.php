<?php
include_once("../inc/session.php");
include_once("../inc/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
 <link rel="stylesheet" href="../css/profilecss.css">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"  target="_blank">User profile</a> <!--Image goes here(profile image)-->
        <!-- Form -->
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img src="../image/profile_pic/pp.jpg" alt="Image place" >
                </span>
                <?php
                    $qu = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";

                    $result = mysqli_query($conn, $qu);
                    $row = mysqli_fetch_assoc($result)['username'];

                    ?>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= $row ?> </span>
                </div>
              </div>
            </a>
            
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url('../image/profile_pic/pp.jpg'); opacity: 70%; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <?php
                    $firstname = "SELECT first_name FROM user WHERE user_id={$_SESSION['user_id']}";

                    $result = mysqli_query($conn, $firstname);
                    $row = mysqli_fetch_assoc($result)['first_name'];

                    ?>
            <h1 class="display-2 text-white">Hello <?= $row ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can Edit your profile details in here.</p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../image/profile_pic/pp.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
                <a href="#subject" class="btn btn-sm btn-default float-right">FeedBack</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
<span class="heading"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS book_read FROM read_record WHERE user_id={$_SESSION['user_id']}"))['book_read']; ?></span>
                      <span class="description">Book Read</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS book_download FROM download_record WHERE user_id={$_SESSION['user_id']}"))['book_download']; ?></span>
                      <span class="description">Books Downloaded</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS book_shared FROM donate_record WHERE user_id={$_SESSION['user_id']}"))['book_shared']; ?></span>
                      <span class="description">Books Shared</span>
                    </div>
                  </div>
                </div>
              </div>
               <?php
                    $firstname = "SELECT first_name FROM user WHERE user_id={$_SESSION['user_id']}";
                    $lastname= "SELECT last_name FROM user WHERE user_id={$_SESSION['user_id']}";

                    $result = mysqli_query($conn, $firstname);
                    $result2= mysqli_query($conn, $lastname);
                    $row = mysqli_fetch_assoc($result)['first_name'];
                    $row2 = mysqli_fetch_assoc($result2)['last_name'];
                    $final_row= $row." " . $row2;

                    ?>
              <div class="text-center">
                <h3>
                  <?= $final_row ?>
                </h3>
                <div class="h5 font-weight-300">
                   <?php
                    $useremail = "SELECT email FROM user WHERE user_id={$_SESSION['user_id']}";
                    $result = mysqli_query($conn, $useremail);
                    $row = mysqli_fetch_assoc($result)['email'];
                    

                    ?>
                  <i class="ni location_pin mr-2"></i><?= $row ?>
                </div>
                
                <hr class="my-4">
                <form>
                <label for="subject">GIVE YOUR FEEDBACK HERE</label>
                <textarea id="subject" name="subject" placeholder="Help us by giving your feedback here..." style="height:200px"
                  required></textarea>
                
                <input type="submit" value="SUBMIT FEEDBACK">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                         <?php
                    $firstname = "SELECT first_name FROM user WHERE user_id={$_SESSION['user_id']}";
                    $lastname= "SELECT last_name FROM user WHERE user_id={$_SESSION['user_id']}";
                    $username= "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";
                    $phone= "SELECT phone FROM user WHERE user_id={$_SESSION['user_id']}";
                    $email= "SELECT email FROM user WHERE user_id={$_SESSION['user_id']}";

                    $result1 = mysqli_query($conn, $firstname);
                    $result2= mysqli_query($conn, $lastname);
                    $result3= mysqli_query($conn, $username);
                    $result4= mysqli_query($conn, $phone);
                    $result5= mysqli_query($conn, $email);
                    $row1 = mysqli_fetch_assoc($result1)['first_name'];
                    $row2 = mysqli_fetch_assoc($result2)['last_name'];
                    $row3 = mysqli_fetch_assoc($result3)['username'];
                    $row4 = mysqli_fetch_assoc($result4)['phone'];
                    $row5 = mysqli_fetch_assoc($result5)['email'];
                    ?>
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder = "Username" value=<?= $row3 ?> >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email Address" value=<?= $row5 ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First Name" value=<?= $row1 ?>>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value=<?= $row2 ?>>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">phone</label>
                        <input type="tel" name="phone" id="input-address" class="form-control form-control-alternative" placeholder="phone: 0911-11-11-11" pattern="[0][9][0-9]{8}" value=<?= $row4 ?> maxlength="10">
                      </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group focused">
                                                  

                            <div class="container-dropdown-gender">
                            <span class="choose">Choose Gender</span>

<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
<div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Select Gender:</option>
    <option value="1">Male</option>
    <option value="2">Female</option>
    
  </select>
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
<!-- /*End Dropdown Menu*/ -->
                            </div>


                      </div>
                      <!--Gender also goes here-->
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Description -->
                  <h6 class="heading-small text-muted mb-4">Change Password</h6>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Old Password</label>
                        <input type="password" id="input-city" class="form-control form-control-alternative" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">New Password</label>
                        <input type="password" id="input-country" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Confirm Password</label>
                        <input type="password" id="input-postal-code" class="form-control form-control-alternative"><br>
                        
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-4 ">
                  <a href="#input-username" class="btn btn-sm btn-primary">Update</a>
                </div>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>