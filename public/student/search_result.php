<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    
    $page_title = "home page";
    require_once("../../private/config/db_connect.php");
    include("../../private/required/public/components/social_media.php");

    include("../../private/config/config.php");

    include("include/header.php");
 
 ?>
 
 
                 
     <div class="header__profile u-right-text text-sub-primary">
         <i class="fa fa-user" aria-hidden="true"></i>                        
         <?php 
            echo $row['student_user_name'];
         ?>
     </div>

 <div class="body-container">
    <main>
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
                    <div class="search__form mb-5 bg-light border p-5">
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
                            <!-- </div> -->
                        </form>
                    </div>
                    
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
                        <div class="tab" >
                            <button class="tablinks active" data-post="view__post">Search result</button>
                            <!-- <button class="tablinks" data-post="compose__post">city</button>
                            <button class="tablinks" data-post="compose__post">city</button> -->
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <!-- <section  class="view__post post__cat" id="viewPost">
                            <header class="text-primary-h text-center pb-5 mb-5" >
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
                                    ON study_categories.category_id = posts.study_cat_id
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
                            <article class="mb-5 px-5 py-3 border bg-light" >
                                <header class="border-bottom">
                                    <h1 class="h1 py-3 text-dark font-weight-normal">
                                        <?php echo $row["post_title"];?>
                                    </h1>
                                </header>
                                <div class="body mb-4">
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
                                <footer class="pb-3">
                                            <?php 
                                                // echo $member;
                                                if($member == "active"){
                                            ?>
                                                    <button class="active-member-btn btn btn-link" style="font-size: 1.6rem">Contact details</button>
                                            <?php
                                                }else{
                                                    // echo "become a member";
                                                    ?>
                                                    <button class="active-member-btn btn btn-link"  style="font-size: 1.6rem">Contact details</button> </br>
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
                                                                    <i class="fa fa-phone pr-2" aria-hidden="true"></i><a href="#"><?php echo $row["student_phone"];?></a>                                                                    
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="#"><?php echo $row["student_email"];?></a>
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
                        <section  class="compose__post post__cat" id="composePost">
                            <div class="section-profile-update">
                                <header class="text-primary-h text-center pb-5 mb-5" >
                                    Compose new post
                                </header>
                            </div>
                        </section>             
                    </div>
                </section>
            </div>
            <?php
            }
            ?>
    </main>
    </main>
</div>

<?php
    include("include/footer.php");

?>