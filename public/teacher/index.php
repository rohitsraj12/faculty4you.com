<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $page_title = "profile";
    include_once("../../private/config/config.php");
        include_once('include/header.inc.php');
        
        include_once'include/banner.inc.php';

?>
            <div class="body-container">
                <main>
                    <section class="wrap-container">
                        <header class="text-primary-h text-center">
                            Students Post
                        </header>
                    <?php 
                        // $city = $rows['city_id'];
                        
                        $sql = "SELECT posts.*, std.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                        FROM posts
                            JOIN std
                                ON std.student_id = posts.student_id
                            JOIN cities
                                ON cities.city_id = posts.city_id
                            JOIN states
                                ON states.state_id = posts.state_id
                            JOIN study_types
                                ON study_types.study_type_id = posts.study_type_id
                            JOIN study_categories
                                ON study_categories.study_cat_id = posts.study_cat_id
                            ORDER BY post_id DESC ";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                           
                    ?>


                        <article class="mt-5 px-5 py-3 border bg-light" >
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
                                <buttom style="font-size: 1.6rem" class="py-2 px-4 btn btn-primary">Contact details</buttom>
                            </footer>

                            <section>
                           
                                <article>
                                    Name: <?php echo $row["student_first_name"];?>
                                </article>
                            </section>
                        </article>
                        
                    <?php 
                        }
                    ?>

                </section>
            </main>
            </div>

<?php 
     require("include/footer.inc.php");    
?>