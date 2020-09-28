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

                             WHERE teachers.category_id = 1";

                             $category_result = mysqli_query($conn, $category_query);
                             while($row = mysqli_fetch_assoc($category_result)){
                                 //echo $row["teacher_first_name"]. '</br>';
                                  // fetching teacher detail from private
                                  include("../../private/required/public/student/teacher_detail.php");  
                            
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

                             WHERE teachers.category_id = 2";
                             $category_result = mysqli_query($conn, $category_query);
                                while($row = mysqli_fetch_assoc($category_result)){
                                  // fetching teacher detail from private
                                  include("../../private/required/public/student/teacher_detail.php");  
                                      
                                }
                                
                            ?>
                        </section>
                    </div>
                </section>
            </section>
            
            <section class="section__teacher-slider">
                
                </section>
        </main>
    </div>
            <!-- end body container -->



            <?php 
  include("../../private/required/public/components/agreement.php");

    require("include/footer.inc.php");
?>