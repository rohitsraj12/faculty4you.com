<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $user_name = $_SESSION['user_name'];
    $user_query = "SELECT teachers.*, cities.* 
        FROM teachers 
        JOIN cities
            ON cities.city_id = teachers.city_id
        WHERE teacher_user_name = '$user_name'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

    $teacher_id = $user_row['teacher_id'];

    $page_title = "profile";
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include_once('include/header.inc.php');
    // include("../../private/required/public/components/search.php");
        

    
?>