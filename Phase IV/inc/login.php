<?php
include_once("conn.php");
include_once("session.php");

$username = $_POST['logName'];
$password = $_POST['logPassword'];

$user_type = 'user';

if (substr($username, strlen($username) - 6) == "@admin") {
    $user_type = 'admin';
}

$login = "SELECT password, user_id, user_type FROM user WHERE username='$username' AND user_type='$user_type'";
$result = mysqli_query($conn, $login);

while ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        header('Location: ../public/book_list.php');
        die();
    } else {
        header("Location: ../index.php?error=invalid");
    }
    header("Location: ../index.php?error=invalid");
}
