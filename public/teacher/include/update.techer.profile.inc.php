<?php
    // $id = $_GET['id'];
    // echo "<h2 style='padding-top:200px'>" . $id . "</h2>";

if(isset($_POST['update'])){

    // require_once '../../../private/config/db_connect.php';
    
    $id = $_GET['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    // $pincode = $_POST['pincode'];
    // $cat = $_POST['category'];
    // $exp = $_POST['exp'];
    // $sub = $_POST['subject'];
    // $single = $_POST['single'];
    // $group = $_POST['group'];
    // $home = $_POST['home'];
    $about = $_POST['about_me'];

    // $password = $_POST['password'];
    // $re_password = $_POST['re_password'];

    // fill empty data
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];?
//     $email = $_POST['email'];
//     // $image = "";
//     // $membership = "";
//     // $gender = $_POST['gender'];
//     $about = $_POST['about'];
//     $online_one = $_POST['online_one'];
//     $online_group = $_POST['online_group'];
//     $home_tuition = $_POST['home_tuition'];
//     $sub = $_POST['subject'];
  
    $query = "UPDATE teachers SET teacher_first_name = '$first_name',
    teacher_last_name = '$last_name',
    teacher_phone = '$phone',
    teacher_email = '$email',
    teacher_address = '$address',
    city_id = $city,
    state_id = $state WHERE teacher_id=$id"; 
    
    $result = mysqli_query($conn, $query);

    // ,
    // subject_id = '$sub',
    // teacher_about_me = '$about',
    // teacher_experience = '$exp',
    // category_id = '$cat',
    // teacher_online_one_to_one = '$single',
    // teacher_online_group = '$group',
    // teacher_home_tuition = '$home' 
    
//    header('location:'.$base_url.'index.php');

} else {
     // redirect to register and empty field
    // header("location: ../registration.php");
    // echo "000stop scripting";
    //  exit();
}