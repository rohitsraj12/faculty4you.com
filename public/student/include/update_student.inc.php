<?php
    // $student_id = $_GET['student_id'];


    // $id = $_GET['id'];

    // echo $id;

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['date'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $address =  $_POST['address'];
    $city =  $_POST['city'];    
    $state =  $_POST['state'];
    $pincode =  $_POST['pincode'];

    //uploading imgage
    $files = $_FILES['file'];
    
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
            $destination_file = '../../img/student/profile_pic/' . $file_name;
            $url = 'img/student/profile_pic/' . $file_name;
            //moving from tem to destination
            move_uploaded_file($filetemp, $destination_file);
   

            $query = "UPDATE std SET student_first_name = '$first_name',
            student_last_name = '$last_name',
            gender_id = $gender, 
            student_date_of_birth = '$dob',
            student_email = '$email', 
            student_phone = '$phone', 
            student_address = '$address', 
            city_id = '$city', 
            state_id = '$state', 
            student_city_pincode = '$pincode', 
            student_photo = '$url' WHERE student_id=$id"; 

            $_result = mysqli_query($conn, $query);

            header("location: ../profile/index.php?message=success");

        // $message = "Congratulations! You have successfully updated your profile detail.";
        

    }

}