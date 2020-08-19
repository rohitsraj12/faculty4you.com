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
                        <ul class=" border py-5 px-4">
                            <li class="study-type mb-4 pb-4 pl-2 border-bottom" data-study-type="study-type-1"><a href="#" class="text-danger text-primary h2">Academic</a></li>
                            <li class="study-type  pl-2" data-study-type="study-type-2"><a href="#"  class=" text-primary h2">Non-academic</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <section class="wrap-study-type study-type-1">

                            <?php
                             $category_query = "SELECT * FROM teachers
                             WHERE category_id = 1";
                             $category_result = mysqli_query($conn, $category_query);
                             while($row = mysqli_fetch_assoc($category_result)){
                                 echo $row["teacher_first_name"]. '</br>';
                             }
                             
                            ?>

                        </section>
                        <section class="wrap-study-type study-type-2">
                            <?php
                                $category_query = "SELECT * FROM teachers
                                WHERE category_id = 2";
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