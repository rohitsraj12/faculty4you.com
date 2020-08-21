<?php 
     session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "profile update";
    $banner_image = "post.svg";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
    require("../include/update_student.inc.php");
 
    require("../include/banner.inc.php");
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
?>


<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile-update">
            <div class="section-header u-center-text" >
                <heeader class="text-primary-h text-secondary"> 
                    Update profile
                </header>
                
            </div>

            <div class="section-body">
                <section class="section-update-form">
                    <form action="" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return updateProfile()">
                        <article class="mb-5" >
                            <header class="p-4 h3 bg-dark text-light m-0">
                                Primary information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border">
                        
                                <div class="form-row pt-3">
                                    <div class="form-group col-md-6">
                                    <label for="first_name">First name</label>
                                    <input type="text" name="fname" class="form-control name" id="first_name" placeholder="<?php// echo $row['student_first_name'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" name="lname" class="form-control name" id="last_name" placeholder="<?php// echo $row['student_last_name'];?>">
                                    </div>
                                </div>

                                <div class="form-row pb-3">
                                    <div class="col-sm-6">
                                        <label for="dob">Date of birth</label>
                                        <input type="date" name="date" class="form-control dob" id="dob"  value="<?php echo $row['student_date_of_birth'];?>" placeholder="<?php echo $row['student_date_of_birth'];?>">
                                    
                                    </div>    
                                </div>

                                <div class="form-group">
                                    <label for="photo">Upload image</label>
                                    <input type="file" name="file" class="form-control-file image" id="photo"  value="<?php echo $row['student_photo'];?>" placeholder="<?php echo $row['student_photo'];?>">
                                </div>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Gender</label>
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
                            <header class="p-4 h3 bg-dark text-light m-0">
                                Contact details
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border mb-5">
                                <!-- contact info -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control email" id="email" value="<?php echo $row['student_email'];?>" placeholder="<?php echo $row['student_email'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <input type="tel" name="phone" class="form-control phone" id="phone" value="<?php echo $row['student_phone'];?>" placeholder="<?php echo $row['student_phone'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $row['student_address'];?>" id="address" placeholder="<?php echo $row['student_address'];?>">
                                </div>
                                
                                <div class="form-row">
                                    
                                    
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <select id="state" name="city" class="form-control">
                                            <option>Select city</option>
                                            <?php 
                                                $city_query = "SELECT * FROM cities ORDER BY city_name ASC";
                                                $city_result = mysqli_query($conn, $city_query);

                                                while($row = mysqli_fetch_assoc($city_result)){
                                            ?>
                                            <option value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state">State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option>Select state</option>
                                            <?php 
                                                $state_query = "SELECT * FROM states ORDER BY state_name ASC";
                                                $state_result = mysqli_query($conn, $state_query);

                                                while($row = mysqli_fetch_assoc($state_result)){
                                            ?>
                                            <option value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $row['student_city_pincode'];?>" placeholder="<?php echo $row['student_city_pincode'];?>">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Submit" class="w-100 btn btn-primary text-center" style="font-size:1.7rem" name="update">
                        </article>
                    </form>
                </section>
            </div>
        </section>
    </main>
</div>

<?php 
    require("../include/footer.inc.php");
?>