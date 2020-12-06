<?php
    // sending reminder email to students, update profile details
    if(isset($_POST['update_profile_detail'])){
        $email = $_POST['email'];
        $student_name = $_POST['name'];
        $admin_email = "admin@facultyforyou.com";

        //send email to students for updation of their profile details
        $to = $email;
        $subject = "hello, Your profile need to be update | facultyforyou.com";
        $message = "<p>Dear " . $student_name . ",</p></br>";
        $message .= "<p>Welcome to facultyforyou.com. A special thanks to you as you now became a new student on the most honored and credible learning network in India. Please login and create your profile; Post your requirement/s to see the details of tutors on your requirement.</p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        // from faculty details
        $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
        $headers .= "Reply-To: " . $admin_email . "\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);
        header("location:../index.php");
    }
