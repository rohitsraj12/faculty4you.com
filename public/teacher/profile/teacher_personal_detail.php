<?php
     session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "Profile update";
    
    require_once("../../../private/config/db_connect.php");
    require_once("../../../private/config/config.php");
    include("../include/update.techer.profile.inc.php");
    include("../../../private/required/public/components/social_media.php");

    require("../include/header.inc.php");

    $teacher_name = $_SESSION['user_name'];
        
    $sql = "SELECT teachers.*, cities.*, states.*, subjects.*, gender.*, study_categories.* FROM teachers 
    JOIN cities
        ON cities.city_id = teachers.city_id
    JOIN states
        ON states.state_id = teachers.state_id
    JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    JOIN gender
        ON gender.gender_id = teachers.gender_id
    JOIN study_categories
        ON study_categories.study_cat_id = teachers.study_cat_id
     WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['teacher_id'];

    if(isset($_POST['update'])){
        
        $id = $_GET['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
       
              
        $query = "UPDATE teachers SET teacher_first_name = '$first_name',
        teacher_last_name = '$last_name',
        gender_id = $gender,
        teacher_phone = '$phone',
        teacher_address = '$address',
        city_id = $city,
        state_id = $state,
        city_pincode = $pincode  WHERE teacher_id=$id"; 

        $result = mysqli_query($conn, $query);

    echo "<script type='text/javascript'> document.location = 'index.php?message=success'; </script>";

        
        // header("location: index.php?message=success");
        // header("location: ../registration.php");
        // exit();

        // $message = "Congratulations! You have successfully updated your profile detail.";
    
// 
        
    
    }

    if(!empty($_GET['message'])){
        $message = "Congratulations! You have successfully updated your profile.";
        
?>
<div class="alert alert-success m-0" role="alert">
    <div class="wrap-container h3 py-4">

        <?php 
        
        echo $message;
            // header('location: index.php');
        ?>
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
                    <form action="" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return trainerValidation()">
                        <article class="mb-5" >
                            <header class="p-4 h3 article-profile__header text-light m-0">
                                Personal information
                            </header>
                            <div class="py-4 px-5 text-dark bg-white border">
                        
                                <div class="form-row mb-4 mt-4">
                                    <div class="form-group wrap-form col-md-6">
                                        <label for="first_name">First name</label> 
                                        <span class="error-msg"></span>
                                        <input type="text" name="first_name" class="form-control name" id="first_name" value="<?php //echo $row['teacher_first_name'];?>" placeholder="<?php echo $row['teacher_first_name'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="last_name" class="form-control name" id="last_name"  value="<?php //echo $row['teacher_last_name'];?>" placeholder="<?php echo $row['teacher_last_name'];?>">
                                    </div>
                                </div>
                                <fieldset class="form-group mb-4">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Gender</label>
                
                                        <div class="col-sm-8 row">

                                        <!-- 

                                            #task fetch from database
                                         -->
                                            <div class="form-check col-sm-2">
                                                <span class="error-msg"></span>
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
                                <div class="form-row mb-4">
                                    <!-- <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <span class="error-msg"></span>
                                    <input type="email" name="email" class="form-control email" id="email" value="<?php //echo $row['teacher_email']; ?>" placeholder="<?php echo $row['teacher_email']; ?>">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                    <label for="phone">Telephone</label>
                                    <span class="error-msg"></span>
                                    <input type="text" name="phone" class="form-control phone" id="phone" value="<?php //echo $row['teacher_phone']; ?>" placeholder="<?php echo $row['teacher_phone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?php //echo $row['teacher_address']; ?>" placeholder="<?php echo $row['teacher_address']; ?>">
                                </div>
                                
                                <div class="form-row mb-4">
                                    
                                    <div class="form-group col-md-4">
                                        <label for="state">State</label>
                                        <span class="error-msg"></span>
                                        <select id="state" name="state" class="form-control state">
                                            <option value="nooption">Select category</option>
                                            <option value="<?php //echo $row['state_id'];?>" selected><?php echo $row['state_name'];?></option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="city">City/Town</label>
                                        <span class="error-msg"></span>
                                        <!-- <select id="state" name="city" class="form-control city">
                                           
                                        </select> -->
                                        
                                        <div class="form-field">
                                            <input type="text" name="" id="city" value="<?php echo $row['city_name'];?>" class="form-control city_name">
                                            <input type="hidden" name="city" value="<?php echo $row['city_id'];?>" class="hidden_filed">
                                            <div class="city_list" id="city_list"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" name="pincode" class="form-control" id="pincode" value="<?php //echo $row['city_pincode'];?>" placeholder="<?php echo $row['city_pincode'];?>">
                                    </div>
                     
                                </div>

                                <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">

                                                
                            </div>
                        </article>
                          
                        <button  type="submit" class="button-primary" name="update" >Submit</button> 
                    
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