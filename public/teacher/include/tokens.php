<?php

require_once('../../../private/config/db_connect.php');

session_start();
//back function false
if(!isset($_SESSION['user_name'])){
    header('location: login.php');
}

$user_name = $_SESSION['user_name'];
$user_query = "SELECT * FROM teachers WHERE teacher_user_name = '$user_name'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$teacher_id = $user_row['teacher_id'];

    if(isset($_POST["token_update"])){
        $update_token = $_POST['token'];
        $student = $_POST['student'];
        $post = $_POST['post'];

        $update_query = "UPDATE memberships SET 
            member_token = '$update_token'
            WHERE membership_id = $teacher_id" ;

        $update_member = mysqli_query($conn, $update_query);
        header("location:../student_detail.php?id=" . $post);
    }
    ?>
    