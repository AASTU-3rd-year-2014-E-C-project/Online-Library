<?php
    include_once("conn.php");

     $username = $_POST['logName'];
     $password = $_POST['logPassword'];

      $conn = mysqli_connect($host, $host_username, $host_password, $db_name);

      $login= "SELECT password FROM $table_name WHERE username='$username'";
        $result= mysqli_query($conn, $login);

        while($row = mysqli_fetch_assoc($result)){
           
            if ($row['password'] == $password){
                header('Location: ../public/book_list.html');
                return;
            } 
        }
               header("Location: ../index.php?error=invalid");


    
    
?>