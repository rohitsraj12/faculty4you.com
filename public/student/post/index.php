<?php

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "post";
    
    $banner_image = "post.svg";
    
    require("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
    
        require("../include/banner.inc.php");
        

    $sql = "SELECT std.*, cities.*, states.*, gender.* FROM std 
    JOIN cities
        ON cities.city_id = std.city_id
    JOIN states
        ON states.state_id = std.state_id
    JOIN gender
        ON gender.gender_id = std.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM std WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
       
    <div class="body-container">
                <main>
                    <section class="wrap-container">
                        <header class="text-primary-h text-center pb-5">
                            students Post
                        </header>

                        <section class="row pt-5">
                            <div class="col-sm-3">
                                <ul>
                                    <li class=" mb-1">
                                        <a class="w-100 btn btn-primary">
                                            view all posts
                                        </a>
                                    </li>
                                    <li class="w-100 bg-primary text-center">
                                        <a class="btn btn-primary">
                                            add new post
                                        </a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
        <?php 

        $student_id = $row['student_id'];
            
        // $query = "SELECT  posts.*, cities.*, states.* FROM posts, cities, states WHERE student_id = $student_id";
        // $query = "SELECT posts.*, cities.city_name, states.state_name FROM posts LEFT JOIN cities ON posts.city_id = cities.city_id AND RIGHT JOIN states ON posts.state_id = states.state_id WHERE student_id = $student_id";
        // $query = "SELECT posts.*, cities.city_name FROM posts LEFT JOIN cities ON posts.city_id = cities.city_id WHERE student_id = $student_id";
        
        $query = "SELECT posts.*, study_types.study_type_name, study_categories.study_cat_type 
                    FROM posts
                    JOIN study_types
                        ON study_types.study_type_id = posts.study_type_id
                    JOIN study_categories
                        ON study_categories.study_cat_id = posts.study_cat_id
                    WHERE student_id = $student_id
                    ORDER BY post_id DESC";

        $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)){
            ?>
                
          <article class="mb-5 px-5 py-3 border bg-light">
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
                            <a href="<?php base_url();?>student/post/update.php?id=<?php echo $row['post_id'];?>" style="font-size: 1.6rem" class="py-2 px-4 btn btn-primary">Edit post</a>
                        </footer>
                    </article>
                    
          <?php
            }
        ?>
        
                            
        </div>
                        </section>
        </section>

        </main>

    </div>



<?php 
    require("../include/footer.inc.php");
?>