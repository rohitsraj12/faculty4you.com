<?php
if(isset($_POST['update'])){
    require_once("../../../private/config/db_connect.php");

    $id = $_POST['id'];
    $cat = $_POST['category'];
    $exp = $_POST['exp'];
    $sub = $_POST['subject'];
    $sub_cat = $_POST['subject_category'];
    $about = $_POST['about_me'];
    $charges = $_POST['charges']. " " . $_POST['per_time'];
    
    $query = "UPDATE teachers SET study_cat_id = '$cat',
    sub_cat_id = '$sub_cat',
    subject_id = $sub,
    teacher_experience = '$exp',
    teacher_about_me = '$about', 
    teaching_charge = '$charges'  WHERE teacher_id=$id"; 

    $result = mysqli_query($conn, $query);
    
    header("location:index.php?message=success");
    // header("location: ../registration.php");
    // exit();

            // $message = "Congratulations! You have successfully updated your profile detail.";
       }else {
 // redirect to register and empty field
// header("location: ../registration.php");
// echo "000stop scripting";
//  exit();
// $id = $_GET['id'];
// echo 'updating ID is ' . $id;
}