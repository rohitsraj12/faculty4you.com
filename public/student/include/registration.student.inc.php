<?php

if(isset($_POST['submit-register'])){

    require_once '../../../private/config/db_connect.php';

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // fill empty data
    // $first_name = "";
    // $last_name = "";
    // $address = "";
    // $city = "";
    // $state = "";
    // $pincode = "";
    // $image = "";
    // $dob = "";
    // $parent_name = "";
    // $parent_phone = "";
    // $post_id = "";
    
    // if empty field condition
    if(empty($user_name) || empty($email) || empty($password) || empty($re_password)){
        // redirect to register and empty field
        header("location: ../registration.php?error=emptyfields&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../registration.php?error=invalidmailuser_name");
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // redirect to register and empty field
        header("location: ../registration.php?error=invalidmail&user_name=".$user_name);
        //stop scripting
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../registration.php?error=invalidmail&mail=".$email);
        //stop scripting
        exit();
    } else if ($password !== $re_password){
        // redirect to register and empty field
        header("location: ../registration.php?error=passwordcheck&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else {
        // prepared statement (? placeholder for safty)
        $sql = "SELECT student_user_name FROM students WHERE student_user_name=?";
        // 
        $stmt = mysqli_stmt_init($conn);

        // 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            
            // redirect to register and empty field
            header("location: ../registration.php?error=sqlerror");
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
                $first_name = "";
                $sql = "INSERT INTO students (student_user_name, student_email, student_password, student_phone) 
                VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // redirect to register and empty field
                    header("Location: ../registration.php?error=sqlerror");
                    //stop scripting
                    exit();
                } else {
                    // secure password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $user_name, $email, $hashed_password, $phone);
                    mysqli_stmt_execute($stmt);
                    
                    $to = $email;
                    $subject = "Hi " . $user_name . ", Welcome to facultyforyou.com";
                    $message = "<p>Dear " . $user_name . ",</p></br>";
                    $message .= "<p>Welcome to <a href='http://facultyforyou.com/'>facultyforyou.com.</p></br>";
                    $message .= "<p>A special thanks to you as you now became a new member on most honored and credible learning network in India. Hope we will provide you a best tutor on your requirement soon.</p></br>";
                    $message .= "<p>Thank you.,</p>";
                    $message .= "<p>Facultyforyou.com</p>";
                    $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
                    
                    $headers = "From: facultyforyou.com <nathanisrinivasvictory@gmail.com>\r\n";
                    $headers .= "Replay-To: rohitsraj12@gmail.com\r\n";
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
     header("location: ../login.php");
     //stop scripting
     exit();
}