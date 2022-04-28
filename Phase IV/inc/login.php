<?php
include_once("conn.php");
include_once("session.php");

$username = $_POST['logName'];
$password = $_POST['logPassword'];

$login = "SELECT password, user_id FROM $table_name WHERE username='$username'";
$result = mysqli_query($conn, $login);

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['password'] == $password) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = 'user';
        header('Location: ../public/book_list.php');
        die();
    }
}

$login = "SELECT password, admin_id FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $login);

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['password'] == $password) {
        $_SESSION['user_id'] = $row['admin_id'];
        $_SESSION['user_type'] = 'admin';
        header('Location: ../public/report.php');
        die();
    }
}
header("Location: ../index.php?error=invalid");
