<?php

   // sending reminder email to tutor to get membership 
//    if(isset($_POST['reminder_email'])){
    $email = $_POST['email'];
    $teacher_name = $_POST['name'];
    $admin_email = "admin@facultyforyou.com";

    //send email to teacher to promote membership(if tutor is not taken membership then just to send notification)
    $to = $email;
    $subject = "hi " . $teacher_name . ", new tuition posted in facultyforyou.com";
    $message = "<p>Dear " . $teacher_name . ",</p></br>";
    $message .= "<p>A new tuition was posted on this platform which is related to your subject and nearby you.</p></br>";
    $message .= "<p>Thank you,</p>";
    $message .= "<p>admin</p>";
    $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
    
    // from faculty details
    $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
    $headers .= "Reply-To: " . $admin_email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    echo "Reminder email has been send to " . $email;
// }