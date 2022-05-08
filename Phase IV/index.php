<?php

  include_once("inc/session.php");

  if(!isset($_SESSION['user_id'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Library Managment About us page">
    <meta name="keywords" content="Books">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/index.png" type="image/png">
    <link rel="stylesheet" href="css/{}index.css">
    <link rel="stylesheet" href="css/page_structure_style.css">
    <link rel="stylesheet" href="_fontawesome/css/all.min.css">
    <script src="https://kit.fontawesome.com/72f71d06d5.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--------- Navigation bar --------->
    <section class="section">
    <div class="header">
        <div class="logo">
            <a href="index.php"> My Library</a>
        </div>

        <div class="menu" id="menu-bar">
            <ul>
                <li><a href="public/about_us.php">ABOUT</a></li>
                <li><a  onclick="showPopUp()">SIGN IN</a></li>
                <li><a href="inc/file_management.php">FILE MANAGEMENT</a></li>
            </ul>
        </div>
    </div>
    <!----x---- Navigation bar ----x---->

    <!--------- main section --------->
  
    <div class="top flex">
        <div class="left">
            <img src="image/AASTU lib.jpg" alt="AASTU Library">
        </div>
        <div class="text">
                <h1>AASTU Online Library - Welcome!</h1>
                <p>Our digital Library is an open project: the software is open, the data<br>are open,
                 the documentation is open, and  we welcome your contribution.<br> Whether you fix a typo, add a book,
                 or write a widget it's all welcome. <br> We have a small team
                 of fantastic programmers <br> who have accomplished a lot, but we can't do it alone!</p>
                 <br>
                
                 <button id="cn" class="signup" onclick="showPopUp()">LOG IN</button>
            </div>
    </div>
        <div class="pop" id="popup" >
           <?php
             if(isset($_GET['error']) == 'invalid')
              echo 'invalid password or username';

              ?>
        <div class="form" >
          <button onclick="closePopUp()" id="closeBtn">X</button> 
          <div class="changeForm">
            <button onclick="signinSwap()" id="toSignInBtn">Sign In</button>
            <button onclick="signupSwap()" id="toSignUpBtn">Sign Up</button>
          </div>
           <div class="signIn" id="sIN">
            <form action="inc/login.php" method="post">
              <div class="inputBox">
                <input type="text" placeholder="Username" id="myUsername" name="logName" required/>
                <input type="password" placeholder="Password" id="myPassword" name="logPassword" required/>
              </div>
              <div class="showPsw">
      
                <input type="checkbox" onclick="showPassword()" id="showBox" />
                <label for="showBox">Show Password</label>
                <a id="forgetTag">Forget password?</a>
              </div>
              <input type="submit" id="btn" value="Log In" id="loginBtn" />
            </form>
          </div>
          <div class="signUp" id="sUP">
            <form method="POST" action="inc/registration.php">
                <div class="inputBox">
                  <input type="text" id="fname" name="fname" placeholder="First Name"/>
                  <input type="text" id="lname" name="lname" placeholder="Last Name"/>
                  <input type="text" id="username" name="Username" placeholder="Username"/>
                  <div class="rdBtn">
                      <label>Gender:</label>
                      <input type="radio" name="radSize" id="male" value="M"/>
                      <label for="male">Male</label>
                      <input type="radio" name="radSize" id="female" value="F"/>
                      <label for="female">Female</label><br />
                  </div>
                    <input type="email" id="email" name="email" placeholder="email: youremail@gmail.com"/>
                    <input type="tel" name="phone" placeholder="phone: 0911-11-11-11" pattern="[0][9][0-9]{8}"/>
                    <input type="password"  name="newPassword"  placeholder="password:" id="newPsw" required/>
                  </div>
                  <div class="submitBtn">
                    <input type="submit">
                    <input type="reset"/>
                  </div>
                </form>
          </dvi>
          </div>
        </div>
      </div>
          <script src="javascript/sign_up.js"></script>
    <!----x---- main section ----x---->
    
   </section>
</body>
</html>

<?php

  }else{
    header("Location: public/book_list.php");
  }

  ?>