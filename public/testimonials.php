<?php
 require_once("../private/config/db_connect.php");
 require("../private/config/config.php");
 include("../private/required/public/components/social_media.php");

    $page_title = "Testimonials";
  
    include("../private/required/public/header.public.php");
?>
<div class="body-container">
    <main>
        <section>
        <div class="section-header u-center-text">
            <heeader class="text-primary-h-3"> 
               Testimonials
            </header>
        </div>
        <div class="wrap-container">
            <section>
            <div class="row section__post">
                <div class="col-sm-3">
                    <ul class="tab" >
                        <button class="tablinks active" data-testimonial="tutor">Teachers' testimonials</button>
                        <button class="tablinks" data-testimonial="student">Students' testimonials</button>
                    </ul>
                </div>
                <div class="col-sm-9">
                   <section class="section-testimonial tutor">
                        <header class="text-primary-h-3 text-center pb-5 mb-5" >
                            Tutors' testimonials
                        </header>
                        <?php
                        $tutor_sql = "SELECT teacher_testimonials.*, teachers.* FROM teacher_testimonials
                            JOIN teachers
                                ON teachers.teacher_id = teacher_testimonials.teacher_id
                            ORDER BY testimonial_id DESC";

                        $tutor_result = mysqli_query($conn, $tutor_sql);
                        while($row = mysqli_fetch_assoc($tutor_result)){
                        ?>
                            <article class=" mb-5 border student-post post-sections">    
                                <header class="post-header">
                                    <h1 class="pb-3">
                                        <?php
                                            echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                    </h1>
                                </header>
                                <div class="post-body row">  
                                
                                    <!-- <div class="col-sm-12">
                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                            <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                            <li class="mr-5"><i class="fa fa-hand-o-right mr-2" aria-hidden="true"></i><?php echo $row["sub_cat_name"];?></li>
                                            <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                        </ul>
                                    </div> -->
                                    <div class="row px-4">
                                        <div class="col-sm-4">
                                            <figure class="pt-2">
                                                <?php
                                                        if($row['teacher_photo'] == ""){
                                                ?>
                                                        <img class="img-fluid img-rounded" style="max-height: 400px" src="<?php base_url();?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                <?php
                                                    } else {
                                                ?>
                                                        <img class="img-fluid img-rounded" style="max-height: 400px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                                <?php
                                                    }
                                                ?>
                                            </figure>
                                        </div>
                                        <div class="col-sm-8">
                                            
                                        <p>
                                        <?php
                                            echo $row['testimonial_quote'];
                                        ?>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>
                   </section>
                   <section class="section-testimonial student">
                        <header class="text-primary-h-3 text-center pb-5 mb-5" >
                            Students' testimonials   
                        </header>
                   <?php
                    $sql = "SELECT testimonials.*, students.*, FROM testimonials
                        JOIN students
                            ON students.student_id = testimonials.student_id
                        ORDER BY testimonial_id DESC";
                        $testimonial_result = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($testimonial_result)){
                        ?>
                            <article class="mt-3 post-sections" >
                                <header class="post-header">
                                    <h1 class="">
                                        <?php echo $row["student_first_name"] . " " . $row["student_last_name"];?>
                                    </h1>
                                </header>
                                <div class="post-body">
                                    <!-- <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                        <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                        <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                        <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                        <li class="mr-5"><i class="fa fa-hand-o-right mr-2" aria-hidden="true"></i><?php echo $row["sub_cat_name"];?></li>
                                        <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                        <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                    </ul> --> 
                                    <div class="row px-4">
                                        <div class="col-sm-4">
                                            <figure class="pt-2">
                                                <?php
                                                        if($row['student_photo'] == ""){
                                                ?>
                                                        <img class="img-fluid img-rounded" style="max-height: 400px" src="<?php base_url();?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                <?php
                                                    } else {
                                                ?>
                                                        <img class="img-fluid img-rounded" style="max-height: 400px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                <?php
                                                    }
                                                ?>
                                            </figure>
                                        </div>
                                        <div class="col-sm-8">
                                            
                                        <p>
                                        <?php
                                            echo $row['testimonial_quote'];
                                        ?>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>
                   </section>
                </div>
            </div>
               
            </section>
        </div>
        </section>
    </main>
</div>

<?php
    include("../private/required/public/components/agreement.php");
    include("../private/required/public/footer.public.php");
?>