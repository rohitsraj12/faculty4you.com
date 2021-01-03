<?php
        $email = $_POST['email'];
        // $email = "rohitwebco@gmail.com";
        $teacher_name = $_POST['name'];

        $admin_email = "admin@facultyforyou.com";

        //send email to teacher
        $to = $email;
        $subject = "Membership renewal reminder | facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>Your membership has been expired. We hope <a href='http://facultyforyou.com'>facultyforyou.com</a> is the best platform to grow your tutoring business. Renew your membership with any one of the plans to connect with more students.</p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
        $headers .= "Reply-To: " . $admin_email . "\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);

        echo "Email has sent to " . $email;

?>