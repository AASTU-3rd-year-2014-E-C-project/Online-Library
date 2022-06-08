<?php

include_once("conn.php");
session_start();

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
$phone = $_POST['phone'];
$password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$query = "INSERT INTO user (user_type, first_name, last_name, gender, username, password, email, phone) VALUES ('user', '$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone')";

if ($validEmail && $validUsername) {
    mysqli_query($conn, $query);
    $user_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT user_id FROM user WHERE user_type = 'user' AND username = '$username'"))['user_id'];
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_type'] = 'user';
    header('Location: public/book_list.php');
    header("location: ../index.php");
} else
    header("location: ../index.php?error=invalid_signup");
