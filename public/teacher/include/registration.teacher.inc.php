<?php

if(isset($_POST['submit-register'])){

    require_once '../../../private/config/db_connect.php';
    

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $phone = $_POST['telephone'];


    // fill empty data
    // $first_name = "";
    // $last_name = "";
    // $gender = "";
    // $address = "";
    // $city = "";
    // $state = "";
    // $pincode = "";
    // $image = "";
    // $membership = "";
    // $teaching_exp = "";
    // $about = "";
    // $online_one = "";
    // $online_group = "";
    // $home_tution = "";
    // $sub_id = "";
    // $category_id = "";
    
    // if empty field condition
    if(empty($user_name) || empty($email) || empty($password) || empty($re_password) || empty($phone)){
        // redirect to register and empty field
        header("location: ../login.php?error=emptyfields&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../login.php?error=invalidmailuser_name");
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // redirect to register and empty field
        header("location: ../login.php?error=invalidmail&user_name=".$user_name);
        //stop scripting
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../login.php?error=invalidmail&mail=".$email);
        //stop scripting
        exit();
    } else if ($password !== $re_password){
        // redirect to register and empty field
        header("location: ../login.php?error=passwordcheck&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else {
        // prepared statement (? placeholder for safty)
        $sql = "SELECT teacher_user_name FROM teachers WHERE teacher_user_name=?";
        // 
        $stmt = mysqli_stmt_init($conn);

        // 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            
            // redirect to register and empty field
            header("location: ../login.php?error=sqlerror");
            //stop scripting
            exit();
        } else {
            // 
            mysqli_stmt_bind_param($stmt, "s", $user_name);
            mysqli_stmt_execute($stmt);
            // is ther any match
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0 ){
                
                // redirect to register and empty field
                header("Location: ../registration.php?error=usertaken$mail=".$email);
                //stop scripting
                exit();
            } else {
                // $first_name = "";
                // $sql = "INSERT INTO teachers (teacher_first_name, teacher_last_name, teacher_user_name, gender_id, teacher_email, teacher_password, teacher_phone, teacher_address, city_id, state_id, teacher_photo, teacher_membership_status, teacher_experience, teacher_about_me, teacher_online_one_to_one, teacher_online_group, teacher_home_tuition, subject_id, category_id) 
                // VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $sql = "INSERT INTO teachers (teacher_user_name, teacher_email, teacher_password, teacher_phone) 
                    VALUES (?, ?, ?, ?)";
                  
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // redirect to register and empty field
                    header("Location: ../login.php?error=sqlerror");
                    //stop scripting
                    exit();
                } else {
                    // secure password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    //mysqli_stmt_bind_param($stmt, "sssissssiissisiiiii", $first_name, $last_name, $user_name, $gender, $email, $hashed_password, $phone, $address, $city, $state, $image, $membership, $teaching_exp, $about, $online_one, $online_group, $home_tution, $sub_id, $category_id);
                    mysqli_stmt_bind_param($stmt, "ssss", $user_name, $email, $hashed_password, $phone);
                    mysqli_stmt_execute($stmt);

                    //send email
                    $to = $email;
                    $subject = "Hi " . $user_name . ", Welcome to facultyforyou.com";
                    $message = "<p>Dear " . $user_name . ",</p></br>";
                    $message .= "<p>Welcome to <a href='http://facultyforyou.com/'>facultyforyou.com.</p></br>";
                    $message .= "<p>A special thanks to you as you now became a new member on most honored and credible learning network in India. We will provide you the students and hope we will help you in growing your tutoring business.</p></br>";
                    $message .= "<p>Thank you.,</p>";
                    $message .= "<p>admin</p>";
                    $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
                    
                    $headers = "From: facultyforyou.com <admin@facultyforyou.com>\r\n";
                    $headers .= "Reply-To: admin@facultyforyou.com\r\n";
                    $headers .= "Content-type: text/html\r\n";
                
                    mail($to, $subject, $message, $headers);
                

                    header("Location: ../login.php?register=success");
                    exit();
                }
            }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        
} else {
     // redirect to register and empty field
     header("location: ../registration.php");
     //stop scripting
     exit();
}