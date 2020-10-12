<?php
/******* show teacher's records to students ********
*       file includ:
*       -   public/search_result_teachers.php
*  
***************************************************/

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
       
        <div class="col-sm-12">
            <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                <li class="mr-5"><i class="fa fa-hand-o-right mr-2" aria-hidden="true"></i><?php echo $row["sub_cat_name"];?></li>
                <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
            </ul>
        </div>
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
                echo $row['teacher_about_me'];
            ?>
            </p>
            </div>
        </div>
    </div>
    <footer class="post-footer">
        <a class="button-primary mr-5" href="<?php base_url();?>student/login.php">Log In</a>
        <a class="button__link-primary" href="<?php base_url();?>student/registration.php">Sign Up</a>
    </footer>
</article>

