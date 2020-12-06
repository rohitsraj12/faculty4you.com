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
        $cat = $_POST['category'];
        $exp = $_POST['exp'];
        $sub = $_POST['subject'];
        $sub_cat = $_POST['subject_category'];
        $about = $_POST['about_me'];
        $charges = $_POST['charges']. " " . $_POST['per_time'];
        
        $query = "UPDATE teachers SET study_cat_id = '$cat',
        sub_cat_id = '$sub_cat',
        subject_id = $sub,
        teacher_experience = '$exp',
        teacher_about_me = '$about', 
        teaching_charge = '$charges'  WHERE teacher_id=$id"; 
    
        $result = mysqli_query($conn, $query);
        echo "<script type='text/javascript'> document.location = 'index.php?message=success'; </script>";
        
        // header("location:index.php?message=success");
        // header("location: ../registration.php");
        // exit();
    
                // $message = "Congratulations! You have successfully updated your profile detail.";
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
                        
                        <article>
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
                                        <input type="text" name="exp" class="form-control experience" id="teaching_exp" value="<?php //echo $row['teacher_experience']?>" placeholder="<?php //echo $row['teacher_experience']?> Years of experience">
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="teaching_charge">Teaching charges</label>
                                        <span class="error-msg"></span>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="charges" class="form-control teaching-charges" id="teaching_charge" value="<?php //echo $row['teacher_experience']?>" placeholder="<?php //echo $row['teacher_experience']?>charges">
                                            </div>
                                            <div class="col-6">
                                                <select name="per_time" id="" class="form-control">
                                                    <option value="per hour">Per hour</option>
                                                    <option value="per month">Per month</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label for="about">About me</label>
                                    <span class="error-msg"></span>
                                    <textarea name="about_me" class="form-control about" id="about" value="<?php //echo $row["teacher_about_me"];?>" placeholder="<?php //echo $row["teacher_about_me"];?>"></textarea>
                                    
                                </div>
                                <!-- <input type="hidden" name="id" value="<?php echo $teacher_id;?>"> -->
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