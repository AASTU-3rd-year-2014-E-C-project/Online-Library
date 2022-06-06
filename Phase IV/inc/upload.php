<?php
include_once("conn.php");
include_once("session.php");

$fileUploaded = false;
$coverUploaded = false;

if (isset($_POST['submit'])) {

    $fileName = $_FILES['myfile']['name'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileError = $_FILES['myfile']['error'];
    $fileType = $_FILES['myfile']['type'];

    $fileExt =  explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/resource_files/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $fileUploaded = true;
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error on the uploading process";
        }
    } else {
        echo "You cannot upload other than pdf format for the moment";
    }

    // -----------------------We will do the same for the cover image too------------
    // I indicates image


    $fileNameI = $_FILES['cover']['name'];
    $fileTmpNameI = $_FILES['cover']['tmp_name'];
    $fileSizeI = $_FILES['cover']['size'];
    $fileErrorI = $_FILES['cover']['error'];
    $fileTypeI = $_FILES['cover']['type'];

    $fileExtI =  explode('.', $fileNameI);
    $fileActualExtI = strtolower(end($fileExtI));


    $allowedI = array('jpg', 'jpeg', 'png', '');
    if (in_array($fileActualExtI, $allowedI)) {
        if ($fileErrorI === 0) {
            if ($fileSizeI < 5000000) {
                $fileNameNewI = uniqid('', true) . "." . $fileActualExtI;
                $fileDestinationI = '../uploads/resource_covers/' . $fileNameNewI;
                move_uploaded_file($fileTmpNameI, $fileDestinationI);
                $coverUploaded = true;
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error on the uploading process";
        }
    } else {
        echo "The file format of cover is only jpg,jpeg and png for the moment";
    }
}
$table = 'resource';
$type = $_POST['radio'];
$title = $_POST['Title'];
// $author = $_POST['Author'];
$desc = $_POST['description'];
$user = $_SESSION['user_id'];
//$cover = $_POST['cover'];  cover file name is $fileNameNewI
// $file = $_POST['myfile'];     the name of the file is $fileNameNew

$usernameAuthor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM user WHERE user_id = '{$_SESSION['user_id']}'"))['username'];
// mysqli_query($conn, "INSERT INTO donate_record (donate_date, user_id, resource_id) VALUES (now(),'$user','')");

$query = "INSERT INTO resource (resource_type, resource_title, resource_author, resource_desc, resource_cover, resource_file, user_id) VALUES ('$type', '$title', '$usernameAuthor', '$desc', '$fileNameNewI', '$fileNameNew', '$user')";

if (1) {
    mysqli_query($conn, $query);
    $get_resource = "SELECT resource_id FROM resource WHERE resource_title='$title' AND user_id=$user AND resource_desc = '$desc'";
    $res = mysqli_query($conn, $get_resource);
    $row = mysqli_fetch_assoc($res);
    
    mysqli_query($conn, "INSERT INTO donate_record (donate_date, user_id, resource_id) VALUES (now(),'$user','{$row['resource_id']}')");
    if (isset($_POST['genre'])) {
        foreach ($_POST['genre'] as $genre) {
            mysqli_query($conn, "INSERT INTO resource_tag(resource_id, tag_id) VALUES ('{$row['resource_id']}','{$genre}')");
        }
    }
    header("Location: ../public/upload.php?uploadsuccess");
} else {
    header("Location: ../public/upload.php");
}
