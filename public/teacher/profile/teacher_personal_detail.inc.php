<?php
    // $id = $_GET['id'];
    // echo "<h2 style='padding-top:200px'>" . $id . "</h2>";

if(isset($_POST['update'])){

    require_once '../../../private/config/db_connect.php';
    
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
        
           //testing 
           //    echo  $product_name;
           //    echo "</br>";
           //    print_r($files);
   
          
                $query = "UPDATE teachers SET teacher_first_name = '$first_name',
                teacher_last_name = '$last_name',
                gender_id = $gender,
                teacher_phone = '$phone',
                teacher_email = '$email',
                teacher_address = '$address',
                city_id = $city,
                state_id = $state,
                city_pincode = $pincode  WHERE teacher_id=$id"; 
    
                $result = mysqli_query($conn, $query);
                
                header("location: index.php?message=success");
                // header("location: ../registration.php");
                // exit();

                // $message = "Congratulations! You have successfully updated your profile detail.";
           
    // 
    

} else {
     // redirect to register and empty field
    // header("location: ../registration.php");
    // echo "000stop scripting";
    //  exit();
    // $id = $_GET['id'];
    // echo 'updating ID is ' . $id;
}