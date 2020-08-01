<?php
    // $student_id = $_GET['student_id'];



if(isset($_POST['student_update'])){
    //  $student_id = $_GET['student_id'];
    // $student_name = $_POST['id'];
     $student_name = $_POST['first_name'];
    // $student_batch = $_POST['batch'];
    // $student_phone =  $_POST['phone'];
    // $student_email =  $_POST['email'];
    // $student_detail =  $_POST['detail'];
    // $active =  $_POST['active'];        
    // //uploading imgage
    // $files = $_FILES['file'];

    echo "hi";
    //  echo $student_id;
    echo $studnet_name;

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

    //     $query = "UPDATE students set student_id = $student_id, 
    //     student_name = '$student_name', 
    //     student_batch = '$student_batch', 
    //     student_phone = '$student_phone', 
    //     student_email = '$student_email', 
        
    //     student_image = '$destination_file', 
    //     student_detail = '$student_detail' WHERE student_id=$student_id"; 

    //     $_result = mysqli_query($conn, $query);

    //     header('location:view_students.php');
    // }

}