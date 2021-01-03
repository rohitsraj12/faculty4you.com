<?php

    // require("../../../private/config/db_connect.php");

    $id = $_POST['email'];

    // $query = "SELECT * FROM students WHERE student_id = $id";
    // $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    // echo $row['student_user_name'];
    $admin_email = "rohitwebco@gmail.com";
    $email = $row['student_user_name'];
    echo $email;

    //send email to teacher for updation of their profile details
     $to = $id;
     $subject = "hello, Your profile need to be update | facultyforyou.com";
     $message = "<p>Dear Student,</p></br>";
     $message .= "<p>Welcome to facultyforyou.com. A special thanks to you as you now became a new tutor on the most honored and credible learning network in India. Please login and create your profile to see the details of students who are searching for tutors in your subject.</p></br>";
     $message .= "<p>We will provide you the students and hope we will help you in growing your tutoring business. </p></br>";
     $message .= "<p>Thank you,</p>";
     $message .= "<p>admin</p>";
     $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
     
     // from faculty details
     $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
     $headers .= "Reply-To: " . $admin_email . "\r\n";
     $headers .= "Content-type: text/html\r\n";
 

     mail($to, $subject, $message, $headers);
