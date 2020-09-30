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

    $student_id = $row['student_id'];

   
    
        
//    $id =  $post_row['subject_id'];
//         $teacher_query = "SELECT teachers.*, memberships.* FROM teachers 
//         JOIN memberships
//             ON memberships.teacher_id = teachers.teacher_id 
//         WHERE memberships.member_token > 0 AND subject_id = $id";
//         $teacher_result = mysqli_query($conn, $teacher_query);

//         while($row = mysqli_fetch_assoc($teacher_result)){
//            echo $row['teacher_first_name'] . "<br/>";
//         }
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
            <section class="section-testimonial top-testimonial">
                         
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
                             WHERE (memberships.member_token = 0 
                                     AND membership_expiry_date < CURRENT_DATE()) 
                                 AND (posts.student_id = '$student_id' 
                                     AND posts.subject_id = teachers.subject_id)";

                         $teacher_result = mysqli_query($conn, $teacher_query);
                         $teacher_row = mysqli_num_rows($teacher_result);

                         echo "<div class='wrap-container'><p>There are ". $teacher_row . " of non active members are there.</p></div>";
                         
                         ?>
                         <blockquote class="section-body wrap-container owl-carousel owl-theme">
                            <?php
                               
                                while($row = mysqli_fetch_assoc($teacher_result)){
                                    ?>

                                    <article class="article-block" >
                                        <figure>
                                            <?php 
                
                                                if($row['teacher_photo'] == ""){
                                            ?>
                                                    <img class="member__img" style="max-height: 200px; border-radius= 50%;" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                            <?php
                                                } else {
                                            ?>
                                                    <img class="member__img" style="max-height: 200px; border-radius= 50%;" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                            <?php
                                                }
                                            ?>
                                        </figure>
                                        <header>
                                        
                                        </header>
                                        <div class="testimonial-client-detail">
                                            <p>
                                                <?php echo $row['teacher_first_name'];?>
                                                <?php echo $row['subject_id'];?>
                                            </p>
                                        </div>        
                                        <footer class="article-footer">
                                            <figure>
                                                
                                            </figure>
                                            <ul>
                                                <li class="testimonial-client-name"><cite><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];?></cite></li>
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
                                        </footer>
                                    </article>
                                    
                                    <?php
                                }
                            ?>
                         
                         </blockquote>
                         <!-- <div class="svg">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="#0099ff" fill-opacity="1" d="M0,64L48,74.7C96,85,192,107,288,106.7C384,107,480,85,576,96C672,107,768,149,864,186.7C960,224,1056,256,1152,229.3C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                             </svg>
                         </div> -->
                    </section>
            </section>
        </main>
    </div>
            <!-- end body container -->



            <?php 
  include("../../private/required/public/components/agreement.php");

    require("include/footer.inc.php");
?>