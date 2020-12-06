<?php 
     session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "Profile update";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/update_student.inc.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
 
    $student_name = $_SESSION['user_name'];

    $sql = "SELECT * FROM students WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM students WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['student_id'];
    $uname= $row['student_user_name'];

    // echo "sdssd" . $student_name;
    // $email = $row['student_email'];
    // $phone = $row['student_phone'];
    // $address = $row['student_address'];
    // $pin_code = $row['city_pincode'];
    // $city_name = $row['city_name'];
    // $city_id = $row['city_id'];


    // echo "hi " . $pin_code;

 
//  require_once("../../../private/config/db_connect.php");
//  require("../../../private/config/config.php");

if(isset($_POST['update_personal_info'])){
    $id = $_GET['id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['date'];

    // echo 'id is ' . $id . " " . $first_name ." " . $last_name . " " . $gender . " " . $dob;

            $query = "UPDATE students SET student_first_name = '$first_name',
            student_last_name = '$last_name',
            gender_id = $gender,
            
            student_date_of_birth = '$dob' WHERE student_id=$id"; 

            $result = mysqli_query($conn, $query);

            echo "<script type='text/javascript'> document.location = 'index.php?message=success'; </script>";

            // header("location: index.php?message=success");

        // $message = "Congratulations! You have successfully updated your profile detail.";
        


}
    
    if(!empty($message)){
?>
<div class="alert alert-success m-0" role="alert">
    <div class="wrap-container h3 py-4">
        <?php echo $message;?>
    </div>
</div>

<?php
    }
?>


<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile-update">
            <div class="section-header u-center-text" >
                <heeader class="text-primary-h-3"> 
                    Update profile
                </header>
            </div>

            <div class="section-body">
                <section class="section-update-form">
                    <form action="" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return studentValidation()">
                        <article class="mb-5" >
                            <header class="article-profile__header p-4 h3 bg-dark text-light m-0">
                                Primary information
                            </header>
                            <div class="py-4 px-5 text-dark bg-white border">
                        
                                <div class="form-row mb-4 mt-4">
                                    <div class="form-group col-md-6">
                                    <label for="first_name">First name</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="fname" class="form-control name" id="first_name" placeholder="Enter your first name">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="lname" class="form-control name" id="last_name" placeholder="Enter your last name">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col-sm-6">
                                        <label for="dob">Date of birth</label>
                                        <span class="error-msg"></span>
                                        <input type="date" name="date" class="form-control dob" id="dob">
                                    </div>    
                                </div>

                                <fieldset class="form-group mb-4">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Gender</label>
                                        <span class="error-msg"></span>
                                        <div class="col-sm-8 row">
                                            

                                            <?php
                                                $gender_query = "SELECT * FROM gender ORDER BY gender_id ASC";
                                                $gender_result = mysqli_query($conn, $gender_query);

                                                while($row = mysqli_fetch_assoc($gender_result)){
                                                    ?>
                                                        <div class="form-check col-sm-2">
                                                            <input class="form-check-input gender" name="gender" type="radio" value="<?php echo $row['gender_id'];?>" id="<?php echo $row['gender_type'];?>">
                                                        
                                                            <label class="form-check-label" for="<?php echo $row['gender_type'];?>">
                                                                <?php echo $row['gender_type'];?>
                                                            </label>
                                                        </div>        
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </fieldset>
                                                  
                            </div>
                            <input type="hidden" name="id" value="<?php echo $student_name;?>">
                        </article>
                        <button type="submit" class="button-primary" name="update_personal_info">Submit</button>
                        <a href="update_student_personal_details.php?id=<?php echo $id;?>"></a>
                    </form>
                </section>
            </div>
        </section>
    </main>
</div>

<?php 
    include("../../../private/required/public/components/agreement.php");

    require("../include/footer.inc.php");
?>

