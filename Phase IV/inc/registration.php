<?php

include_once("conn.php");

// user registration input
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['Username'];
$validUsername = true;
$validEmail = true;

<<<<<<< Updated upstream
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validEmail = false;
}

$q = "SELECT * FROM user";
$r = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($r)) {
    if ($row['username'] == $username) {
        $validUsername = false;
        header("location: ../index.php?error=invalid_signup");
    }
    if ($row['email'] == $email) {
        $validEmail = false;
        header("location: ../index.php?error=invalid_signup");
    }
}

$gender = $_POST['radSize'];
=======
    $profile_pic_uploaded = false;

if (isset($_POST['submit'])){
    
    $fileName = $_FILES['profile']['name'];
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileError = $_FILES['profile']['error'];
    $fileType = $_FILES['profile']['type'];

    $fileExt =  explode ('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true). "." . $fileActualExt;
                $fileDestination = '../image/profile_pic/'. $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $profile_pic_uploaded = true;
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error on the uploading process";
        }
    }else{
        echo "You cannot upload other than pdf format for the moment";
    }
      $query = "INSERT INTO $table_name(first_name, last_name, gender, username, password, email, phone, profile_pic) VALUES ('$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone', '$fileNameNew')";

    mysqli_query($conn, $query);
} else{
    echo "submission Error";
}
  
    // header("Location: ../index.php");


>>>>>>> Stashed changes

$phone = $_POST['phone'];
$password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$query = "INSERT INTO $table_name(first_name, last_name, gender, username, password, email, phone) VALUES ('$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone')";

if ($validEmail && $validUsername) {
    mysqli_query($conn, $query);
    header("location: ../index.php");
}else
header("location: ../index.php?error=invalid_signup");
