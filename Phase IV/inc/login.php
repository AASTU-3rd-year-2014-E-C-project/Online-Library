<?php
    include_once("conn.php");

     $username = $_POST['logName'];
     $password = $_POST['logPassword'];

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