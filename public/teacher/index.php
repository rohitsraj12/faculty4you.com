<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $user_name = $_SESSION['user_name'];
    $user_query = "SELECT teachers.*, cities.* 
        FROM teachers 
        JOIN cities
            ON cities.city_id = teachers.city_id
        WHERE teacher_user_name = '$user_name'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

    $page_title = "profile";
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include_once('include/header.inc.php');
    // include("../../private/required/public/components/search.php");
        

?>
            <div class="body-container">
                <main>
                    <section class="wrap-container">
                        <header class="text-primary-h-3 text-center">
                            Students Post
                        </header>

                        <div class="row">
                            <div class="col-sm-3 mt-5">
                                <ul class="px-4 tab row">
                                    <li class="study-type col-6 col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="study-type-1">online tuition</button></li>
                                    <li class="study-type  col-6 col-sm-12 " data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">home tuition - <?php echo $user_row['city_name'];?></button></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <section class="wrap-study-type study-type-1">
                                    <?php 
                                        $member = $user_row['teacher_membership_status'];
                                        $subject = $user_row['subject_id'];

                                        $home_sql = "SELECT posts.*, subjects.*, std.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                                        FROM posts
                                            JOIN std
                                                ON std.student_id = posts.student_id
                                            JOIN cities
                                                ON cities.city_id = posts.city_id
                                            JOIN states
                                                ON states.state_id = posts.state_id
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.category_id = posts.category_id
                                            JOIN subjects
                                                ON subjects.subject_id = posts.subject_id
                                            WHERE (posts.study_type_id = 1) AND (posts.subject_id = $subject)
                                            ORDER BY post_id DESC ";
                                        $home_result = mysqli_query($conn, $home_sql);
                                        $query_results = mysqli_num_rows($home_result);

                                        if($query_results > 0){
                                        while($row = mysqli_fetch_assoc($home_result)){
                                            $study_type = $row['study_type_name'];
                                        
                                            ?>
                                            <article class="student-post mt-5 post-sections">
                                                <header class="post-header">
                                                    <h1 class="">
                                                        <?php echo $row["post_title"];?>
                                                    </h1>
                                                </header>
                                                <div class="post-body">
                                                    <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal">
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
                                                <footer class=" post-footer">
                                                    <?php 
                                                        // echo $member;
                                                        if($member == "active"){
                                                    ?>
                                                            <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                                    <?php
                                                        }else{
                                                            // echo "become a member";
                                                            ?>
                                                            <a href="membership_plan.php" class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</a>
                                                            <!-- <small>you need to become a member to see the details</small> -->
                                                            <?php
                                                        }
                                                    ?>
                                                </footer>

                                                <section class="student-details">

                                                    <?php
                                                        if($member == "active"){
                                                    ?>
                                                        <article>
                                                            <header>

                                                            </header>

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <figure>
                                                                        <?php
                                                                            if($row['student_photo'] == ""){
                                                                        ?>
                                                                                <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                                        <?php
                                                                            } else {
                                                                        ?>
                                                                                <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                                        <?php
                                                                            }
                                                                            ?>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <ul class="student-info">
                                                                        <li>
                                                                            <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["student_first_name"] ." " . $row["student_last_name"];?>    
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['student_phone'];?>" target="_blank"><?php echo $row['student_phone'];?></a>                                                                   
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['student_email'];?>"><?php echo $row["student_email"];?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                                                                            
                                                            
                                                        </article>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <article class="">
                                                        <p>You need to become a member to see the details of students. To become a member please <a href="<?php echo base_url();?>teacher/membership_plan.php">Click here</a></p>
                                                        </article>
                                                    <?php    
                                                        }
                                                    ?>
                                                </section>
                                            </article>

                                            <?php 
                                        }
                                        } else{
                                        ?>
                                        <div class="search-result-num" >
                                            <p>
                                                there are no result
                                            </p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </section>
                                <section class="wrap-study-type study-type-2">
                                    <?php 

                                        $city = $user_row['city_id'];
                                    
                                        $home_sql = "SELECT posts.*, subjects.*, std.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                                        FROM posts
                                            JOIN std
                                                ON std.student_id = posts.student_id
                                            JOIN cities
                                                ON cities.city_id = posts.city_id
                                            JOIN states
                                                ON states.state_id = posts.state_id
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.category_id = posts.category_id
                                            JOIN subjects
                                                ON subjects.subject_id = posts.subject_id
                                            WHERE (posts.city_id = $city) AND (study_types.study_type_id = 2) AND (posts.subject_id = $subject)

                                            ORDER BY post_id DESC ";
                                        $home_result = mysqli_query($conn, $home_sql);
                                        $query_results = mysqli_num_rows($home_result);

                                        if($query_results > 0){
                                        while($row = mysqli_fetch_assoc($home_result)){
                                            $study_type = $row['study_type_name'];
                                        
                                    ?>
                                    <article class="student-post mt-5 post-sections">
                                                <header class="post-header">
                                                    <h1 class="">
                                                        <?php echo $row["post_title"];?>
                                                    </h1>
                                                </header>
                                                <div class="post-body">
                                                    <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
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
                                                <footer class=" post-footer">
                                                    <?php 
                                                        // echo $member;
                                                        if($member == "active"){
                                                    ?>
                                                            <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                                    <?php
                                                        }else{
                                                            // echo "become a member";
                                                            ?>
                                                            <a href="membership_plan.php" class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</a>
                                                            <!-- <small>you need to become a member to see the details</small> -->
                                                            <?php
                                                        }
                                                    ?>
                                                </footer>

                                                <section class="student-details">
                                                    <?php
                                                        if($member == "active"){
                                                    ?>
                                                        <article>
                                                            <header>

                                                            </header>

                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <figure>
                                                                        <?php
                                                                            if($row['student_photo'] == ""){
                                                                        ?>
                                                                                <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                                        <?php
                                                                            } else {
                                                                        ?>
                                                                                <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                                        <?php
                                                                            }
                                                                            ?>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <ul class="student-info">
                                                                        <li>
                                                                            <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["student_first_name"] ." " . $row["student_last_name"];?>    
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['student_phone'];?>" target="_blank"><?php echo $row['student_phone'];?></a>                                                                   
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['student_email'];?>"><?php echo $row["student_email"];?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                                                                            
                                                            
                                                        </article>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <article class="">
                                                           <p>You need to become a member to see the details of students. To become a member please <a href="<?php echo base_url();?>teacher/membership_plan.php">Click here</a></p>
                                                        </article>
                                                    <?php    
                                                        }
                                                    ?>
                                                </section>
                                            </article>

                                    <?php 
                                    }
                                    } else {
                                        // echo "there are no result";
                                        ?> 
                                        
                                        <div class="search-result-num" >
                                            <p>
                                                there are no result
                                            </p>
                                        </div>
        
                                        <?php
                                    }
                            
                                    ?>
                                </section>
                            </div>
                            <div class="col-sm-2">
                                <!-- <aside>
                                    <section>
                                        <article class="aside__header">
                                            online teachers requirements
                                        </article>
                                    </section>
                                </aside> -->
                            </div>
                        </div> 

                    </section>
                </main>
            </div>

<?php 
     require("include/footer.inc.php");    
?>