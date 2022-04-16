<?php

    $host = "localhost";
    $host_username = "root";
    $host_password = "";
    $db_name = "aastu-library";
    $table_name = "user";

    // user registration input
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $username = $_POST['Username'];
    $gender = $_POST['radSize'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['newPassword'];

    $conn = mysqli_connect($host, $host_username, $host_password, $db_name);

    $query = "INSERT INTO $table_name(first_name, last_name, gender, username, password, email, phone) VALUES ('$fName', '$lName', '$gender', '$username', '$password', '$email', '$phone')";

    mysqli_query($conn, $query);
    header("Location: ../index.html");

?>