<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "Profile view";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    include("../../../private/required/public/components/social_media.php");
    $teacher_name = $_SESSION['user_name'];
    
    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
    LEFT JOIN cities
        ON cities.city_id = teachers.city_id
    LEFT JOIN states
        ON states.state_id = teachers.state_id
    LEFT JOIN gender
        ON gender.gender_id = teachers.gender_id
    LEFT JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['teacher_id'];
    $teacher_first_name = $row['teacher_first_name'];


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
    
                // echo "<script type='text/javascript'> document.location = 'index.php?message=success'; </script>";
    
                    
                    // header("location: index.php?message=success");
                    // header("location: ../registration.php");
                    // exit();
    
                    // $message = "Congratulations! You have successfully updated your profile detail.";
               
        // 
        
    
    }


    require("../include/header.inc.php");
   
?>

<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text">
                <heeader class="text-primary-h-3"> 
                    My profile
                </header>
            </div>
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="bg-light article-profil">
                        <figure>
                            <?php 

                                if($row['teacher_photo'] == ""){
                            ?>
                                    <img class="img-fluid" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                                } else {
                            ?>
                                    <img class="img-fluid" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                            <?php
                                }
                            ?>
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $row['teacher_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul>
                                <li class="text-dark h3 py-1 font-weight-normal">
                               update personal detail
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                update professional detail
                                </li>

                                <li class="text-center">
                                    <a href="<?php base_url();?>teacher/profile/profile_update.php?id=<?php echo $row['teacher_id'];?>" class="h4 button-primary">Edit profile</a>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8 section-update-form">
                    <form action="update_teacher_detail.php" method="post" class="section__form section__form-update" enctype="multipart/form-data" onsubmit="return trainerValidation()">
                        <article class="mb-5" >
                            <header class="p-4 h3 article-profile__header text-light m-0">
                                Personal information
                            </header>
                            <div class="py-4 px-5 text-dark bg-white border">
                                <div class="form-row mb-4 mt-4">
                                    <div class="form-group wrap-form col-md-6">
                                        <label for="first_name">First name</label> 
                                        <span class="error-msg"></span>
                                        <input type="text" name="first_name" class="form-control name" id="first_name" value="<?php echo $row['teacher_first_name'];?>" placeholder="<?php echo $row['teacher_first_name'];?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last name</label>
                                        <span class="error-msg"></span>
                                        <input type="text" name="last_name" class="form-control name" id="last_name"  value="<?php echo $row['teacher_last_name'];?>" placeholder="<?php echo $row['teacher_last_name'];?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group mb-4">
                                    <label for="photo">Upload image</label>
                                    <span class="error-msg"></span>
                                    <input type="file" name="file" class="form-control-file pt-0" id="photo"  value="<?php echo $row['teacher_photo'];?>" placeholder="<?php //echo $row['teacher_photo'];?>">
                                </div> -->
                                <fieldset class="form-group mb-4">
                                    <div class="row">
                                        <label class="label col-form-label col-sm-2 pt-0">Gender</label>
                
                                        <div class="col-sm-8 row">
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
                                        <input type="email" name="email" class="form-control email" id="email" value="<?php echo $row['teacher_email']; ?>" placeholder="<?php echo $row['teacher_email']; ?>">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="phone">Telephone</label>
                                        <span class="error-msg"></span>
                                        <input type="text" name="phone" class="form-control phone" id="phone" value="<?php echo $row['teacher_phone']; ?>" placeholder="<?php echo $row['teacher_phone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="<?php echo $row['teacher_address']; ?>" placeholder="<?php echo $row['teacher_address']; ?>">
                                </div>
                                
                                <div class="form-row mb-4">
                                    
                                    <div class="form-group col-md-4">
                                        <label for="state">State</label>
                                        <span class="error-msg"></span>
                                        <select id="state" name="state" class="form-control state">
                                            <option value="nooption">Select category</option>
                                            <option value="<?php echo $row['state_id'];?>" selected><?php echo $row['state_name'];?></option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="city">City/Town</label>
                                        <span class="error-msg"></span>                                        
                                        <div class="form-field">
                                            <input type="text" name="" id="city" value="<?php echo $row['city_name'];?>" class="form-control city_name">
                                            <input type="hidden" name="city" value="<?php echo $row['city_id'];?>" class="hidden_filed">
                                            <div class="city_list" id="city_list"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $row['city_pincode'];?>" placeholder="<?php echo $row['city_pincode'];?>">
                                    </div>
                                </div>                                                    
                            </div>
                        </article>
                        <button  type="submit" class="button-primary" name="update_personal_detail" >Submit</button> 
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