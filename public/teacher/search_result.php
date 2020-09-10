<?php 
    
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    



    $page_title = "search result";
    $banner_image_url = "search";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("../../private/required/public/components/social_media.php");
    include("include/header.inc.php");
    
       // include_once'include/search-banner.inc.php';
       $user_name = $_SESSION['user_name'];
       $user_query = "SELECT teachers.*, cities.* 
           FROM teachers 
           JOIN cities
               ON cities.city_id = teachers.city_id
           WHERE teacher_user_name = '$user_name'";
       $user_result = mysqli_query($conn, $user_query);
       $user_row = mysqli_fetch_assoc($user_result);

       $member = $user_row['teacher_membership_status'];

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

                    $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                ?>
                    <!-- <div class="search__form mb-5 bg-light border p-5">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="search" class="form-control" name="search" id="inputAddress" placeholder="">
                                    <small class="msg">Enter your subject / pincode / study type</small>
                                </div>
                                <div class="col-sm-3">
                                    <select id="inputState" name="city" class="form-control">
                                        <option selected>Choose...</option>
                                        <?php 
                                            // #task city data fetch
                                            $city_query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $city_query);
                                            while( $row = mysqli_fetch_assoc($result)){
                                            
                                        ?>
                                        <option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>  
                                    <small class="msg">Select city name</small>

                                </div>
                                <div class="col-sm-3">
                                    <input class="btn btn-primary w-100 py-2" style="font-size: 1.4rem" name="submit-search" type="submit" value="search">
                                
                                </div>
                            </div>
                        </form>
                    </div> -->
                    
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
                    <?php
                        $study_type_sql = "SELECT * FROM study_types ORDER BY study_type_id ASC";
                        $type_result = mysqli_query($conn, $study_type_sql);
                            
                    ?>
                <section class="row section__post">
                    <div class="col-sm-3">
                        <div class="tab" >
                            <button class="tablinks active" data-post="all">Search result</button>
                            <?php
                                while($row = mysqli_fetch_assoc($type_result)){
                            ?>
                                    <button class="tablinks" data-post="<?php echo $row['study_type_id'];?>"><?php echo $row['study_type_name'];?></button>
                            <?php
                                }
                            ?>
                           </div>
                    </div>
                    <div class="col-sm-9">
                        <section class="all post__cat" id="viewPost">
                           <!--  <header class="text-primary-h text-center pb-5 mb-5" >
                                search posts
                            </header>
                             -->

                             <?php
                                
                                $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                $city = mysqli_real_escape_string($conn, $_POST["city"]);
                                
                                $sql = "SELECT posts.*, std.*, study_types.*, study_categories.*, cities.* 
                                FROM posts
                                JOIN std
                                    ON std.student_id = posts.student_id
                                    JOIN cities
                                    ON cities.city_id = std.city_id
                                JOIN study_types
                                    ON study_types.study_type_id = posts.study_type_id
                                JOIN study_categories
                                    ON study_categories.category_id = posts.category_id
                                WHERE (posts.post_title LIKE '%$search%' AND std.city_id LIKE '%$city%') AND (posts.post_title LIKE '%$search%') AND (std.city_id LIKE '%$city%')
                                ORDER BY post_date DESC";
                                $result = mysqli_query($conn, $sql);
                                $query_results = mysqli_num_rows($result);
                             ?>
                            <div class="search-result-nu" >
                            <p>
                                    <?php echo $query_results; ?> results are matching
                            </p>
                            </div>
                                <?php 

                                    while($row = mysqli_fetch_assoc($result)){

                                ?>
                                <article class="student-post mt-5 post-sections" >
                                    <header class="post-header">
                                        <h1 class="">
                                            <?php echo $row["post_title"];?>
                                        </h1>
                                    </header>
                                    <div class="post-body">
                                        <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
                                            <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                            <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                        </ul>
                                    <p class="text-dark">
                                        <?php echo $row["post_detail"];?>
                                    </p>
                                    </div>
                                    <footer class="post-footer">
                                                <?php 
                                                    // echo $member;
                                                    if($member == "active"){
                                                ?>
                                                        <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                                <?php
                                                    }else{
                                                        // echo "become a member";
                                                        ?>
                                                        <a href="membership_plan.php" class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</a>
                                                        <!-- <small>you need to become a member to see the details</small> -->
                                                        <?php
                                                    }
                                                ?>
                                            </footer>

                                            <section class="student-details py-3">

                                                <?php
                                                    if($member == "active"){
                                                ?>
                                                    <article>
                                                        <header>

                                                        </header>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <figure>
                                                                    <?php
                                                                        if($row['student_photo'] == ""){
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                                    <?php
                                                                        } else {
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                                    <?php
                                                                        }
                                                                        ?>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <ul class="student-info">
                                                                    <li>
                                                                        <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["student_first_name"] ." " . $row["student_last_name"];?>    
                                                                    </li>
                                                                    <li>
                                                                    <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['student_phone'];?>" target="_blank"><?php echo $row['student_phone'];?></a>                                                                   
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['student_email'];?>"><?php echo $row["student_email"];?></a>
                                                                </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                                                                        
                                                        
                                                    </article>
                                                <?php
                                                    }else{
                                                ?>
                                                    <article class="">
                                                        <?php
                                                            echo "you need to become a member to see the details";
                                                        
                                                        ?>
                                                    </article>
                                                <?php    
                                                    }
                                                ?>
                                            </section>
                                </article>
                                    
                                <?php
                                    }
                                ?>
                        </section>
                        
                        <section class="1 post__cat" id="viewPost">
                            <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                search posts
                            </header>
                             -->
                                <div class="search-result-nu" >
                                <?php 
                                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                    $city = mysqli_real_escape_string($conn, $_POST["city"]);
                                    
                                    $sql = "SELECT posts.*, std.*, study_types.*, study_categories.*, cities.* 
                                    FROM posts
                                    JOIN std
                                        ON std.student_id = posts.student_id
                                    JOIN cities
                                        ON cities.city_id = std.city_id
                                    JOIN study_types
                                        ON study_types.study_type_id = posts.study_type_id
                                    JOIN study_categories
                                        ON study_categories.category_id = posts.category_id
                                    WHERE (posts.study_type_id = 1) AND (posts.post_title LIKE '%$search%' AND std.city_id LIKE '%$city%') AND (posts.post_title LIKE '%$search%') OR (std.city_id LIKE '%$city%')
                                    ORDER BY post_date DESC";
                                    $result = mysqli_query($conn, $sql);
                                    $query_results = mysqli_num_rows($result);
                                ?>
                                <p>
                                        <?php echo $query_results; ?> results are matching
                                </p>
                            </div>
                                    <?php 
                                        
                                        while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <article class="student-post mt-5 post-sections" >
                                        <header class="post-header">
                                            <h1 class="">
                                                <?php echo $row["post_title"];?>
                                            </h1>
                                        </header>
                                        <div class="post-body">
                                            <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                            </ul>
                                        <p class="text-dark">
                                            <?php echo $row["post_detail"];?>
                                        </p>
                                        </div>
                                        <footer class="post-footer">
                                                <?php 
                                                    // echo $member;
                                                    if($member == "active"){
                                                ?>
                                                        <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                                <?php
                                                    }else{
                                                        // echo "become a member";
                                                        ?>
                                                        <a href="membership_plan.php" class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</a>
                                                        <!-- <small>you need to become a member to see the details</small> -->
                                                        <?php
                                                    }
                                                ?>
                                            </footer>

                                            <section class="student-details py-3">

                                                <?php
                                                    if($member == "active"){
                                                ?>
                                                    <article>
                                                        <header>

                                                        </header>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <figure>
                                                                    <?php
                                                                        if($row['student_photo'] == ""){
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                                    <?php
                                                                        } else {
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                                    <?php
                                                                        }
                                                                        ?>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <ul class="student-info">
                                                                    <li>
                                                                        <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["student_first_name"] ." " . $row["student_last_name"];?>    
                                                                    </li>
                                                                    <li>
                                                                    <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['student_phone'];?>" target="_blank"><?php echo $row['student_phone'];?></a>                                                                   
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['student_email'];?>"><?php echo $row["student_email"];?></a>
                                                                </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                                                                        
                                                        
                                                    </article>
                                                <?php
                                                    }else{
                                                ?>
                                                    <article class="">
                                                        <?php
                                                            echo "you need to become a member to see the details";
                                                        
                                                        ?>
                                                    </article>
                                                <?php    
                                                    }
                                                ?>
                                            </section>
                                    </article>
                                        
                                    <?php
                                        }
                                    ?>
                        </section>

                        <section  class="2 post__cat" id="composePost">
                                                       <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                search posts
                            </header>
                             -->
                             <div class="search-result-nu" >
                                <?php 
                                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                    $city = mysqli_real_escape_string($conn, $_POST["city"]);
                                    
                                    $sql = "SELECT posts.*, std.*, study_types.*, study_categories.*, cities.* 
                                    FROM posts
                                    JOIN std
                                        ON std.student_id = posts.student_id
                                        JOIN cities
                                        ON cities.city_id = std.city_id
                                    JOIN study_types
                                        ON study_types.study_type_id = posts.study_type_id
                                    JOIN study_categories
                                        ON study_categories.category_id = posts.category_id
                                    WHERE (posts.study_type_id = 2) AND (posts.post_title LIKE '%$search%' AND std.city_id LIKE '%$city%') AND (posts.post_title LIKE '%$search%') AND (std.city_id LIKE '%$city%')
                                    ORDER BY post_date DESC";
                                    $result = mysqli_query($conn, $sql);
                                    $query_results = mysqli_num_rows($result);
                                ?>
                                <p>
                                        <?php echo $query_results; ?> results are matching
                                </p>
                            </div>
                                    <?php 
                                        
                                        while($row = mysqli_fetch_assoc($result)){

                                    ?>
                                    <article class="student-post mt-5 post-sections" >
                                        <header class="post-header">
                                            <h1 class="">
                                                <?php echo $row["post_title"];?>
                                            </h1>
                                        </header>
                                        <div class="post-body">
                                            <ul class="d-flex flex-row bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                            </ul>
                                        <p class="text-dark">
                                            <?php echo $row["post_detail"];?>
                                        </p>
                                        </div>
                                        <footer class="post-footer">
                                                <?php 
                                                    // echo $member;
                                                    if($member == "active"){
                                                ?>
                                                        <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                                <?php
                                                    }else{
                                                        // echo "become a member";
                                                        ?>
                                                        <a href="membership_plan.php" class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</a>
                                                        <!-- <small>you need to become a member to see the details</small> -->
                                                        <?php
                                                    }
                                                ?>
                                            </footer>

                                            <section class="student-details py-3">

                                                <?php
                                                    if($member == "active"){
                                                ?>
                                                    <article>
                                                        <header>

                                                        </header>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <figure>
                                                                    <?php
                                                                        if($row['student_photo'] == ""){
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 200px" src="<?php echo base_url()?>img/teacher/profile_pic/male_profile.svg" alt="">
                                                                    <?php
                                                                        } else {
                                                                    ?>
                                                                            <img class="img-fluid img-rounded" style="max-height: 300px" src="<?php echo base_url() . $row['student_photo'];?>" alt="">
                                                                    <?php
                                                                        }
                                                                        ?>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <ul class="student-info">
                                                                    <li>
                                                                        <i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo $row["student_first_name"] ." " . $row["student_last_name"];?>    
                                                                    </li>
                                                                    <li>
                                                                    <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="tel:+91<?php echo $row['student_phone'];?>" target="_blank"><?php echo $row['student_phone'];?></a>                                                                   
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:<?php echo $row['student_email'];?>"><?php echo $row["student_email"];?></a>
                                                                </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                                                                        
                                                        
                                                    </article>
                                                <?php
                                                    }else{
                                                ?>
                                                    <article class="">
                                                        <?php
                                                            echo "you need to become a member to see the details";
                                                        
                                                        ?>
                                                    </article>
                                                <?php    
                                                    }
                                                ?>
                                            </section>
                                    </article>
                                        
                                    <?php
                                        }
                                    ?>
                        </section>             
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