<?php
session_start();
include ("../inc/conn.php");

    if(isset($_POST['commentSubmit'])){
       
        $uid =(int) $_SESSION['user_id'];
        $rid = (int)$_SESSION['comment_resource_id'];
        $comm = $_POST['comment'];
        $sql = "INSERT INTO comment (user_id, resource_id, comment_date, comment) 
        values ($uid, $rid, now(), '$comm')";
     mysqli_query($conn,$sql);
    
     header("Location: book1_desc.php?resource_id=$rid");
    }

