<?php

require("../../../../private/config/db_connect.php");
$id = $_GET['id'];

// echo $id;

    $query = "DELETE FROM `teachers` WHERE teacher_id = $id";
    $result = mysqli_query($conn, $query);

    if($result){
        header('location: ../../index.php');
    }
?>