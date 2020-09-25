<?php
 session_start();
 //back function false
 if(!isset($_SESSION['user_name'])){
     header('location: ../index.php');
 }


$active = "faq";
$sub = "faq_view";

   require("../../../private/config/db_connect.php");
   require("../../../private/config/config.php");
   include("../dashboard/include/header.inc.php");

   $post_query = "SELECT * FROM posts";
   $post_result = mysqli_query($conn, $post_query);

    while($row = mysqli_fetch_assoc($post_result)){
        echo $row['post_id'];
        echo $row['post_title'];
        echo $row['post_detail'];
    }
?>