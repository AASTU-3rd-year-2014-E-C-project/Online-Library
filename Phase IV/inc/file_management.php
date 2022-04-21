<?php

    $permission = "r";
    $filename = "../MemberRole.txt";

    if(isset($_POST['openFile'])){
        $my_file = fopen($filename, $permission);
    }

    if(isset($_POST['wOpening'])){
        $fopen = fopen($filename, $permission);
        $content = fread($fopen, filesize($filename));
        fclose($fopen);
        echo $content;
    }

    if(isset($_POST['woutOpening'])){
        $myfile = file_get_contents($filename);
        echo $myfile;
    }
    
    if(isset($_POST['writeFile'])){
        $permission = "a";
        $fopen = fopen($filename, $permission);
        fwrite($fopen, $_POST['fileInput']);
        fclose($fopen);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
    <input type="submit" value="Open File" name="openFile">
    <input type="submit" value="Read by Opening" name="wOpening">
    <input type="submit" value="Read without Opening" name="woutOpening">
    <input type="text" name="fileInput">
    <input type="submit" value="Write File" name="writeFile">
    </form>
</body>
</html>