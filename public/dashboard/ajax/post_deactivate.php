<?php
   require("../../../private/config/db_connect.php");


        $id = $_POST['id'];
        $query = "UPDATE posts SET
            post_state = '0'
         WHERE post_id = '$id'";
        
        if(mysqli_query($conn, $query)){
            echo 1;
        } else {
            echo 0;
        }
    
?>