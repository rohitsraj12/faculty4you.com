<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    
    $page_title = "search result";
    require_once("../../private/config/db_connect.php");
    include("../../private/required/public/components/social_media.php");

    include("../../private/config/config.php");

    include("include/header.inc.php");
    $student_name = $_SESSION['user_name'];

        
    $sql = "SELECT * FROM std 
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
 
 ?>
 

 <div class="body-container">
    <main>
        <section class="section-search-result wrap-container">
                    <div class="section-header u-center-text">
                        <heeader class="text-primary-h-3"> 
                            Search result
                        </header>
                    </div>

                    <?php
                    
                if(isset($_POST["submit-search"])){
                    // security
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                    $sql = "SELECT * FROM subjects WHERE sub_name LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                ?>
                    
                    <!-- <div class="search-result-num" >
                        <p>
                                <?php echo $query_results; ?> results are matching
                        </p>

                    </div> -->
                    <section class="section-body"> 

                    
                        <?php 

                            if($query_results > 0){
                                while($row = mysqli_fetch_assoc($result)){

                        ?>      
                                
                            <?php

                                }
                            } else {
                                // echo "there are no result";
                                ?> 
                                
                                <div class="search-result-num" >
                                    <p>
                                        there are no result
                                    </p>
                                </div>

                                <?php
                            }
                        
                        ?>
                    </section>      
        </section> 

            <div class="wrap-container">
                <section class="row section__post">
                    <div class="col-sm-3">
                        <ul class="px-4 tab row">
                            <li class="study-type pl-2 col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="study-type-1">academic</button></li>
                            <li class="study-type col-sm-12  pl-2" data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">non-academic</button></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <section class="all study-type-1 post__cat" id="viewPost">
                                <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                    search posts
                                </header>
                                -->
                                    <div class="search-result-nu" >
                                    <?php 
                                        $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                        // $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                        // echo $city;
                                        
                                        $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                        FROM teachers
                                        JOIN cities
                                            ON cities.city_id = teachers.city_id
                                        JOIN subjects
                                            ON subjects.subject_id = teachers.subject_id
                                        JOIN study_categories
                                            ON study_categories.category_id = teachers.category_id
        
                                        WHERE (teachers.teacher_membership_status = 'active') AND (subjects.sub_name = '%$search%)";
                                    ?>
                                    <p>
                                            <?php echo $query_results; ?> results are matching
                                    </p>
                                </div>
                                        <?php 
                                            
                                            while($row = mysqli_fetch_assoc($result)){

                                        ?>
                                                                        
                                 <article class="mb-5 border student-post post-sections">
                                     <header class="post-header">
                                     <h1 class="pb-3">
                                        <?php
                                         echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                        ?>
                                     </h1>
                                     </header>
                                     <div class="post-body row">
                                         <div class="col-sm-2">
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
                                     <div class="col-sm-10">
                                       
                                       <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                            <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?> trainer</li>
                                            <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                        
                                        </ul>
                                           
                                            <p>
                                            <?php
                                                echo $row['teacher_about_me'];
                                            ?>
                                            </p>
                                     </div>
                                   <footer class="post-footer">
                                        <span class="active-member-btn" style="font-size: 1.6rem">Contact details</span>
                                   </footer>
                                

                                   <section class="student-details">
                                        <article>
                                            <header>

                                            </header>

                                            <div class="row">
                                                
                                                <div class="col-sm-12">
                                                    <ul class="student-info">
                                                        <li>
                                                            <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["teacher_first_name"] ." " . $row["teacher_last_name"];?>    
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['teacher_phone'];?>" target="_blank"><?php echo $row['teacher_phone'];?></a>                                                                   
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['teacher_email'];?>"><?php echo $row["teacher_email"];?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                                                                            
                                            
                                        </article>
                                    </section>
                                 </article>
                                    
                                       
                                        <?php
                                            }
                                        ?>
                        </section>
                        <section class="study-type-2 post__cat" id="viewPost">
                            <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                search posts
                            </header>
                             -->
                                <div class="search-result-nu" >
                                    <?php 
                                        $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                        // $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                        // echo $city;
                                        
                                        $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                        FROM teachers
                                        JOIN cities
                                            ON cities.city_id = teachers.city_id
                                        JOIN subjects
                                            ON subjects.subject_id = teachers.subject_id
                                        JOIN study_categories
                                            ON study_categories.category_id = teachers.category_id
        
                                        WHERE (teachers.teacher_membership_status = 'active') AND (subjects.sub_name = '%$search%)";
                                    ?>
                                    <p>
                                            <?php echo $query_results; ?> results are matching
                                    </p>
                                </div>
                                    <?php 
                                        
                                        while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                                                    

                                
                                        <section class="post__ca" id="viewPost">
                                            
                                            <div class="search-result-num" >
                                                <?php 
                                                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                                    // $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                                    // echo $city;
                                                    
                                                    $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                                    FROM teachers
                                                    JOIN cities
                                                        ON cities.city_id = teachers.city_id
                                                    JOIN subjects
                                                        ON subjects.subject_id = teachers.subject_id
                                                    JOIN study_categories
                                                        ON study_categories.category_id = teachers.category_id
                    
                                                    WHERE (teachers.teacher_membership_status = 'active') AND (subjects.sub_name = '%$search%)";
                                                ?>
                                                <p>
                                                        <?php echo $query_results; ?> results are matching
                                                </p>
                                            </div>
                                                    <?php 
                                                        
                                                        while($row = mysqli_fetch_assoc($result)){

                                                    ?>
                                                                                    

                                                <article class="mb-5 border student-post post-sections">
                                                    <header class="post-header">
                                                    <h1 class="pb-3">
                                                        <?php
                                                        echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                                        ?>
                                                    </h1>
                                                    </header>
                                                    <div class="post-body row">
                                                        <div class="col-sm-2">
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
                                                    <div class="col-sm-10">
                                                    
                                                    <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                            <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?> trainer</li>
                                                            <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                        
                                                        </ul>
                                                        
                                                            <p>
                                                            <?php
                                                                echo $row['teacher_about_me'];
                                                            ?>
                                                            </p>
                                                    </div>
                                                    <footer class="post-footer">
                                                            <span class="active-member-btn" style="font-size: 1.6rem">Contact details</span>
                                                    </footer>
                                                    

                                                    <section class="student-details">
                                                        <article>
                                                            <header>

                                                            </header>

                                                            <div class="row">
                                                                
                                                                <div class="col-sm-12">
                                                                    <ul class="student-info">
                                                                        <li>
                                                                            <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["teacher_first_name"] ." " . $row["teacher_last_name"];?>    
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['teacher_phone'];?>" target="_blank"><?php echo $row['teacher_phone'];?></a>                                                                   
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['teacher_email'];?>"><?php echo $row["teacher_email"];?></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                                                                            
                                                            
                                                        </article>
                                                    </section>
                                                </article>
                                                        
                                                    <?php
                                                        }
                                                    ?>
                                        </section>
                                                
                                    </div>
                                
                                    <section class="1 post__cat" id="viewPost">
                                        
                                        <div class="search-result-num" >
                                            <?php 
                                                $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                                // $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                                // echo $city;
                                                
                                                $category_query = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                                FROM teachers
                                                JOIN cities
                                                    ON cities.city_id = teachers.city_id
                                                JOIN subjects
                                                    ON subjects.subject_id = teachers.subject_id
                                                JOIN study_categories
                                                    ON study_categories.category_id = teachers.category_id
                
                                                WHERE (teachers.teacher_membership_status = 'active') AND (subjects.sub_name = '%$search%)";
                                            ?>
                                            <p>
                                                    <?php echo $query_results; ?> results are matching
                                            </p>
                                        </div>
                                                <?php 
                                                    
                                                    while($row = mysqli_fetch_assoc($result)){

                                                ?>
                                                                                

                                            <article class="mb-5 border student-post post-sections">
                                                <header class="post-header">
                                                <h1 class="pb-3">
                                                    <?php
                                                    echo $row['teacher_first_name'] . " " . $row['teacher_last_name'];
                                                    ?>
                                                </h1>
                                                </header>
                                                <div class="post-body row">
                                                    <div class="col-sm-2">
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
                                                <div class="col-sm-10">
                                                
                                                <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                        <li class="mr-5"><i class="fa fa-book mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?> trainer</li>
                                                        <li class="mr-5"><i class="fa fa-paw mr-2" aria-hidden="true"></i><?php echo $row["teacher_experience"] . ' years of experience';?></li>
                                                        <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                        <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                    
                                                    </ul>
                                                    
                                                        <p>
                                                        <?php
                                                            echo $row['teacher_about_me'];
                                                        ?>
                                                        </p>
                                                </div>
                                                <footer class="post-footer">
                                                        <span class="active-member-btn" style="font-size: 1.6rem">Contact details</span>
                                                </footer>
                                                

                                                <section class="student-details">
                                                    <article>
                                                        <header>

                                                        </header>

                                                        <div class="row">
                                                            
                                                            <div class="col-sm-12">
                                                                <ul class="student-info">
                                                                    <li>
                                                                        <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["teacher_first_name"] ." " . $row["teacher_last_name"];?>    
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['teacher_phone'];?>" target="_blank"><?php echo $row['teacher_phone'];?></a>                                                                   
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['teacher_email'];?>"><?php echo $row["teacher_email"];?></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                                                                        
                                                        
                                                    </article>
                                                </section>
                                            </article>
                                                    
                                                <?php
                                                    }
                                                ?>
                                    </section>
                                            
                                </div>
                                        
                                    <?php
                                        }
                                    ?>
                        </section>
                                    
                    </div>
                        
                                 
                    </div>
                    
                </section>
            </div>
            <?php
            }
            ?>
    </main>
</div>

<?php
    include("include/footer.inc.php");

?>