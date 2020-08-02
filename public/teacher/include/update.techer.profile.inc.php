<?php

if(isset($_POST['submit-register'])){

    require_once '../../../private/config/db_connect.php';
    
    $id = $_GET['teacher_id'];
    // $user_name = $_POST['user_name'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $re_password = $_POST['re_password'];

    // fill empty data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
//     $phone = $_POST['phone'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];
//     $city = $_POST['city'];
//     $state = $_POST['state'];
//     // $pincode = $_POST['pincode'];
//     // $image = "";
//     // $membership = "";
//     // $gender = $_POST['gender'];
//     $teaching_exp = $_POST['exp'];
//     $about = $_POST['about'];
//     $online_one = $_POST['online_one'];
//     $online_group = $_POST['online_group'];
//     $home_tuition = $_POST['home_tuition'];
//     $sub = $_POST['subject'];
//     $category = $_POST['category'];
  
    $query = "UPDATE teachers set teacher_first_name = '$first_name' 
--     teacher_last_name = '$last_name',
--     teacher_phone = '$phone',
--     teacher_email = '$email',
--     teacher_address = '$address',
--     city_id = '$city',
--     state_id = '$state',
--     teacher_experience = '$teaching_exp',
--     teacher_about_me = '$about',
--     teacher_online_one_to_one = '$online_one',
--     teacher_online_group = '$online_group',
--     teacher_home_tuition = '$home_tuition',
--     subject_id = '$sub',
--     category_id = '$category' 
WHERE teacher_id=$id"; 
    $result = mysqli_query($conn, $query);

    
//    header('location:'.$base_url.'index.php');

} else {
     // redirect to register and empty field
     header("location: ../registration.php");
     //stop scripting
     exit();
}