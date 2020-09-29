<?php
session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    $page_title = "Update my Post";
    
    $banner_image = "post.svg";
    
    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/post.update.inc.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
    // require("../include/banner.inc.php");

    
    $id =  $_GET['id'];
    $query = "SELECT * FROM posts WHERE post_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>

<div class="body-container">
<main class="wrap-container">
    <header class="text-primary-h-3 pb-5 text-center">
       Update post
    </header>
    <form action="" method="post" class="bg-white p-5" onsubmit="return studentPost()">
       
        <div class="form-group mb-5 mt-4 wrap-form">
            <label for="title">Title</label>
            <span class="error-msg"></span>
            <input name="title" class="form-control title" type="text" id="title" placeholder="<?php //echo $row['post_title'];?>">
        </div>

        <div class="form-group row mb-5">
            <div class="col-sm-4">
                <label for="study_type">Study type</label>
                <span class="error-msg"></span>
                <select name="std" id="study_type" class="form-control type">
                    <option value="nooption">Select study type</option>
                    <?php 
                        $study_type = "SELECT * FROM study_types" ;
                        $result = mysqli_query($conn, $study_type);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['study_type_id']; ?>"><?php echo $row['study_type_name']; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="study_category" class="label col-form-label pt-0">Study Category</label>
                <span class="error-msg"></span>
                <select id="study_category" name="study_category" class="form-control study-category">
                    <option value="nooption">Select category</option>
                    
                </select>
            </div>
            <div class="col-sm-4">
                <label for="subject_category">Subject Category</label>
                <span class="error-msg"></span>
                <select id="subject_category" name="subject_category" class="form-control subject_category">
                    <option selected value="nooption">Choose your subject</option>
                    
                </select>
            </div>
            <div class="col-sm-4">
                <label for="subject">Subject</label>
                <span class="error-msg"></span>
                <select id="subject" name="subject" class="form-control subject">
                    <option selected value="nooption">Choose your subject</option>
                   
                </select>
            </div>
        </div>
        
        <div class="form-group wrap-form mb-5">
            <label for="about">Post details</label>
            <span class="error-msg"></span>
            <textarea name="detail"  value="<?php echo $row['post_title'];?>"  class="form-control detail" rows="10" id="about" placeholder="Briefly describe"></textarea>
            
        </div>
       
        <div class="form-row">
            <div class="">
                <input type="submit" class="button-primary" name="post_update" value="submit">

            </div>
            <!-- <div class="">
                <input type="reset" class="button-secondary" value="reset">

            </div> -->


        </div>
     </form>
</main>
    </div>

<?php 
    include("../../../private/required/public/components/agreement.php");

    require("../include/footer.inc.php");
?>