<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    } 
    $page_title = "Home page";

    require_once("../../private/config/db_connect.php");
    require_once("../../private/config/config.php");

    include("../../private/required/public/components/social_media.php");
    require("include/header.inc.php");

    $student_id = $row['student_id'];
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
                             $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* , memberships.*, posts.* 
                             FROM teachers
                                JOIN cities
                                    ON cities.city_id = teachers.city_id
                                JOIN subjects
                                    ON subjects.subject_id = teachers.subject_id
                                JOIN study_categories
                                    ON study_categories.category_id = teachers.category_id 
                                JOIN memberships
                                    ON memberships.teacher_id = teachers.teacher_id  
                                JOIN posts
                                    ON posts.subject_id = teachers.subject_id 
                             WHERE teachers.category_id = 1 
                                AND ((memberships.member_token > 0 AND membership_expiry_date < CURRENT_DATE())
                                    OR (memberships.member_token > 0 OR membership_expiry_date < CURRENT_DATE())) 
                                AND (posts.student_id = '$student_id' AND posts.subject_id = teachers.subject_id)";

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
                             $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* , memberships.*, posts.* 
                                FROM teachers
                                    JOIN cities
                                        ON cities.city_id = teachers.city_id
                                    JOIN subjects
                                        ON subjects.subject_id = teachers.subject_id
                                    JOIN study_categories
                                        ON study_categories.category_id = teachers.category_id 
                                    JOIN memberships
                                        ON memberships.teacher_id = teachers.teacher_id  
                                    JOIN posts
                                        ON posts.subject_id = teachers.subject_id 

                                WHERE teachers.category_id = 2 AND memberships.member_token > 0 AND posts.student_id = '$student_id' AND posts.subject_id = teachers.subject_id";
                             
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
                         
                <div class="section-header u-center-text" >
                    <heeader class="text-primary-h-3"> 
                        Non active member tutors
                    </header>
                </div>
                    <?php
                        $teacher_query = "SELECT teachers.*, memberships.*, posts.* FROM teachers 
                        JOIN memberships
                            ON memberships.teacher_id = teachers.teacher_id  
                        JOIN posts
                            ON posts.subject_id = teachers.subject_id 
                        WHERE (memberships.member_token > 0 
                                AND membership_expiry_date < CURRENT_DATE()) 
                            AND (posts.student_id = '$student_id' 
                                AND posts.subject_id = teachers.subject_id)";

                        $teacher_result = mysqli_query($conn, $teacher_query);
                        $teacher_row = mysqli_num_rows($teacher_result);

                        echo "<div class='wrap-container'><p>There are ". $teacher_row . " of non active members are there.</p></div>";
                    
                    ?>
                <div class="section-body  wrap-container owl-carousel owl-theme">
                    <?php
                    
                        while($row = mysqli_fetch_assoc($teacher_result)){
                            ?>

                            <article class="article-block text-center">
                                <figure>
                                    <?php 
        
                                        if($row['teacher_photo'] == ""){
                                    ?>
                                            <img class="member__img" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                    <?php
                                        } else {
                                    ?>
                                            <img class="member__img"  src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                    <?php
                                        }
                                    ?>
                                </figure>
                                <header>
                                    <?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'] ;?>
                                </header>
                                <div class="testimonial-client-detail">
                                    <p>
                                    <ul>
                                        
                                        <li class="testimonial-client-place">
                                            <?php
                                                $city = $row['city_id'];
                                                $state = $row['state_id'];
                                            if($city == true){
                                                $sql = "SELECT cities.*, states.* FROM cities 
                                                LEFT JOIN states
                                            ON states.state_id = cities.state_id
                                                WHERE city_id = '$city'";
                                                $result = mysqli_query($conn, $sql);
                                                $rows = mysqli_fetch_assoc($result);
                                                echo $rows['city_name'] . ' - ' . $rows['state_name'];;
            
                                            };  
                                    ?>  
    
                                        </li>
                                    </ul>
                                    </p>
                                </div>        
                                <footer class="article-footer text-center">
                                    <a class="button__link-primary" href="<?php base_url();?>student\include\email\to_non_active_member.php?non-active_member_id=<?php echo $row['teacher_id']?>">Contact tutor</a>
                                </footer>
                            </article>
                            
                            <?php
                        }
                    ?>
                
                </div>
            </section>
        </main>
    </div>
            <!-- end body container -->



            <?php 
  include("../../private/required/public/components/agreement.php");

    require("include/footer.inc.php");
?>