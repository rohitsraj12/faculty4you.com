<?php
/******* show teacher's records to students ********
*       file includ:
*       -   student/index.php
*       -   student/search_result.php
*  
***************************************************/

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