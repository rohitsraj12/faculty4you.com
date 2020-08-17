<?php

if(isset($_POST['submit-register'])){
    require_once '../../../private/config/db_connect.php';


    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // fill empty data
    $first_name = "";
    $last_name = "";
    $phone = "";
    $photo = "";
    
    // if empty field condition
    if(empty($user_name) || empty($email) || empty($password) || empty($re_password)){
        // redirect to register and empty field
        header("location: ../register.php?error=emptyfields&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../register.php?error=invalidmailuser_name");
        //stop scripting
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // redirect to register and empty field
        header("location: ../register.php?error=invalidmail&user_name=".$user_name);
        //stop scripting
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        // redirect to register and empty field
        header("location: ../register.php?error=invalidmail&mail=".$email);
        //stop scripting
        exit();
    } else if ($password !== $re_password){
        // redirect to register and empty field
        header("location: ../register.php?error=passwordcheck&user_name=".$user_name."&mail".$email);
        //stop scripting
        exit();
    } else {
        // prepared statement (? placeholder for safty)
        $sql = "SELECT user_name FROM faculty_admin WHERE user_name=?";
        // 
        $stmt = mysqli_stmt_init($conn);

        // 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            
            // redirect to register and empty field
            header("location: ../register.php?error=sqlerror");
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
                header("Location: ../register.php?error=usertaken$mail=".$email);
                //stop scripting
                exit();
            } else {
                $first_name = "";
                $sql = "INSERT INTO faculty_admin (first_name, last_name, user_name, email, admin_password, phone, photo) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    // redirect to register and empty field
                    header("Location: ../register.php?error=sqlerror");
                    //stop scripting
                    exit();
                } else {
                    // secure password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssss", $first_name, $last_name, $user_name, $email, $hashed_password, $phone, $photo);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: ../register.php?register=success");
                    exit();
                }
            }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

} else {
     // redirect to register and empty field
     header("location: ../register.php");
     //stop scripting
     exit();
}