<?php
    // $student_id = $_GET['student_id'];


    // $id = $_GET['id'];

    // echo $id;

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");

if(isset($_POST['submit_image'])){
    $id = $_POST['id'];
   
    //uploading imgage
    $files = $_FILES['file'];
    
    //testing 
    //    echo  $id;
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
   

            $query = "UPDATE students SET student_photo = '$url' WHERE student_id=$id"; 

            $_result = mysqli_query($conn, $query);

            header("location: index.php?message=success");

        // $message = "Congratulations! You have successfully updated your profile detail.";
        

    }

}