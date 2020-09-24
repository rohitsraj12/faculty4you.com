<?php

require_once('../../../private/config/db_connect.php');

session_start();
//back function false
if(!isset($_SESSION['user_name'])){
    header('location: login.php');
}

$user_name = $_SESSION['user_name'];
$user_query = "SELECT * FROM teachers WHERE teacher_user_name = '$user_name'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$teacher_id = $user_row['teacher_id'];
$teacher_name = $user_row['teacher_first_name'] . " " . $user_row['teacher_last_name'];
$teacher_email = $user_row['teacher_email'];
$teacher_phone = $user_row['teacher_phone'];

    if(isset($_POST["token_update"])){
        $update_token = $_POST['token'];
        $student = $_POST['student'];
        $student_name = $_POST['student_name'];
        $student_phone = $_POST['student_phone'];
        $student_email = $_POST['student_email'];
        $post = $_POST['post'];
        $admin_email = "admin@facultyforyou.com";


        $update_query = "UPDATE memberships SET 
            member_token = '$update_token'
            WHERE membership_id = $teacher_id" ;

        $update_member = mysqli_query($conn, $update_query);

        // send email to teacher
        $to = $teacher_email;
        $subject = "You have selected " . $student_name . " profile | facultyforyou.com";
        $message = "<p>Dear " . $teacher_name . ",</p></br>";
        $message .= "<p>You have selected the student of the following details. These details will be hiding up to 48 hours from the student posts list. Please contact and finalize the tuition contract within this period of time. Otherwise, it will be again appear in the student posts. If both of you agree with this contract, request that student to remove their post from the list.</p></br>";
        $message .= "<h4>Student Details: </h4>";
        $message .= "<p>student Name: " . $student_name . ".</p></br>";
        $message .= "<p>student email id: " . $student_email . ".</p></br>";
        $message .= "<p>student phone Number: " . $student_phone . ".</p></br>";
        $message .= "<p>Thank you,</p>";
        $message .= "<p>admin</p>";
        $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
        
        $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
        $headers .= "Reply-To: " . $admin_email . "\r\n";
        $headers .= "Content-type: text/html\r\n";
    
        mail($to, $subject, $message, $headers);


        // send email to student
          $to = $student_email;
          $subject = "Your post has been viewed by tutor | facultyforyou.com";
          $message = "<p>Dear " . $student_name . ",</p></br>";
          $message .= "<p>A tutor of the following details is agreed to teach you. He / She will contact you by a call or e-mail otherwise you can contact him / her. Your post will be hiding up to 48 hours from the list. Please finalize the tuition contract within this period of time. If you both agree to start the tuition, remove your post from the list. If you do not remove the post, other tutors will approach you again and again. Please cooperate with us and delete the post without fail.</p>";
          $message .= "<h4>Tutor Details: </h4>";
          $message .= "<p>teacher Name: " . $teacher_name . ".</p></br>";
          $message .= "<p>teacher email id: " . $teacher_email . ".</p></br>";
          $message .= "<p>teacher phone Number: " . $teacher_phone . ".</p></br>";
          $message .= "<p>Thank you.,</p>";
          $message .= "<p>Admin</p>";
          $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
           
          $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
          $headers .= "Reply-To: " . $admin_email . "\r\n";  
          $headers .= "Content-type: text/html\r\n";
          
          mail($to, $subject, $message, $headers);

        header("location:../student_detail.php?id=" . $post);
    }
    ?>
    