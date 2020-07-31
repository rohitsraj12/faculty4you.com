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
                        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary-h"> 
                                how <strong>faculty4you</strong> works for students
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with top <strong>teachers</strong> on the platform. Create your profile post your requirements and learn <strong>online</strong>  or <strong>home tuition</strong>.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <span>step 1</span>
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        It will take you less than 1 minute to start you adventure with BuddySchool
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <span>step 2</span>
                                    <img src="<?php base_url();?>img/member/post-requirement.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Post your requirements</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                        Post your requiriment of subject, teacher will contact you.
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-left" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                <span>step 3</span>
                                    <img src="<?php base_url();?>img/member/schedule.svg" alt="">

                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    confirem with teacher and start your learning with out teacher
                                    </p>
                                </div>
                            </article>
                        </section>
                    </section>
                    <section class="section-teacher">
                        
                        <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary-h"> 
                                Looking to become a <strong>trainer</strong>
                            </header>
                            <div class="sub-heading wrap-container">
                                <h6 class="text-sub-primary">
                                    Join <strong>faculty4you.com</strong> and connect with <strong>students</strong> on the platform. Create a strong profile and grow your network.
                                </h6>
                            </div>
                        </div>
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">
                                    <span>step 1</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">register</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    It will take you less than 1 minute to start you adventure with faculty4you
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/member.svg" alt="">
                                    
                                    <span>step 2</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">activate membership</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    You need to become prime memebt to see student requirement post
                                    </p>
                                </div>
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
                                <figure class="studnet-section__figure">
                                    <img src="<?php base_url();?>img/member/find-student.svg" alt="">
                                    <span>step 3</span>
                                </figure>
                                <header class="article-header student-section__header">
                                    <h4 class="text-secondary">Find students</h4>
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
                                    <h4 class="text-secondary">Schedule lesson</h4>
                                </header>
                                <div class="article-body student-body">
                                    <p>
                                    scedule your time and start your lesson
                                    </p>
                                </div>
                            </article>
                        </section>
                    </section>
                    <section class="section-testimonial">
                         
                    <div class="section-header u-center-text" data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary-h"> 
                                Student comumnity feed back
                            </header>
                        </div>
                        <blockquote class="section-body wrap-container owl-carousel owl-theme" data-aos="zoom-out-up" data-aos-duration="1000">
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                            <article class="article-block">
                                <div class="testimonial-client-detail">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam repellat rem aut fugiat aspernatur. Quia ipsa vel porro cum.
                                    </p>
                                </div>        
                                <footer class="article-footer">
                                    <figure>
                                        <img  class="testimonial-client-img" src="<?php base_url();?>" alt="">
                                    </figure>
                                    <ul>
                                        <li class="testimonial-client-name"><cite>name</cite></li>
                                        <li class="testimonial-client-place">mumbai</li>
                                    </ul>
                                </footer>
                            </article>
                        </blockquote>
                        
                        <!-- <div class="svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="#0099ff" fill-opacity="1" d="M0,64L48,74.7C96,85,192,107,288,106.7C384,107,480,85,576,96C672,107,768,149,864,186.7C960,224,1056,256,1152,229.3C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div> -->
                    </section>
                    <section class="section-partner">
                        
                        
                    <div class="section-header u-center-text" data-aos="zoom-out-up" data-aos-duration="1000">
                            <heeader class="text-primary-h"> 
                                Our pratners
                            </header>
                        </div>
                        
                        <section class="section-body wrap-container">
                            <article class="article-block" data-aos="zoom-out-right" data-aos-duration="1000"> 
                                <figure class="article-block__figure">
                                    
                                    <img src="<?php base_url();?>img/member/register.svg" alt="">

                                </figure>
                               
                            </article>
                            <article class="article-block" data-aos="zoom-out-up" data-aos-duration="1000">
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
           