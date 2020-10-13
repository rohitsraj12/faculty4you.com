<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }


    $page_title = "Student's post details";
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include('include/header.inc.php');
    
    $teacher_subject = $user_row['subject_id'];
    // echo $teacher_subject;
?>

<div class="body-container">

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text"  >
                <heeader class="text-primary-h-3"> 
                    Student details
                </header>
            </div>
        
<?php
    if(isset($_POST['search_student_profile'])){
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name_search']);


        $home_sql = "SELECT posts.*, subjects.*, students.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
            FROM posts
                JOIN students
                    ON students.student_id = posts.student_id
                JOIN cities
                    ON cities.city_id = posts.city_id
                JOIN states
                    ON states.state_id = posts.state_id
                JOIN study_types
                    ON study_types.study_type_id = posts.study_type_id
                JOIN study_categories
                    ON study_categories.study_cat_id = posts.study_cat_id
                JOIN subjects
                    ON subjects.subject_id = posts.subject_id
                WHERE students.student_user_name = '$user_name' AND posts.subject_id = '$teacher_subject'";
            $home_result = mysqli_query($conn, $home_sql);
            $row = mysqli_fetch_assoc($home_result);
            $student_id = $row['student_id'];
            // echo $student_row['student_first_name'];
        // }
        ?>

            <div class="section-body row">
                <section class="col-md-4">
                    <article class="article-profil" >
                    <?php
                          $student_query = "SELECT students.*, gender.*, cities.*, states.* FROM students 
                          LEFT JOIN cities
                          ON cities.city_id = students.city_id
                      LEFT JOIN states
                          ON states.state_id = students.state_id
                      LEFT JOIN gender
                          ON gender.gender_id = students.gender_id
                          WHERE student_id = '$student_id'";
                          $student_result = mysqli_query($conn, $student_query);
                          $student_row = mysqli_fetch_assoc($student_result);
                    ?>
                        <figure class="text-center"> <?php 

                            if($student_row['student_photo'] == ""){
                            ?>
                                <img class="" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                            } else {
                            ?>
                                <img class="" src="<?php echo base_url() . $student_row['student_photo'];?>" alt="">
                            <?php
                            }
                            ?>
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $student_row['student_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul class="pl-3">
                                <li class="text-dark h4 py-1 font-weight-normal">
                                <i class="h5 fa fa-envelope-o pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $student_row['student_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-4" aria-hidden="true"></i>
                            <?php 
                                echo "+91 " . $student_row['student_phone']; 
                            ?>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    <?php
                        
                    ?>
                    <article class="article-profil" >
                        <header class="post-header">
                            <h1 class="">
                                <?php echo $row["post_title"];?>
                            </h1>
                        </header>
                        <div class="post-body">
                            <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal">
                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                            </ul>
                            <p class="text-dark">
                                <?php echo $row["post_detail"];?>
                            </p>
                        </div>
                        
                    </article>
                </section>
            </div>
            <?php
                } else if($_GET['id']){
            // if(!empty($_GET['id'])){
                $id = $_GET['id'];
                // $postid = $_GET['id'];
                $home_sql = "SELECT posts.*, subjects.*, students.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                FROM posts
                    JOIN students
                        ON students.student_id = posts.student_id
                    JOIN cities
                        ON cities.city_id = posts.city_id
                    JOIN states
                        ON states.state_id = posts.state_id
                    JOIN study_types
                        ON study_types.study_type_id = posts.study_type_id
                    JOIN study_categories
                        ON study_categories.study_cat_id = posts.study_cat_id
                    JOIN subjects
                        ON subjects.subject_id = posts.subject_id
                    WHERE post_id = $id";
                $home_result = mysqli_query($conn, $home_sql);
                $row = mysqli_fetch_assoc($home_result);
                $student_id = $row['student_id'];
                // echo $student_row['student_first_name'];
            // }
            ?>
            <div class="section-body row">
                <section class="col-md-4">
                    <article class="article-profil" >
                    <?php
                          $student_query = "SELECT students.*, gender.*, cities.*, states.* FROM students 
                          LEFT JOIN cities
                          ON cities.city_id = students.city_id
                      LEFT JOIN states
                          ON states.state_id = students.state_id
                      LEFT JOIN gender
                          ON gender.gender_id = students.gender_id
                          WHERE student_id = '$student_id'";
                          $student_result = mysqli_query($conn, $student_query);
                          $student_row = mysqli_fetch_assoc($student_result);
                    ?>
                        <figure class="text-center"> <?php 

                            if($student_row['student_photo'] == ""){
                            ?>
                                <img class="" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                            <?php
                            } else {
                            ?>
                                <img class="" src="<?php echo base_url() . $student_row['student_photo'];?>" alt="">
                            <?php
                            }
                            ?>
                        </figure>
                        <header class=" u-center-text">
                            <h1 class="text-dark py-5">
                            <?php 
                                echo $student_row['student_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer class="px-5">
                            <ul class="pl-3">
                                <li class="text-dark h4 py-1 font-weight-normal">
                                <i class="h5 fa fa-envelope-o pr-3" aria-hidden="true"></i>
                                
                            <?php 
                                echo $student_row['student_email'];
                            ?>
                                </li>
                                <li  class="text-dark h4 pb-4 font-weight-normal">
                                <i class="h2 fa fa-mobile  pr-4" aria-hidden="true"></i>
                            <?php 
                                echo "+91 " . $student_row['student_phone']; 
                            ?>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="col-md-8">
                    <?php
                        
                    ?>
                    <article class="article-profil" >
                        <header class="post-header">
                            <h1 class="">
                                <?php echo $row["post_title"];?>
                            </h1>
                        </header>
                        <div class="post-body">
                            <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal">
                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                            </ul>
                            <p class="text-dark">
                                <?php echo $row["post_detail"];?>
                            </p>
                        </div>
                        
                    </article>
                </section>
            </div>
            <?php
                }

                ?>
        </section>
    </main>
</div>
<?php 
    include("../../private/required/public/components/agreement.php");

    require("include/footer.inc.php");    
?>