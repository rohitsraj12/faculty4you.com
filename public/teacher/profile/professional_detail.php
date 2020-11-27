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
                    <article >
                            <header class="p-4 h3 article-profile__header text-light m-0">
                                Professional information
                            </header>
                            <div class="py-4 px-5 text-dark bg-white border mb-5">
                            <div class="form-group form-row my-3">
                                <div class="col-md-4"> 
                                    <label for="study_category" class="label col-form-label pt-0 w-100">Study Category</label>
                                    <span class="error-msg"></span>
                                    <select id="study_category" name="category" class="form-control study-category">
                                        <option value="nooption">Select category</option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-4"> 
                                    <label for="subject_category" class="label col-form-label pt-0">Subject Category</label>
                                    <span class="error-msg"></span>
                                    <select id="subject_category" name="subject_category" class="form-control subject_category">
                                        <!-- <option value="nooption">Select category</option> -->
                                       
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="subject">Subject</label>
                                        <span class="error-msg"></span>
                                        <select id="subject" name="subject" class="form-control subject">
                                           
                                        </select>
                                </div>
                            </div>
                        
                                <div class="form-row pt-3 mb-3">
                                   
                                    <div class="form-group col-md-4">
                                        <label for="teaching_exp">Teaching experience</label>
                                        <span class="error-msg"></span>
                                        <input type="text" name="exp" class="form-control experience" id="teaching_exp" value="<?php echo $row['teacher_experience']?>" placeholder="<?php echo $row['teacher_experience']?> Years of experience">
                                    </div> 
                                    
                                    <div class="form-group col-md-4">
                                        <label for="teaching_charge">Teaching charges</label>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <span class="error-msg"></span>
                                                <input type="text" name="charges" class="form-control teaching-charges" id="teaching_charge" value="<?php //echo $row['teaching_charge']?>" placeholder="<?php echo $row['teaching_charge']?> ">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span class="error-msg"></span>
                                                <select name="per_time" id="" class="form-control charges-time">
                                                    <option value="nooption">Select</option>
                                                    <option value="per hour">Per Hour</option>
                                                    <option value="per month">Per Month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                   

                                <div class="form-group">
                                    <label for="about">About me</label>
                                    <span class="error-msg"></span>
                                    <textarea name="about_me" class="form-control about" id="about" value="<?php echo $row["teacher_about_me"];?>" placeholder="<?php echo $row["teacher_about_me"];?>"></textarea>
                                    
                                </div>

                            </div>
                        </article>
                        <button  type="submit" class="button-primary" name="update_professional_detail" >Submit</button> 
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