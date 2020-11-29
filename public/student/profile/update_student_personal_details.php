<?php
 
 require_once("../../../private/config/db_connect.php");
 require("../../../private/config/config.php");

if(isset($_POST['update_personal_info'])){
    $id = $_POST['id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['date'];


            $query = "UPDATE students SET student_first_name = '$first_name',
            student_last_name = '$last_name',
            gender_id = $gender, 
            student_date_of_birth = '$dob' WHERE student_id=$id"; 

            $_result = mysqli_query($conn, $query);

            header("location: index.php?message=success");

        // $message = "Congratulations! You have successfully updated your profile detail.";
        


}
