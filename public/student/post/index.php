<?php

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "post";
    
    $banner_image = "post.svg";
    
    require("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    include("../../../private/required/public/components/social_media.php");
    require("../include/header.inc.php");
    
        // require("../include/banner.inc.php");
        

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


    include('../include/compose_post.inc.php');
                               
    ?>
       
    <div class="body-container">
        <main class="post__page">
            <section class="wrap-container">

                <section class="row section__post">
                    <div class="col-sm-3">
                        <div class="tab post-tab" >
                            <button class="tablinks active" data-post="view__post">View My Post</button>
                            <button class="tablinks" data-post="compose__post">Compose New Post</button>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <section  class="view__post post__cat" id="viewPost">
                            
                            <header class="text-primary-h-3 text-center pb-5 mb-5" >
                                View my past posts
                            </header>
                            <?php 

                                $student_id = $row['student_id'];
                                $query = "SELECT posts.*, study_types.study_type_name, study_categories.study_cat_type 
                                            FROM posts
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.category_id = posts.category_id
                                            WHERE student_id = $student_id
                                            ORDER BY post_id DESC";

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){

                            ?>
                                    <article class="post-sections post-sections-6" >
                                        <header class="post-header-6">
                                            <h1 class="">
                                                <?php echo $row["post_title"];?>
                                            </h1>
                                        </header>
                                        <div class="post-body mb-4">
                                            <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                <!-- <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php// echo $row["city_name"];?></li> -->
                                            </ul>
                                        <p class="text-dark">
                                            <?php echo $row["post_detail"];?>
                                        </p>
                                        </div>
                                        <footer class="post-footer pb-3">
                                            <a href="<?php base_url();?>student/post/update.php?id=<?php echo $row['post_id'];?>"class="text-link-1 text-primary">Edit post</a>
                                        </footer>
                                    </article>
                                        
                            <?php
                                }
                            ?>
                        </section>
                        <section  class="compose__post post__cat" id="composePost">
                            <div class="section-profile-update">
                                <header class="text-primary-h-3 text-center pb-5 mb-5" >
                                    Compose new post
                                </header>
                                
                                <form action="" method="post" class="bg-light border py-5 px-5" onsubmit="return studentPost()">
                                    <div class="form-group wrap-form">
                                        <label for="title">Title</label>
                                        <span class="error-msg"></span>
                                        <input name="post_title" class="form-control title" type="text" id="title" placeholder="title">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 wrap-form"> 
                                            <label for="study_category" >Category</label>
                                            <span class="error-msg"></span>
                                            <select id="study_category" name="category" class="form-control category">
                                                <option value="nooption">Select category</option>
                                                <?php 
                                                    $cat_query = "SELECT * FROM study_categories ORDER BY study_cat_type ASC";
                                                    $cat_result = mysqli_query($conn, $cat_query);

                                                    while($row = mysqli_fetch_assoc($cat_result)){
                                                ?>
                                                <option value="<?php echo $row["category_id"];?>"><?php echo $row["study_cat_type"];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 wrap-form">
                                            <label for="sub_id">Academic subjects</label>
                                            <span class="error-msg"></span>
                                            <select id="sub_id" name="subject" class="form-control subject">
                                                <option selected value="nooption">Choose your subject</option>
                                                <?php 
                                                    $subject_query = "SELECT * FROM subjects ORDER BY sub_name ASC";
                                                    $subject_result = mysqli_query($conn, $subject_query);

                                                    while($row = mysqli_fetch_assoc($subject_result)){
                                                ?>
                                                <option value="<?php echo $row["subject_id"];?>"><?php echo $row["sub_name"];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row wrap-form mb-5">
                                        <div class="col-sm-6">
                                            <label for="study_type">Study type</label>
                                            <span class="error-msg"></span>
                                            <select name="study_type" id="study_type" class="form-control type">
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
                                    </div>
                                    
                                    <div class="form-group wrap-form">
                                        <label for="about">Detail requirements</label>
                                        <span class="error-msg"></span>
                                        <textarea name="post_detail" class="form-control detail" rows="10" id="about" placeholder="Briefly explain about yourself"></textarea>
                                        
                                    </div>
                                 
                                    <div class="">
                                        <input type="submit" class="button-primary" name="submit-post" value="submit">
                                        <input type="reset"  style="font-size: 1.6rem;" class="btn btn-lg  btn btn-outline-secondary" value="reset">

                                    </div>
                                    
                                </form>
                            </div>
                        </section>             
                    </div>
                </section>
            </section>
        </main>

    </div>



<?php 
    require("../include/footer.inc.php");
?>