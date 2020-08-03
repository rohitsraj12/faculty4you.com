<?php
    // $student_id = $_GET['student_id'];


    // $id = $_GET['id'];

    // echo $id;

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $address =  $_POST['address'];
    $city =  $_POST['city'];    
    $state =  $_POST['state'];
    $pincode =  $_POST['pincode'];
  

    //if(){
        // //uploading imgage
            // $files = $_FILES['file'];

            // echo "hi";
            // //  echo $student_id;
            // echo $studnet_name;

            // //  accesing file details
            //    $file_name = $files['name'];
            //    $file_error = $files['error'];
            //    $filetemp = $files['tmp_name'];

            // // breakdown file name and extention
            //     // after . will store in var
            //     $file_ext = explode('.', $file_name);
            //     // make it lowercase
            //     $file_check = strtolower(end($file_ext));
            
            //     //file ext store in array which are png, jpeg n jpg
            //     $file_ext_store = array('png', 'jpeg', 'jpg');


            // if(in_array($file_check,$file_ext_store)){
            //     //destination folder
            //     $destination_file = 'img/'. $file_name;
            //     //moving from tem to destination
            //     move_uploaded_file($filetemp, $destination_file);
    //}
   

        $query = "UPDATE std SET student_first_name = '$first_name',
        student_last_name = '$last_name', 
        student_email = '$email', 
        student_phone = '$phone', 
        student_address = '$address', 
        city_id = $city, 
        state_id = $state, 
        student_city_pincode = '$pincode' WHERE student_id=$id"; 

        $_result = mysqli_query($conn, $query);

        // header('location:index.php');
    // }

}