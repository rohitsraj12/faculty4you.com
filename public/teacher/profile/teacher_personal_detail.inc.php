<?php

if(isset($_POST['update'])){
    require_once("../../../private/config/db_connect.php");

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    // echo $gender;
    // $query = "UPDATE teachers SET teacher_first_name = '$first_name',
    // teacher_last_name = '$last_name',
    // gender_id = $gender,
    // teacher_phone = '$phone',
    // teacher_email = '$email',
    // teacher_address = '$address',
    // city_pincode = $pincode,
    // city_id = $city,
    // state_id = $state WHERE teacher_id=$id"; 


    $query = "UPDATE `teachers` SET `teacher_first_name`='$first_name',
        `teacher_last_name`='$last_name',
        `gender_id`='$gender',
        `teacher_email`='$email',
        `teacher_phone`='$phone',
        `teacher_address`='$address',
        `city_id`='$city',
        `state_id`='$state',
        `city_pincode`='$pincode' WHERE `teacher_id`=$id";

    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "failed";
    } else {
        echo "success";
    }
    
    header("location:index.php?message=success");

}
