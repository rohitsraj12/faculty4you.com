<?php
    $page_title = "home page";
    require_once("../private/config/db_connect.php");
    require("../private/config/config.php");

    include("../private/required/public/header.public.php");
    include("../private/required/public/banner/banner.public.php");
?>

            <div class="body-container">
                <main class="page-home">
                    <section class="section-student">
                        <div class="section-header u-center-text">
                            <heeader class="text-primary-h"> 
                                How <strong>Faculty4you</strong> Works for Students
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with top <strong>teachers</strong> on the platform. Create your profile post your requirements and learn <strong>online</strong>  or <strong>home tuition</strong>.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block">
                                <figure class="studnet-section__figure">
                                    <span>step 1</span>
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        It will take you less than 1 minute to start you adventure with BuddySchool
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" >
                                <figure class="studnet-section__figure">
                                    <span>step 2</span>
                                    <img src="<?php base_url();?>img/member/post-requirement.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Post your requirements</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        Post your requiriment of subject, teacher will contact you.
                                    </p>
                                </div>
                            </article>
                            <article class="article-block">
                                <figure class="studnet-section__figure">
                                <span>step 3</span>
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    confirem with teacher and start your learning with out teacher
                                    </p>
                                </div>
                            </article>
                        </section>
                        <footer class="section-footer u-center-text mb-4" >
                            <a href="<?php echo base_url();?>student/registration.php" class="button-primary">Registration </a>
                        </footer>
                    </section>
                   

                    <section class="section-teacher">
                        
                        <div class="section-header u-center-text"  >
                            <heeader class="text-primary-h"> 
                                Looking to Become a <strong>Trainer</strong>
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with <strong>students</strong> on the platform. Create a strong profile and grow your network.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">
                                    <span>step 1</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    It will take you less than 1 minute to start you adventure with faculty4you
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" >
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/member.svg" alt="">
                                    
                                    <span>step 2</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Activate membership</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    You need to become prime memebt to see student requirement post
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" >
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/find-student.svg" alt="">
                                    <span>step 3</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Find students</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    Once you become prime member search student and student’s post then conatc student
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">
                                    <span>step 4</span>

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary-h">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    scedule your time and start your lesson
                                    </p>
                                </div>
                            </article>
                        </section>
                        <footer class="section-footer u-center-text mb-4" >
                            <a href="<?php echo base_url();?>teacher/registration.php" class="button-primary">Registration</a>
                        </footer>
                    </section>
                   

                    <section class="section-data py-5 text-light">
                        <div class="wrap-container row text-center py-5">
                            <article class="col-sm-4 py-5"  >
                                <p class="text-white pb-3" style = "font-size : 2rem">Registered students</p>
                                <p class="h1 text-white" style="font-size: 4.8rem">
                                    <?php
                                        $query = "SELECT * FROM std";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_num_rows($result);

                                        echo $row + 50000;
                                    ?>
                                </p>
                            </article>
                            <article class="col-sm-4 py-5"  >
                            <p class="h2 text-white pb-3" style = "font-size : 2rem">Registered teachers</p>
                            <p class="h1 text-white" style="font-size: 4.8rem">

                                        <?php
                                            $query = "SELECT * FROM teachers";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_num_rows($result);
                                            echo $row + 25000;
                                        ?>
                                </p>
                            </article>
                            <article class="col-sm-4 py-5"  >
                            <p class="h2 text-white pb-3" style = "font-size : 2rem">Student's post</p>
                            <p class="h1 text-white" style="font-size: 4.8rem">

                                        <?php
                                            $query = "SELECT * FROM posts";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_num_rows($result);
                                            echo $row + 72000;
                                        ?>
                                </p>
                            </article>
                        </div>
                    </section>

                    <section class="section-testimonial">
                         
                        <div class="section-header u-center-text" >
                            <heeader class="text-primary-h"> 
                                Student comumnity feed back
                            </header>
                        </div>
                        <blockquote class="section-body wrap-container owl-carousel owl-theme">
                        <?php
                            $testimonial_query = "SELECT testimonials.*, std.* FROM testimonials 
                            LEFT JOIN std
                                ON std.student_id = testimonials.student_id LIMIT 4";
                            $testimonial_result = mysqli_query($conn, $testimonial_query);

                            while($row = mysqli_fetch_assoc($testimonial_result)){
                               
                        ?>
                        <article class="article-block" >
                            <div class="testimonial-client-detail">
                                <p>
                                    "
                                    <?php echo $row['testimonial_quote'];?>
                                    "
                                </p>
                            </div>        
                            <footer class="article-footer">
                                <figure>
                                    <?php 

                                        if($row['student_photo'] == ""){
                                    ?>
                                            <img class="member__img" style="max-height: 200px; border-radius= 50%;" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                    <?php
                                        } else {
                                    ?>
                                            <img class="member__img" style="max-height: 200px; border-radius= 50%;" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                    <?php
                                        }
                                    ?>
                                </figure>
                                <ul>
                                    <li class="testimonial-client-name"><cite><?php echo $row['student_first_name'] . " " . $row['student_last_name'];?></cite></li>
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

                    <section class="section-partner">
                        
                        <div class="section-header u-center-text" >
                            <heeader class="text-primary-h"> 
                                Our partners
                            </header>
                        </div>
                        
                        <section class="section-body wrap-container">
                            <article class="article-block"> 
                                <figure class="article-block__figure">
                                    
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                               
                            </article>
                            <article class="article-block" >
                                <figure class="article-block__figure">
                                    
                                    <img src="<?php base_url();?>img/member/post-requirement.svg" alt="">

                                </figure>
                                
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="article-block__figure">
                              
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">

                                </figure>
                               
                            </article>
                        </section>
                    </section>
                </main>
                <!-- end page home -->
            </div>
            <!-- end body container -->


<?php
    include("../private/required/public/footer.public.php");

?>


