<?php 


// session_start();
// //back function false
// if(!isset($_SESSION['user_name'])){
//     header('location: login.php');
// }
require_once('../../../private/config/db_connect.php');

$student_name = $_SESSION['user_name'];
$sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit-post'])){

    // fill empty data
    $student_id = $row['student_id'];
    $post_title = $_POST['post_title'];
    $post_detail = $_POST['post_detail'];
    $study_type = $_POST['study_type'];
    $study_category = $_POST['study_category'];
    $subject_category = $_POST['subject_category'];
    $subject = $_POST['subject'];
    $city = $row['city_id'];
    $state = $row['state_id'];
    $post_date = date("Y/m/d");
    $post_state = 1;
    $block_date = date("Y-m-d h:i:s");
    // $block_post = "";

    // echo $student_id . " - " .$post_title;
    // if empty field condition
    
    // // echo $post_title;
    $sql = "INSERT INTO `posts` (`student_id`, `post_title`, `post_detail`, `study_type_id`, `study_cat_id`, `category_id`, `subject_id`, `city_id`, `state_id`, `post_date`, `post_state`, `block_date`) 
     VALUES ('$student_id', '$post_title', '$post_detail', '$study_type', '$study_category', '$subject_category', '$subject', '$city', '$state', '$post_date', '$post_state', '$block_date')";

    $result = mysqli_query($conn, $sql);

    $message = "Congratulations! You have successfully posted your requirement.";

    // header("Location: ../post/index.php?register=success");


//         // exit();
    
//         if(!$result){
//             die("failed query". mysqli_error($conn));
//         }

} 
//else {
//      // redirect to register and empty field
//      //header("location: index.php");
//      //stop scripting
//      exit();
// }

?>
