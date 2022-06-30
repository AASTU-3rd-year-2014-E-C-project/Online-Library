<?php
include_once("../inc/session.php");
include_once("../inc/conn.php");

if (isset($_POST['updateProfile'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  if (isset(mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM user WHERE username = '$username'"))['password']))
    $password = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM user WHERE username = '$username'"))['password'];


  if (!empty($nPassword) && !empty($cPassword)) {
    $oPassword = $_POST['oPassword'];
    $nPassword = $_POST['nPassword'];
    $cPassword = $_POST['cPassword'];
    if (!password_verify($oPassword, $password)) {
      header("Location: profile.php?error=invalid-password");
    }
    $hashedPassword = password_hash($nPassword, PASSWORD_DEFAULT);
    $update_profile_query = "UPDATE user SET username='$username', email='$email', password='$hashedPassword', gender='$gender', phone='$phone', first_name='$fName', last_name='$lName' WHERE user_id = '$user_id'";
    mysqli_query($conn, $update_profile_query);
  }
  if (empty($nPassword) && empty($cPassword)) {
    $update_profile_query = "UPDATE user SET username='$username', email='$email', gender='$gender', phone='$phone', first_name='$fName', last_name='$lName' WHERE user_id = '{$_SESSION['user_id']}'";
    mysqli_query($conn, $update_profile_query);
  }
}

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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" target="_blank">User profile</a>
        <!--Image goes here(profile image)-->
        <!-- Form -->

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="book_list.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <?php
                $qu = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";

                $result = mysqli_query($conn, $qu);
                $row = mysqli_fetch_assoc($result)['username'];

                ?>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"> BOOK LIST </span>
                </div>
              </div>
            </a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="../inc/logout.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <?php
                $qu = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";

                $result = mysqli_query($conn, $qu);
                $row = mysqli_fetch_assoc($result)['username'];

                ?>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"> LOG OUT </span>
                </div>
              </div>
            </a>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img src="../image/profile_pic/pp.jpg" alt="Image place">
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
              <!-- <div class="d-flex justify-content-between">

                <a href="#subject" class="btn btn-sm btn-default float-right">FeedBack</a>
              </div> -->
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
              $lastname = "SELECT last_name FROM user WHERE user_id={$_SESSION['user_id']}";

              $result = mysqli_query($conn, $firstname);
              $result2 = mysqli_query($conn, $lastname);
              $row = mysqli_fetch_assoc($result)['first_name'];
              $row2 = mysqli_fetch_assoc($result2)['last_name'];
              $final_row = $row . " " . $row2;

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
                <!-- <form>
                  <label for="subject">GIVE YOUR FEEDBACK HERE</label>
                  <textarea id="subject" name="subject" placeholder="Help us by giving your feedback here..." style="height:200px" required></textarea>

                  <input type="submit" value="SUBMIT FEEDBACK">
                </form> -->
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
              <form method="POST">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <?php
                        $firstname = "SELECT first_name FROM user WHERE user_id={$_SESSION['user_id']}";
                        $lastname = "SELECT last_name FROM user WHERE user_id={$_SESSION['user_id']}";
                        $username = "SELECT username FROM user WHERE user_id={$_SESSION['user_id']}";
                        $phone = "SELECT phone FROM user WHERE user_id={$_SESSION['user_id']}";
                        $email = "SELECT email FROM user WHERE user_id={$_SESSION['user_id']}";
                        $gender = "SELECT gender FROM user WHERE user_id={$_SESSION['user_id']}";

                        $result1 = mysqli_query($conn, $firstname);
                        $result2 = mysqli_query($conn, $lastname);
                        $result3 = mysqli_query($conn, $username);
                        $result4 = mysqli_query($conn, $phone);
                        $result5 = mysqli_query($conn, $email);
                        $result6 = mysqli_query($conn, $gender);
                        $row1 = mysqli_fetch_assoc($result1)['first_name'];
                        $row2 = mysqli_fetch_assoc($result2)['last_name'];
                        $row3 = mysqli_fetch_assoc($result3)['username'];
                        $row4 = mysqli_fetch_assoc($result4)['phone'];
                        $row5 = mysqli_fetch_assoc($result5)['email'];
                        $row6 = mysqli_fetch_assoc($result6)['gender'];
                        ?>
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value=<?= $row3 ?> name="username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email Address" value=<?= $row5 ?> name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First Name" value=<?= $row1 ?> name="fName">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value=<?= $row2 ?> name="lName">
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
                        <label class="form-control-label" for="input-address">Phone</label>
                        <input type="tel" name="phone" id="input-address" class="form-control form-control-alternative" placeholder="phone: 0911-11-11-11" pattern="[0][9][0-9]{8}" value=<?= $row4 ?> maxlength="10" name="phone">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group focused">


                        <div class="container-dropdown-gender">
                          <span class="choose">Gender</span>
                        </div>
                        <div class="select-gender-edit">
                          <select name="gender" id="gender">
                            <option value="M" <?php if ($row6 == 'M') echo 'selected' ?>>Male</option>
                            <option value="F" <?php if ($row6 == 'F') echo 'selected' ?>>Female</option>
                          </select>
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
                        <input type="password" id="input-city" class="form-control form-control-alternative" name="oPassword">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">New Password</label>
                        <input type="password" id="input-country" class="form-control form-control-alternative" name="nPassword">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Confirm Password</label>
                        <input type="password" id="input-postal-code" class="form-control form-control-alternative" name="cPassword"><br>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-4 ">
                  <input type="submit" value="Upload" name="updateProfile">
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