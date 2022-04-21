<?php

    if(isset($_POST['openFile'])){
        echo 'clicked';
    }
    if(isset($_POST['wOpening'])){
        
    }
    if(isset($_POST['woutOpening'])){
        
    }
    if(isset($_POST['writeFile'])){
        
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
    <input type="submit" value="Write File" name="writeFile">
    </form>
</body>
</html>