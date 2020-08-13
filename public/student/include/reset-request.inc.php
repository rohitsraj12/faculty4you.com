<?php

if(isset($_POST['reset-request-submit'])){
    // create token 
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.facultyforyou.com/student/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    require_once '../../../private/config/db_connect.php';


    $user_email = $_POST['email'];

    echo $user_email;

    $sql = "DELETE FROM `pwd_reset` WHERE pwd_reset_email = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "there was a error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $user_email);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwd_reset(pwd_reset_email, pwd_reset_selector, pwd_reset_token, pwd_reset_expires) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "there was a error!";
        exit();
    } else {
        $hashed_token = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $user_email, $selector, $hashed_token, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // sending email
    $to = $user_email;
    $subject = "reset your password for facultyforyou.com";
    $message = "<p>we received a password request. The link to reset your password make this request, you can ignore this email</p>";
    $message .= "<p>Here is your password reset link: </br>";
    $message .= "<a href='". $url ."'>". $url ."</a> </p>";
    
    $headers = "From: facultyforyou.com <rohitsraj12@gmail.com>\r\n";
    $headers .= "Replay-To: rohitsraj12@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header('Location: ../reset_password.php?reset=success');

} else {
    header('location: ../../login.php');
}

