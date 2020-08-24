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
    require("include/header.inc.php");
     
        require("include/banner.inc.php");

    $student_name = $_SESSION['user_name'];

        
    $sql = "SELECT * FROM std 
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    ?>
    <div class="body-container">
        <main>
            <section>
                <div class="section-header u-center-text" >
                    <heeader class="text-primary-h"> 
                        Trainer detail
                    </header>
                </div>    
                <section class="row">
                    <div class="col-sm-3 mt-5">
                        <ul class=" border py-5 px-4 tab">
                            <li class="study-type pl-2 col-6 col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="study-type-1">academic</button></li>
                            <li class="study-type  col-6 col-sm-12  pl-2" data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">non-academic</button></li>
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

                             WHERE teachers.category_id = 1 AND teachers.teacher_membership_status = 'active' ";

                             $category_result = mysqli_query($conn, $category_query);
                             while($row = mysqli_fetch_assoc($category_result)){
                                 //echo $row["teacher_first_name"]. '</br>';

                                 ?>

                                 <article class="row mb-5 border">
                                     <div class="col-sm-3">
                                        <figure>
                                            <?php
                                                    if($row['teacher_photo'] == ""){
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php base_url();?>img/teacher/profile_pic/male_profile.svg" alt="">
                                            <?php
                                                } else {
                                            ?>
                                                    <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['teacher_photo'];?>" alt="">
                                            <?php
                                                }
                                            ?>
                                        </figure>
                                                        
                                     </div>
                                     <div class="col-sm-9">
                                       
                                        <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
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

                             WHERE teachers.category_id = 2 AND teachers.teacher_membership_status = 'active' ";
                             $category_result = mysqli_query($conn, $category_query);
                                while($row = mysqli_fetch_assoc($category_result)){
                                    echo $row["teacher_first_name"]. '</br>';
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