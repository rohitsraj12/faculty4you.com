<?php
    // $id = $_GET['id'];
    // echo "<h2 style='padding-top:200px'>" . $id . "</h2>";

if(isset($_POST['update'])){

    // require_once '../../../private/config/db_connect.php';
    
    $id = $_GET['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    // $pincode = $_POST['pincode'];
    $cat = $_POST['category'];
    $exp = $_POST['exp'];
    $sub = $_POST['subject'];
    $files = $_FILES['file'];
    // $single = $_POST['single'];
    // $group = $_POST['group'];
    // $home = $_POST['home'];
    $about = $_POST['about_me'];
        
           //testing 
           //    echo  $product_name;
           //    echo "</br>";
           //    print_r($files);
   
           //  accesing file details
               $file_name = $files['name'];
               $file_error = $files['error'];
               $filetemp = $files['tmp_name'];
   
           // breakdown file name and extention
               // after . will store in var
               $file_ext = explode('.', $file_name);
               // make it lowercase
               $file_check = strtolower(end($file_ext));
           
               //file ext store in array which are png, jpeg n jpg
               $file_ext_store = array('png', 'jpeg', 'jpg');
   
           if(in_array($file_check,$file_ext_store)){
               //destination folder
               $destination_file = '../../img/teacher/profile_pic/' . $file_name;
               $url = 'img/teacher/profile_pic/' . $file_name;
               //moving from tem to destination
               move_uploaded_file($filetemp, $destination_file);
  
                $query = "UPDATE teachers SET teacher_first_name = '$first_name',
                teacher_last_name = '$last_name',
                gender_id = $gender,
                teacher_phone = '$phone',
                teacher_email = '$email',
                teacher_address = '$address',
                city_id = $city,
                state_id = $state,
                subject_id = $sub,
                category_id = '$cat',
                teacher_experience = '$exp',
                teacher_about_me = '$about', 
                teacher_photo = '$url'  WHERE teacher_id=$id"; 
    
                $result = mysqli_query($conn, $query);
           }
    // 
    
   header('location: index.php');

} else {
     // redirect to register and empty field
    // header("location: ../registration.php");
    // echo "000stop scripting";
    //  exit();
    $id = $_GET['id'];
    echo 'updating ID is ' . $id;
}