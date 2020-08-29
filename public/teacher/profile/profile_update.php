<?php
     session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "profile update";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");

    require("../include/header.inc.php");
    // include_once'../include/banner.inc.php';
    include("../include/update.techer.profile.inc.php");

        
    $sql = "SELECT teachers.*, cities.*, states.*, subjects.*, gender.* FROM teachers 
    JOIN cities
        ON cities.city_id = teachers.city_id
    JOIN states
        ON states.state_id = teachers.state_id
    JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    JOIN gender
        ON gender.gender_id = teachers.gender_id
     WHERE teacher_user_name = '$teacher_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

?>
<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile-update">
            <div class="section-header u-center-text" >
                <heeader class="text-primary-h"> 
                    Update profile
                </header>
                
            </div>

            <div class="section-body">
                <section class="section-update-form">
                    <form action="" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return validation()">
                        <article class="mb-5" >
                            <header class="p-4 h3 bg-dark text-light m-0">
                                Personal information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border">
                        
                                <div class="form-row pt-3">
                                    <div class="form-group wrap-form col-md-6">
                                        <label for="first_name">First name</label> 
                                        <span class="error-msg"></span>
                                        <input type="text" name="first_name" class="form-control name" id="first_name" >
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" name="last_name" class="form-control name" id="last_name" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Upload image</label>
                                    <input type="file" name="file" class="form-control-file" id="photo"  value="<?php //echo $row['teacher_photo'];?>" placeholder="<?php //echo $row['teacher_photo'];?>">
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Gender</label>
                                        <div class="col-sm-8 row">

                                        <!-- 

                                            #task fetch from database
                                         -->
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input gender" name="gender" type="radio" value="1" id="male">
                                            
                                                <label class="form-check-label" for="male">
                                                    male
                                                </label>
                                            </div>

                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input gender" name="gender" type="radio" value="2" id="female">
                                            
                                                <label class="form-check-label" for="female">
                                                    female
                                                </label>
                                            </div>
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input gender" name="gender" type="radio" value="3" id="other">
                                            
                                                <label class="form-check-label" for="other">
                                                    other
                                                </label>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </fieldset>
                        
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control email" id="email" value="<?php //echo $row['teacher_email']; ?>" placeholder="<?php //echo $row['teacher_email']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <input type="text" name="phone" class="form-control phone" id="phone" value="<?php //echo $row['teacher_phone']; ?>" placeholder="<?php //echo $row['teacher_phone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?php //echo $row['teacher_address']; ?>" placeholder="<?php //echo $row['teacher_address']; ?>">
                                </div>
                                
                                <div class="form-row">
                                    
                                    
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <select id="state" name="city" class="form-control city">
                                            <option selected value="nooption">Choose city</option>
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
                                        <select id="state" name="state" class="form-control state">
                                            <option value="nooption" selected>Choose state</option>
                                            <?php 
                                                $state_query = "SELECT * FROM states ORDER BY state_name ASC";
                                                $state_result = mysqli_query($conn, $state_query);

                                                while($row = mysqli_fetch_assoc($state_result)){
                                            ?>
                                            <option value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-md-2">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $row['student_city_pincode'];?>" placeholder="<?php echo $row['student_city_pincode'];?>">
                                    </div> -->
                                </div>
                                                  
                            </div>
                        </article>
                        <article >
                            <header class="p-4 h3 bg-dark text-light m-0">
                                Professional information
                            </header>
                            <div class="py-4 px-5 text-dark bg-light border mb-5">
                            <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Category</label>
                                        <div class="col-sm-8 row">
                                            <div class="form-check col-sm-2">
                                                <input class="form-check-input category" name="category" type="radio" value="1" id="academic">
                                            <!-- 
                                                    #task fetch from database
 
                                             -->
                                                <label class="form-check-label" for="academic">
                                                    Academic
                                                </label>
                                            </div>

                                            <div class="form-check col-sm-4">
                                                <input class="form-check-input category" name="category" type="radio" value="2" id="non-academic">
                                            
                                                <label class="form-check-label" for="non-academic">
                                                    Non-academic
                                                </label>
                                            </div>
                                           
                                          
                                        </div>
                                    </div>
                                </fieldset>
                        
                                <div class="form-row pt-3 mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="teaching_exp">Teaching experience</label>
                                        <input type="text" name="exp" class="form-control experience" id="teaching_exp" value="<?php //echo $row['teacher_experience']?>" placeholder="<?php //echo $row['teacher_experience']?> Years of experience">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sub_id">Academic subjects</label>
                                        <select id="state" name="subject" class="form-control subject">
                                            <option selected value="nooption">Choose your subject</option>
                                            <?php 
                                                $city_query = "SELECT * FROM subjects ORDER BY sub_name ASC";
                                                $city_result = mysqli_query($conn, $city_query);

                                                while($row = mysqli_fetch_assoc($city_result)){
                                            ?>
                                            <option value="<?php echo $row["subject_id"];?>"><?php echo $row["sub_name"];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <fieldset class="form-group">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">teaching type</label>
                                        
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="online_one" name="single">
                                            
                                                <label class="form-check-label" for="online_one">
                                                    online one to one tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="online_group" name="group">
                                            
                                                <label class="form-check-label" for="online_group">
                                                    online group tuition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="home_tution" name="home">
                                            
                                                <label class="form-check-label" for="home_tution">
                                                    home tuition
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset> -->
                                <div class="form-group">
                                    <label for="about">About me</label>
                                    <textarea name="about_me" class="form-control about" id="about" value="<?php //echo $row["teacher_about_me"];?>" placeholder="<?php //echo $row["teacher_about_me"];?>"></textarea>
                                    
                                </div>

                            </div>

                            <input type="submit" class="w-100 button-primary text-center" name="update" >
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












