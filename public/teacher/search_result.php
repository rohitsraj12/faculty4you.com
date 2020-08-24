<?php 
    
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    $page_title = "home page";
    $banner_image_url = "search";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("include/header.inc.php");
    
       // include_once'include/search-banner.inc.php';

?>
<div class="body-container">

    <main>
    <section class="section-search-result wrap-container">
                    <div class="section-header u-center-text">
                        <heeader class="text-primary-h"> 
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
                        <div class="search-result-nu" >
                        <p>
                                <?php echo $query_results; ?> results are matching
                        </p>
                    </div>
                            <?php 
                                $search = mysqli_real_escape_string($conn, $_POST["search"]);
                                $city = mysqli_real_escape_string($conn, $_POST["city"]);

                                $sql = "SELECT posts.*, study_types.study_type_name, study_categories.study_cat_type 
                                FROM posts
                                JOIN study_types
                                    ON study_types.study_type_id = posts.study_type_id
                                JOIN study_categories
                                    ON study_categories.study_cat_id = posts.study_cat_id
                                WHERE post_title LIKE '%$search%'
                                ORDER BY post_date DESC";
                                $result = mysqli_query($conn, $sql);
                                $query_results = mysqli_num_rows($result);


                                
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
                                        <!-- <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php// echo $row["city_name"];?></li> -->
                                    </ul>
                                <p class="text-dark">
                                    <?php echo $row["post_detail"];?>
                                </p>
                                </div>
                                <footer class="pb-3">
                                    <a href="<?php base_url();?>teacher/registration.php" style="font-size: 1.6rem" class="py-2 px-4 btn btn-primary">Sign up</a>
                                    <!-- <a href="<?php base_url();?>teacher/login.php">log in</a> -->
                                </footer>
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
</div>

<?php
    include("include/footer.inc.php");

?>