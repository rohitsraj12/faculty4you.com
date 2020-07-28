<?php 
if(isset($_POST['login-submit'])){
    require_once '../../../private/config/db_connect.php';

    $mail_user_name = $_POST['email'];
    $password = $_POST['password'];

    if(empty($mail_user_name) || empty($password)){

        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM teachers WHERE teacher_user_name=? OR teacher_email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $mail_user_name, $mail_user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $password_check = password_verify($password, $row['user_password']);
                //$password_check = $row['user_password'];

                if($password_check == false) {
                    
                    header("Location: ../login.php?error=wrongPassword");
                    exit();
                } else if($password_check == true){
                    session_start();
                    $_SESSION["teacher_id"] = $row['id'];
                    $_SESSION["teacher_first_name"] = $row['user_name'];

                    
                    header("Location: ../index.php");
                    exit();
                } else {
                    
                    header("Location: ../login.php?error=wrongPassword");
                    exit();
                }

            } else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

} else {
    header("Location: ../login.php");
    exit();
}