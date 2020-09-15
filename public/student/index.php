<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    } 
    $page_title = "home page";
    $banner_image = "post.svg";

    include_once("../../private/config/db_connect.php");
    include_once("../../private/config/config.php");

    include("../../private/required/public/components/social_media.php");
    require("include/header.inc.php");
    // include("../../private/required/public/components/search.php");
    
    $student_name = $_SESSION['user_name'];

        
    $sql = "SELECT * FROM std 
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    ?>
    <div class="body-container">
        <main>
            <section class="wrap-container">
                <div class="section-header u-center-text" >
                    <heeader class="text-primary-h-3"> 
                        Tutors Details
                    </header>
                </div>    
                <section class="row">
                    <div class="col-sm-3">
                        <ul class="px-4 tab row">
                            <li class="study-type pl-2 col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="study-type-1">academic</button></li>
                            <li class="study-type col-sm-12  pl-2" data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">non-academic</button></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <section class="wrap-study-type study-type-1">

                            <?php
                             $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                             FROM teachers
                                JOIN cities
                                    ON cities.city_id = teachers.city_id
                                JOIN subjects
                                    ON subjects.subject_id = teachers.subject_id
                                JOIN study_categories
                                    ON study_categories.category_id = teachers.category_id

                             WHERE (teachers.category_id = 1) AND (teachers.teacher_membership_status = 'active') ";

                             $category_result = mysqli_query($conn, $category_query);
                             while($row = mysqli_fetch_assoc($category_result)){
                                 //echo $row["teacher_first_name"]. '</br>';

                                 ?>

                                <article class="mb-5 border student-post post-sections">
                                     <header class="post-header">
                                     <h1 class="pb-3">
                                        <?php
                                         echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                     </h1>
                                     </header>
                                     <div class="post-body row">
                                         <div class="col-sm-2">
                                        <figure class="pt-4">
                                            <?php
                                                    if($row['teacher_photo'] == ""){
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php base_url();?>img/teacher/profile_pic/male_profile.svg" alt="">
                                            <?php
                                                } else {
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 150px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                            <?php
                                                }
                                            ?>
                                        </figure>
                                     </div>
                                     <div class="col-sm-10">
                                       
                                       <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                            <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?> trainer</li>
                                            <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                        
                                        </ul>
                                           
                                            <p>
                                            <?php
                                                echo $row['teacher_about_me'];
                                            ?>
                                            </p>
                                     </div>
                                   <footer class="post-footer">
                                        <span class="active-member-btn" style="font-size: 1.6rem">Contact details</span>
                                   </footer>
                                

                                   <section class="student-details">
                                        <article>
                                            <header>

                                            </header>

                                            <div class="row">
                                                
                                                <div class="col-sm-12">
                                                    <ul class="student-info">
                                                        <li>
                                                            <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["teacher_first_name"] ." " . $row["teacher_last_name"];?>    
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['teacher_phone'];?>" target="_blank"><?php echo $row['teacher_phone'];?></a>                                                                   
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['teacher_email'];?>"><?php echo $row["teacher_email"];?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                                                                            
                                            
                                        </article>
                                    </section>
                                 </article>
                                 <?php
                            
                             }
                             
                            ?>

                        </section>
                        <section class="wrap-study-type study-type-2">
                            <?php
                             $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                             FROM teachers
                                JOIN cities
                                    ON cities.city_id = teachers.city_id
                                JOIN subjects
                                    ON subjects.subject_id = teachers.subject_id
                                JOIN study_categories
                                    ON study_categories.category_id = teachers.category_id

                             WHERE (teachers.category_id = 2) AND (teachers.teacher_membership_status = 'active') ";
                             $category_result = mysqli_query($conn, $category_query);
                                while($row = mysqli_fetch_assoc($category_result)){
                                    ?>
                                    <article class="row mb-5 border">
                                     <div class="col-sm-3">
                                        <figure class="pt-4">
                                            <?php
                                                    if($row['teacher_photo'] == ""){
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php base_url();?>img/teacher/profile_pic/male_profile.svg" alt="">
                                            <?php
                                                } else {
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 150px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                            <?php
                                                }
                                            ?>
                                        </figure>
                                                        
                                     </div>
                                     <div class="col-sm-9">
                                       
                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?> trainer</li>
                                                <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                            
                                            </ul>
                                            <h1 class="pb-3">
                                        <?php
                                         echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                     </h1>
                                     <p>
                                        <?php
                                            echo $row['teacher_about_me'];
                                        ?>
                                     </p>
                                     </div>
                                   

                                 </article>
                                 <?php
                                }
                                
                            ?>
                        </section>
                    </div>
                </section>
            </section>
        </main>
    </div>
            <!-- end body container -->



            <?php 
    require("include/footer.inc.php");
?>