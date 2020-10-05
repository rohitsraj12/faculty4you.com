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

    $sql = "SELECT std.*, cities.*, states.*, gender.* FROM std 
    JOIN cities
        ON cities.city_id = std.city_id
    JOIN states
        ON states.state_id = std.state_id
    JOIN gender
        ON gender.gender_id = std.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

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
                                    <input type="text" name="fname" class="form-control name" id="first_name" placeholder="<?php //echo $row['student_first_name'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="lname" class="form-control name" id="last_name" placeholder="<?php //echo $row['student_last_name'];?>">
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="col-sm-6">
                                        <label for="dob">Date of birth</label>
                                        <span class="error-msg"></span>
                                        <input type="date" name="date" class="form-control dob" id="dob"  value="<?php echo $row['student_date_of_birth'];?>" placeholder="<?php echo $row['student_date_of_birth'];?>">
                                    
                                    </div>    
                                </div>

                                <div class="form-group mb-4">
                                    <label for="photo">Upload image</label>
                                    <span class="error-msg"></span>
                                    <input type="file" name="file" class="form-control-file image pt-0" id="photo"  value="<?php echo $row['student_photo'];?>" placeholder="<?php echo $row['student_photo'];?>">
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
                        </article>
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
                                    <input type="email" name="email" class="form-control email" id="email" value="<?php echo $row['student_email'];?>" placeholder="<?php echo $row['student_email'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <span class="error-msg"></span>
                                    <input type="tel" name="phone" class="form-control phone" id="phone" value="<?php echo $row['student_phone'];?>" placeholder="<?php echo $row['student_phone'];?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $row['student_address'];?>" id="address" placeholder="<?php echo $row['student_address'];?>">
                                </div>
                                
                                <div class="form-row mb-4">
                                    
                                    
                                <div class="form-group mb-4 col-md-4">
                                        <label for="state">State</label>
                                        <span class="error-msg"></span>
                                        <select id="state" name="state" id="state" class="form-control state">
                                            <option value="nooption">Select state</option>
                                           
                                                
                                           
                                        </select>
                                    </div>
                                    <div class="form-group mb-4 col-md-4">
                                        <label for="city">City/Town</label>
                                        <span class="error-msg"></span>
                                        <!-- <select id="state" name="city" id="city" class="form-control city">
                                        </select> -->
                                        <div class="form-field">
                                            <input type="text" name="" id="city" value="" class="form-control city_name">
                                            <input type="hidden" name="city" value="0" class="hidden_filed">
                                            <div class="city_list" id="city_list"></div>
                                        </div>
                                        

                                    </div>
                                    <div class="form-group mb-4 col-md-4">
                                        <label for="pincode">Pincode</label>
                                        <span class="error-msg"></span>
                                        <input type="text" name="pincode" class="form-control pincode" id="pincode" value="<?php echo $row['student_city_pincode'];?>" placeholder="<?php echo $row['student_city_pincode'];?>">
                                    </div>
                                </div>
                            </div>  
                        </article>
                            <button type="submit" class="button-primary" name="update">Submit</button>
                      
                        
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