<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    } 
    include_once("../../../../private/config/db_connect.php");
    include_once("../../../../private/config/config.php");

    $student_name = $_SESSION['user_name'];
    $student_query = "SELECT std.*, cities.* FROM std
            LEFT JOIN cities
                ON cities.city_id = std.city_id 
    WHERE student_user_name = '$student_name'";
    $student_result = mysqli_query($conn, $student_query);
    $student_row = mysqli_fetch_assoc($student_result);

    $student_user_name = $student_row['student_user_name'];
    $student_name = $student_row['student_first_name'] . " " . $student_row['student_last_name'];
    $student_email = $student_row['student_email'];
    $student_phone = $student_row['student_phone'];
    $student_city = $student_row['city_name'];

    $teacher_id = $_GET['non-active_member_id'];
    $teacher_query = "SELECT teacher_first_name, teacher_last_name, teacher_email FROM teachers WHERE teacher_id = $teacher_id";
    $teacher_result = mysqli_query($conn, $teacher_query);
    $teacher_row = mysqli_fetch_assoc($teacher_result);

    //admin details
    $admin_name = "Admin";
    $admin_email = "admin@facultyforyou.com";
    $admin_email = "admin@facultyforyou.com";
    $admin_logo = "<a href='http://facultyforyou.com/'><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></a>";

    $teacher_name = $teacher_row['teacher_first_name'] . " " . $teacher_row['teacher_last_name'];
    $teacher_email = $teacher_row['teacher_email'];
    $teacher_phone = $teacher_row['teacher_phone'];


    //send email to active member teacher
    $to = $teacher_email;
    $subject = "New student has viewd your profile | facultyforyou.com";
    $message = "<p>Dear,". $teacher_name ."</p></br>";
    $message .= "<p>Welcome to facultyforyou.com. A student of the following details has viewed your profile. Respond now before someone else is hired. </p></br>";
    // $message .= "<p>If you are intrested to see student post details, then please login facultyforyou.com and seach student user name in search field.</p>";
    $message .= "<table> <tr><th><h4>Student details</h4></th> <th></th></tr>";
    $message .= "<tr><td>Student user name: </td><td><b>" . $student_user_name . "</b></td></tr>";
    $message .= "<tr><td>Student Name: </td><td>" . $student_name . "</td></tr>";
    $message .= "<tr><td>city/town: </td><td>" . $student_city . "</td></tr>";
    $message .= "<tr><td><a href='http://facultyforyou.com/'>Contact Details</td></tr>";
    $message .= "</table>";
    $message .= "<p>Thank you.,</p>";
    $message .= "<p>Admin</p>";
    $message .= "<p>Facultyforyou.com</p>";
    $message .= "<div>". $admin_logo ."</div>";
    
    $headers = "From:  " . $admin_name . " <" . $admin_email . ">\r\n";
    $headers .= "Reply-To: " . $admin_email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header('location:../../index.php?message=successfully_send');
?>