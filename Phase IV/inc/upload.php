<?php
include_once("conn.php");
include_once("session.php");
if (isset($_POST['submit'])){
    
    $fileName = $_FILES['myfile']['name'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileError = $_FILES['myfile']['error'];
    $fileType = $_FILES['myfile']['type'];

    $fileExt =  explode ('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('pdf');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true). "." . $fileActualExt;
                $fileDestination = '../shared/uploaded_books/'. $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: ../public/upload.html?uploadsuccess");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error on the uploading process";
        }
    }else{
        echo "You cannot upload other than pdf format for the moment";
    }

// -----------------------We will do the same for the cover image too------------
// I indicates image
    
    
    $fileNameI = $_FILES['cover']['name'];
    $fileTmpNameI = $_FILES['cover']['tmp_name'];
    $fileSizeI = $_FILES['cover']['size'];
    $fileErrorI = $_FILES['cover']['error'];
    $fileTypeI = $_FILES['cover']['type'];

    $fileExtI =  explode ('.', $fileNameI);
    $fileActualExtI= strtolower(end($fileExtI));

    $allowedI = array('jpg, jpeg, png');
    if(in_array($fileActualExtI, $allowedI)){
        if($fileErrorI === 0){
            if($fileSizeI < 5000000){
                $fileNameNewI = uniqid('', true). "." . $fileActualExtI;
                $fileDestinationI = '../shared/'. $fileNameNewI;
                move_uploaded_file($fileTmpNameI, $fileDestinationI);
                header("Location: ../public/upload.html?uploadsuccess");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error on the uploading process";
        }
    }else{
        echo "The file format of cover is only jpg,jpeg and png for the moment";
    }
}
$table = 'resource';
$type = $_POST['radio'];
$title = $_POST['Title'];
$author = $_POST['Author'];
$desc = $_POST['description'];
$user = $_SESSION['user_id'];
//$cover = $_POST['cover'];  cover file name is $fileNameNewI
// $file = $_POST['myfile'];     the name of the file is $fileNameNew

$query = "INSERT INTO $table(resource_type, resource_title, resource_author, resource_desc, resource_cover, resource_file, user_id) VALUES ('$type', '$title', '$author', '$desc', '$fileNameNewI', '$fileNameNew', ' $user')";

    mysqli_query($conn, $query);
    header("Location: ../public/upload.php");


?>