<?php

include_once("conn.php");

    // user registration input
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $username = $_POST['Username'];
    $gender = $_POST['radSize'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['newPassword'];

    $query = "INSERT INTO $table_name(first_name, last_name, gender, username, password, email, phone) VALUES ('$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone')";

    mysqli_query($conn, $query);
    header("Location: ../index.php");

?>