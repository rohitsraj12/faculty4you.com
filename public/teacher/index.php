<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $user_name = $_SESSION['user_name'];
    $user_query = "SELECT * FROM teachers WHERE teacher_user_name = '$user_name'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

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

                        <div class="row">
                            <div class="col-sm-2 mt-5 ">
                                <ul>
                                    <li><a href="">home learning</a></li>
                                    <li><a href="">Online learning</a></li>
                                    <li><a href="">data</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-8">
                                
                                <?php 

                                    $city = $user_row['city_id'];
                                    $member = $user_row['teacher_membership_status'];

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
                                        WHERE posts.city_id = $city
                                        ORDER BY post_id DESC ";
                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){
                                        $study_type = $row['study_type_name'];
                                ?>


                                <article class="student-post mt-5 px-5 py-3 border bg-light <?php echo $study_type;?>">
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
                                                <button class="active-member-btn btn-link">Contact details</button> </br>
                                                <!-- <small>you need to become a member to see the details</small> -->
                                                <?php
                                            }
                                            
                                        ?>
                                    </footer>

                                    <section class="student-detail">

                                        <?php
                                            if($member == "active"){
                                        ?>
                                            <article>
                                                <header>

                                                </header>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Name:
                                                    </div>
                                                    <div class="col-10">
                                                        <?php echo $row["student_first_name"];?>    
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Phone:
                                                    </div>
                                                    <div class="col-10">
                                                        <?php echo $row["student_phone"];?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2">
                                                        Email:
                                                    </div>
                                                    <div class="col-10">
                                                    <?php echo $row["student_email"];?>

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
                            </div>
                            <div class="col-sm-2">
                                <!-- <aside>
                                    <section>
                                        <article class="aside__header">
                                            online teachers requirements
                                        </article>
                                    </section>
                                </aside> -->
                            </div>
                        </div> 

                </section>
            </main>
            </div>

<?php 
     require("include/footer.inc.php");    
?>