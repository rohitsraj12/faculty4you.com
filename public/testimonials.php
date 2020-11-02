<?php
    
 $page_title = "Testimonials";
 require_once("../private/config/db_connect.php");
 require("../private/config/config.php");
 include("../private/required/public/components/social_media.php");
 include("../private/required/public/header.public.php");
?>
<div class="body-container">
    <main class="wrap-container">
        <section>
        <div class="">
           
            <div class="row section__post">
                <div class="col-sm-3">
                    <ul class="tab" >
                        <button class="tablinks active" data-testimonial="tutor">Teachers' testimonials</button>
                        <button class="tablinks" data-testimonial="student">Students' testimonials</button>
                    </ul>
                </div>
                <div class="col-sm-9">
                   <section class=" public-testimonial tutor">
                        <header class="text-primary-h-3 text-center pb-5 mb-5" >
                            Tutors' testimonials
                        </header>
                        <?php
                        $tutor_query = "SELECT teacher_testimonials.*, teachers.* FROM teacher_testimonials
                            JOIN teachers
                                ON teachers.teacher_id = teacher_testimonials.teacher_id
                            ORDER BY testimonial_id DESC";

                        $tutor_result = mysqli_query($conn, $tutor_query);
                        while($row = mysqli_fetch_assoc($tutor_result)){
                        ?>
                            <article class=" mb-5 border post-sections">    
                                <header class="post-header">
                                    <h1 class="">
                                        <?php
                                            echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                    </h1>
                                </header>
                                <div class="post-body row py-5">  
                                
        
                                    <div class="row px-4">
                                        <div class="col-sm-3">
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
                                        <div class="col-sm-9">
                                            
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
                   <section class=" public-testimonial student">
                        <header class="text-primary-h-3 text-center pb-5 mb-5" >
                            Students' testimonials   
                        </header>
                   <?php
                    $student_query = "SELECT testimonials.*, students.* FROM testimonials
                        JOIN students
                            ON students.student_id = testimonials.student_id
                        ORDER BY testimonial_id DESC";
                        $testimonial_result = mysqli_query($conn, $student_query);

                        while($row = mysqli_fetch_assoc($testimonial_result)){
                        ?>
                            <article class="mt-3 border post-sections" >
                                <header class="post-header">
                                    <h1 class="">
                                        <?php echo $row["student_first_name"] . " " . $row["student_last_name"];?>
                                    </h1>
                                </header>
                                <div class="post-body py-5">
                                  
                                    <div class="row">
                                        <div class="col-sm-3">
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
                                        <div class="col-sm-9">
                                            
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
               
        </div>
        </section>
    </main>
</div>

<?php
    include("../private/required/public/components/agreement.php");
    include("../private/required/public/footer.public.php");
?>