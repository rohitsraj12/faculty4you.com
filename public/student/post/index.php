<?php

    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "View post";
    
    require_once("../../../private/config/db_connect.php");
    require_once("../../../private/config/config.php");
    include_once("../../../private/required/public/components/social_media.php");
    require_once("../include/header.inc.php");        

    


    include('../include/compose_post.inc.php');
    
    if(!empty($_GET['message'])){
        // $message = $_GET['message'];
        $message = "Congratulations! You have successfully updated your post.";
    ?>
        <div class="alert alert-success m-0" role="alert">
            <div class="wrap-container h3 py-4">
                <?php echo $message;?>
            </div>
        </div>
    
    <?php
    
    } else if(!empty($message)){
    ?>
    
        <div class="alert alert-success m-0" role="alert">
            <div class="wrap-container h3 py-4">
                <?php echo $message;?>
            </div>
        </div>

    <?php
    } else if(!empty($_GET['delete'])){
        $message = "Congratulations! You have successfully deleted your post.";

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
                        <section  class="all view__post post__cat" id="viewPost">
                            
                            <header class="text-primary-h-3 text-center pb-5 mb-5" >
                                View my past posts
                            </header>
                            <?php 

                                $student_id = $row['student_id'];
                                $query = "SELECT posts.*, subjects_categories.*, subjects.*, study_types.*, study_categories.* 
                                            FROM posts
                                            JOIN subjects_categories
                                                ON subjects_categories.sub_cat_id = posts.sub_cat_id
                                            JOIN subjects
                                                ON subjects.subject_id = posts.subject_id
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.study_cat_id = posts.study_cat_id
                                            WHERE student_id = $student_id AND post_state = 1
                                            ORDER BY post_id DESC";

                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($result)){

                            ?>
                                    <article class="post-sections" >
                                        <header class="post-header">
                                            <h1 class="">
                                                <?php echo $row["post_title"];?>
                                            </h1>
                                        </header>
                                        <div class="post-body mb-4">
                                            <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                <li class="mr-5"><i class="fa fa-hand-o-right mr-2" aria-hidden="true"></i><?php echo $row["sub_cat_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                            </ul>
                                        <p class="text-dark">
                                            <?php echo $row["post_detail"];?>
                                        </p>
                                        </div>
                                        <footer class="post-footer pb-5 ">
                                            <a href="<?php base_url();?>student/post/update.php?id=<?php echo $row['post_id'];?>"class="button__link-primary">Edit post</a>
                                            <a href="<?php base_url();?>student/include/delete_post.php?id=<?php echo $row['post_id'];?>"class="button__link-primary ml-5">Delete post</a>
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
                                
                                <form action="" method="post" class="bg-white border py-5 px-5" onsubmit="return studentPost()">
                                    <div class="form-group wrap-form">
                                        <label for="title">Title</label>
                                        <span class="error-msg"></span>
                                        <input name="post_title" class="form-control title" type="text" id="title" placeholder="title">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 wrap-form">
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
                                        <div class="col-sm-6 wrap-form"> 
                                            <label for="study_category" >Study Category</label>
                                            <span class="error-msg"></span>
                                            <select id="study_category" name="study_category" class="form-control study-category">
                                                <option value="nooption">Select category</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row wrap-form mb-5">
                                        <div class="col-sm-6 wrap-form">
                                            <label for="subject_category">Subject Category</label>
                                            <span class="error-msg"></span>
                                            <select id="subject_category" name="subject_category" class="form-control subject_category">
                                               
                                            </select>
                                        </div>
                                        <div class="col-sm-6 wrap-form">
                                            <label for="subject">Subject</label>
                                            <span class="error-msg"></span>
                                            <select id="subject" name="subject" class="form-control subject">
                                               
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group wrap-form">
                                        <label for="about">Detail requirements</label>
                                        <span class="error-msg"></span>
                                        <textarea name="post_detail" class="form-control detail" rows="10" id="about" placeholder="Briefly explain about yourself"></textarea>
                                        
                                    </div>
                                 
                                    <div class="">
                                        <input type="submit" class="button-primary" name="submit-post" value="Submit">
                                        <!-- <input type="reset"  style="font-size: 1.6rem;" class="btn btn-lg  btn btn-outline-secondary" value="Reset"> -->

                                    </div>
                                    
                                </form>
                            </div>
                        </section>             
                    </div>
                </section>
                <!-- end section post -->
            </section>
        </main>

    </div>



<?php 
    include("../../../private/required/public/components/agreement.php");

    require("../include/footer.inc.php");
?>