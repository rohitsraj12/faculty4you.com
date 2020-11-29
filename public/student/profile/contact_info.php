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

    $sql = "SELECT students.*, cities.*, states.*, gender.* FROM students 
    JOIN cities
        ON cities.city_id = students.city_id
    JOIN states
        ON states.state_id = students.state_id
    JOIN gender
        ON gender.gender_id = students.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM students WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $id = $row['student_id'];
    $email = $row['student_email'];
    $phone = $row['student_phone'];
    $address = $row['student_address'];
    $pin_code = $row['city_pincode'];
    $city_name = $row['city_name'];
    $city_id = $row['city_id'];


    // if(isset($_POST['update_contact_info'])){
    //     $email =  $_POST['email'];
    //     $id = $row['student_id'];
    //     $phone =  $_POST['phone'];
    //     $address =  $_POST['address'];
    //     $city =  $_POST['city'];    
    //     $state =  $_POST['state'];
    //     $pincode =  $_POST['pincode'];
    
    //     //  accesing file details
    //            $query = "UPDATE students SET 
    //             student_email = '$email', 
    //             student_phone = '$phone', 
    //             student_address = '$address', 
    //             city_id = '$city', 
    //             state_id = '$state', 
    //             city_pincode = '$pincode'
    //             WHERE student_id=$id"; 
    
    //             $_result = mysqli_query($conn, $query);
    
    //             header("location:index.php?message=success")
    // }
    
    // echo "hi " . $pin_code;
    
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
                    <form action="update_student_contact_details.php" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return studentValidation()">
                        
                    <article >
                            <header class="article-profile__header p-4 h3 bg-dark text-light m-0">
                                Contact details
                            </header>
                            <div class="py-4 px-5 text-dark bg-white border mb-5">
                                <!-- contact info -->
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="email" class="form-control email" id="email" value="<?php echo $email;?>" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <span class="error-msg"></span>
                                    <input type="tel" name="phone" class="form-control phone" id="phone" value="<?php echo $phone?>" placeholder="<?php echo $row['student_phone'];?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address;?>" id="address" placeholder="<?php echo $row['student_address'];?>">
                                </div>
                                
                                <div class="form-row mb-4">
                                    
                                    <div class="form-group mb-4 col-md-4">
                                        <label for="city">City/Town</label>
                                        <!-- <select id="state" name="city" id="city" class="form-control city">
                                        </select> -->
                                        <div class="form-field">
                                            <input type="text" name="" id="city" value="<?php echo $row['city_name'];?>" class="form-control city_name">
                                            <input type="hidden" name="city" value="<?php echo $row['city_id'];?>" class="hidden_filed">
                                            <div class="city_list" id="city_list"></div>
                                        </div>
                                        

                                    </div>
                                    
                                <div class="form-group mb-4 col-md-4">
                                        <label for="state">State</label>
                                        <span class="error-msg"></span>
                                        <select id="state" name="state" id="state" class="form-control state">
                                            <option value="nooption">Select state</option>
                                           
                                                
                                           
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-md-4">
                                        <label for="pincode">Pincode</label>
                                        <span class="error-msg"></span>
                                        <input type="text" name="pincode" class="form-control pincode" id="pincode" value="<?php echo $pin_code;?>" placeholder="<?php echo $pin_code;?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id;?>" placeholder="<?php echo $id;?>">

                        </article>
                            <input type="submit" class="button-primary" name="update_contact_info">
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

