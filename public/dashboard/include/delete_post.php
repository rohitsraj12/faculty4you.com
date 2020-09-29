<?php

require_once("../../../private/config/db_connect.php");

    $id = $_GET['post_id'];
    $delete_query = "DELETE FROM posts WHERE post_id = '$id' LIMIT 1";
    $query_result = mysqli_query($conn, $delete_query);

    header("location: ../student/student_post.php?message=post_deleted");

?>