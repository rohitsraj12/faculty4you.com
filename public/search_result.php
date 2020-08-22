<?php 
    
    // session_start();
    // //back function false
    // if(!isset($_SESSION['user_name'])){
    //     header('location: login.php');
    // }
    $page_title = "home page";
    require_once("../private/config/db_connect.php");
    include("../private/config/config.php");

    include("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");
?>

<div class="body-container">

    <main>
        <section class="section-search-result wrap-container">

            <?php
                if(isset($_POST["submit-search"])){
                    // security
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);

                    $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                ?>
                    <div class="section-header u-center-text">
                        <heeader class="text-primary-h"> 
                            Search result
                        </header>
                    </div>

                    <div class="search__form">
                        <form action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="search" class="form-control" id="inputAddress" placeholder="">
                            </div>
                            <div class="col-sm-3">
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>   
                            </div>
                            <div class="col-sm-3">
                            <input class="button-primary" type="submit" value="search">
                            
                            </div>
                        </div>
                            
                            
                            <!-- </div> -->
                            
                            
                        </form>
                    </div>
                    
                    <div class="search-result-num" >
                        <p>
                                <?php echo $query_results; ?> results are matching
                        </p>

                    </div>
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

            <div class="container">
                <section class="row section__post">
                    <div class="col-sm-3">
                        <div class="tab" >
                            <button class="tablinks active" data-post="view__post">Search result</button>
                            <button class="tablinks" data-post="compose__post">city</button>
                            <button class="tablinks" data-post="compose__post">city</button>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <!-- <section  class="view__post post__cat" id="viewPost">
                            <header class="text-primary-h text-center pb-5 mb-5" >
                                search posts
                            </header>
                            
                        <div class="search-result-num" >
                        <p>
                                <?php echo $query_results; ?> results are matching
                        </p>
                    </div> -->
                            <?php 
                                $search = mysqli_real_escape_string($conn, $_POST["search"]);

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
                                <form action="../include/post.inc.php" method="post" class="bg-light border py-5 px-5" >
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input name="post_title" class="form-control" type="text" id="title" placeholder="user name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="about">About me</label>
                                        <textarea name="post_detail" class="form-control" rows="10" id="about" placeholder="Briefly explain about yourself"></textarea>
                                        
                                    </div>
                                    <div class="row">
                                        <fieldset class="form-group col-sm-12">
                                            <div class="row">
                                                <label class="label col-form-label col-sm-3 pt-0">Study type</label>
                                                <div class="col-sm-9 row">
                                                    <div class="form-check col-sm-4">
                                                        <input class="form-check-input" name="study_type" type="radio" value="1" id="single">
                                                    
                                                        <label class="form-check-label" for="single">
                                                            Online one to one
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input class="form-check-input" name="study_type" type="radio" value="2" id="group">
                                                    
                                                        <label class="form-check-label" for="group">
                                                            Online group
                                                        </label>
                                                    </div>
                                                    <div class="form-check col-sm-4">
                                                        <input class="form-check-input" name="study_type" type="radio" value="3" id="home">
                                                    
                                                        <label class="form-check-label" for="home">
                                                            Home
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset> 
                                        <fieldset class="form-group col-sm-12">
                                            <div class="row">
                                                <label class="label col-form-label col-sm-3 pt-0">Study category</label>
                                                <div class="col-sm-9 row">
                                                    <div class="form-check col-sm-4">
                                                        <input class="form-check-input" name="study_category" type="radio" value="1" id="academic">
                                                    
                                                        <label class="form-check-label" for="academic">
                                                            Academic
                                                        </label>
                                                    </div>

                                                    <div class="form-check col-sm-4">
                                                        <input class="form-check-input" name="study_category" type="radio" value="2" id="non-academic">
                                                    
                                                        <label class="form-check-label" for="non-academic">
                                                            Non-academic
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="">
                                        <input type="submit" style="font-size: 1.6rem;" class="py-2 px-4 btn-lg btn btn-primary" name="submit-post" value="submit">
                                        <input type="reset"  style="font-size: 1.6rem;" class="btn btn-lg  btn btn-outline-secondary" value="reset">

                                    </div>
                                    
                                </form>
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
    include("../private/required/public/footer.public.php");

?>