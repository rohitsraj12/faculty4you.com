<?php
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");

if(isset($_POST['update_contact_info'])){
    $id = $_POST['id'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $address =  $_POST['address'];
    $city =  $_POST['city'];    
    $state =  $_POST['state'];
    $pincode =  $_POST['pincode'];

    
    //  accesing file details
           $query = "UPDATE students SET 
            student_email = '$email', 
            student_phone = '$phone', 
            student_address = '$address', 
            city_id = '$city', 
            state_id = '$state', 
            city_pincode = '$pincode'
            WHERE student_id=$id"; 

            $_result = mysqli_query($conn, $query);

            header("location: index.php?message=success");

      

}