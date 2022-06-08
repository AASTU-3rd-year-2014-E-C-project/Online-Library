<?php

include_once("conn.php");

// user registration input
$fName = $_POST['fname'];
$lName = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['Username'];
$validUsername = true;
$validEmail = true;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validEmail = false;
}

$q = "SELECT * FROM user";
$r = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($r)) {
    if ($row['username'] == $username) {
        $validUsername = false;
        header("location: ../index.php?error=invalid_username");
    }
    if ($row['email'] == $email) {
        $validEmail = false;
        header("location: ../index.php?error=invalid_email");
    }
}

$gender = $_POST['radSize'];


// if (isset($_POST['submit'])) {

//     $query = "INSERT INTO $table_name(first_name, last_name, gender, username, password, email, phone, profile_pic) VALUES ('$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone', 'NULL')";

//     mysqli_query($conn, $query);
// } else {
//     echo "submission Error";
// }

// header("Location: ../index.php");



$phone = $_POST['phone'];
$password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$query = "INSERT INTO user (user_type, first_name, last_name, gender, username, password, email, phone) VALUES ('user', '$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone')";

if (true) {
    mysqli_query($conn, $query);
    header("location: ../index.php");
} else
    header("location: ../index.php?error=invalid_signup");
