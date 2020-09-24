<?php 
    
    // session_start();
    // //back function false
    // if(!isset($_SESSION['user_name'])){
    //     header('location: login.php');
    // }
    $page_title = "Search result student posts";
    require_once("../private/config/db_connect.php");
    include("../private/config/config.php");

    include("../private/required/public/components/social_media.php");
    include("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");
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
                // student post search results
                if(isset($_POST["submit-search"])){
                    // security
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);
                    $city = mysqli_real_escape_string($conn, $_POST["city"]);

                    $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%' ";
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                    ?>

                    <!-- <section class="section-body">                     
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
                    </section>       -->
                        <div class="wrap-container">
                            <?php
                                $study_type_sql = "SELECT * FROM study_types ORDER BY study_type_id ASC";
                                $type_result = mysqli_query($conn, $study_type_sql);                 
                            ?>
                            <section class="row section__post">
                                <div class="col-sm-3">
                                    <ul class="tab" >
                                        <li class="study-type col-sm-12"><button class="tablinks active" data-post="all">All results</button></li>
                                        <?php
                                            while($row = mysqli_fetch_assoc($type_result)){
                                        ?>
                                                <li class="study-type col-sm-12"><button class="tablinks" data-post="<?php echo $row['study_type_id'];?>"><?php echo $row['study_type_name'];?></button></li>
                                        <?php
                                            }
                                        ?>
                                        <!-- <button class="tablinks" data-post="<?php //echo $type_row['study_type_id']?>">Online learning</button> -->
                                    </ul>
                                </div>
                                <div class="col-sm-9">
                                    <section class="all post__cat" id="viewPost">
                                        <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                            search posts
                                        </header>
                                        -->
                                            <div class="search-result-nu" >
                                            <?php 
                                                $search = mysqli_real_escape_string($conn, $_POST["search"]);

                                                $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                                // echo $city;
                                                
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
                                                WHERE (posts.post_title LIKE '%$search%' AND cities.city_name LIKE '%$city%') OR (posts.post_title LIKE '%$search%')
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
                                                <article class="mt-3 post-sections" >
                                                    <header class="post-header">
                                                        <h1 class="">
                                                            <?php echo $row["post_title"];?>
                                                        </h1>
                                                    </header>
                                                    <div class="post-body">
                                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
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
                                                        <a href="<?php base_url();?>teacher/registration.php" style="font-size: 1.6rem" class="active-member-btn btn btn-link">Sign up</a>
                                                        <!-- <a href="<?php base_url();?>teacher/login.php">log in</a> -->
                                                    </footer>
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
                                                WHERE posts.study_type_id = 1 AND posts.post_title LIKE '%$search%'
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
                                                <article class="mt-3 post-sections" >
                                                    <header class="post-header">
                                                        <h1 class="">
                                                            <?php echo $row["post_title"];?>
                                                        </h1>
                                                    </header>
                                                    <div class="post-body mb-4">
                                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
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
                                                        <a href="<?php base_url();?>teacher/registration.php" style="font-size: 1.6rem" class="active-member-btn btn btn-link">Sign up</a>
                                                        <!-- <a href="<?php base_url();?>teacher/login.php">log in</a> -->
                                                    </footer>
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
                                                WHERE (posts.study_type_id = 2) AND (posts.post_title LIKE '%$search%' AND cities.city_name LIKE '%$city%') AND (posts.post_title LIKE '%$search%')
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
                                                <article class="mt-3 post-sections" >
                                                    <header class="post-header">
                                                        <h1 class="">
                                                            <?php echo $row["post_title"];?>
                                                        </h1>
                                                    </header>
                                                    <div class="post-body mb-4">
                                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
                                                            <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                            <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                        </ul>
                                                    <p class="text-dark">
                                                        <?php echo $row["post_detail"];?>
                                                    </p>
                                                    </div>
                                                    <footer class="post-footer pb-3">
                                                        <a href="<?php base_url();?>teacher/registration.php" style="font-size: 1.6rem" class="active-member-btn btn btn-link">Sign up</a>
                                                        <!-- <a href="<?php base_url();?>teacher/login.php">log in</a> -->
                                                    </footer>
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
        </section>
    </main>
</div>

<?php
    include("../private/required/public/footer.public.php");

?>