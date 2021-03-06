<?php
// $selector = $_POST['selector'];
// $validator = $_POST['validator'];
// $pwd = $_POST['pwd'];
// $pwd_repeat = $_POST['pwd-repeat'];

// echo $selector . "<br/>";
// echo $validator . "<br/>";
// echo $pwd . "<br/>";
// echo $pwd_repeat . "<br/>";

if(isset($_POST['reset_password_submit'])){
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd-repeat'];

    if(empty($pwd) || empty($pwd_repeat)){
        header('Location: ../create-new-password.php?newpwd=emplty');
        exit();
    } else if($pwd != $pwd_repeat){
        header('Location: ../create-new-password.php?newpwd=pwdnotmatching');
        exit();
    } 
    
    $current_date = date("U");

    require_once '../../../private/config/db_connect.php';


    $sql = "SELECT * FROM pwd_reset WHERE pwd_reset_selector = ? AND pwd_reset_expires >= ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "there was a error1!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $current_date);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(!$row = mysqli_fetch_assoc($result)){
            echo "you need to resubmit your reset request.";
            exit();
        } else {
            $token_bin = hex2bin($validator);
            $token_check = password_verify($token_bin, $row['pwd_reset_token']);

            if($token_check === false){
                echo "you need to submit your reset request.";
                exit();
            } else if ($token_check === true) {
                $token_email = $row["pws_reset_email"];

                $sql = "SELECT * FROM teachers WHERE teacher_email = ?"; 
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "there was a error2!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $token_email);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
                        echo "there was an error.3";
                        exit();
                    } else {
                        $sql = "UPDATE teachers SET teacher_password =? WHERE teacher_email = ?";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            echo "there was a error4!";
                            exit();
                        } else {
                            $new_pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $new_pwd_hash, $token_email);
                            mysqli_stmt_execute($stmt);

                            //delete token from table
                            $sql = "DELETE FROM pwd_reset WHERE pwd_reset_email = ?";
                            $stmt = mysqli_stmt_init($conn);

                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "there was a error5!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $user_email);
                                mysqli_stmt_execute($stmt);

                                header('Location: ../login.php?newpwd=passwordupdated');
                            }
                        }
                    }
                }
            }
        }
    }


} else {
    header('location: ../login.php');
}





?>