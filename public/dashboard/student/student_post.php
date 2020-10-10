<?php
 session_start();
 //back function false
 if(!isset($_SESSION['user_name'])){
     header('location: ../index.php');
 }


$active = "student";
$sub = "studentPost";

   require("../../../private/config/db_connect.php");
   require("../../../private/config/config.php");
   include("../include/header.inc.php");
?>
   <div class="body-container-right"> 
   <?php    
   if(!empty($_GET['message'])){
       ?>
       <div class="alert alert-primary" role="alert">
            <?php  echo "Post has been successfully deleted.!";?>
        </div>
    <?php
   }
?>
       <div class="wrap-container">
            <div class="page-header">
                <div class="container">
                    <header class="header-text-1" class="py-3">
                        Students Posts
                    </header>
                </div>
            </div>
            <div class="header-tab wrap-container">
                <ul class="header-tab-wrap">
                    <li class="header-tab__button active-tab" data-header-tab="tab-1">De-activated posts</li>
                    <li class="header-tab__button" data-header-tab="tab-2">Active posts</li>
                    <li class="header-tab__button" data-header-tab="tab-3">Applied post</li>
                    <li class="header-tab__button" data-header-tab="tab-4">Expired post</li>
                </ul>
                <div class="tab-1 tab-detail active-tab-detail">
                    <div class="container">
                        <header class="header-text-3">
                                deactivated post
                            </header>
                    </div>
                    <section class="section-faq">
                    
                        <?php
                        
                        $post_query = "SELECT posts.*, subjects.*, std.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
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
                                ON study_categories.category_id = posts.category_id
                            JOIN subjects
                                ON subjects.subject_id = posts.subject_id
                        WHERE post_state = 0 ORDER BY post_id ASC";
                        $post_result = mysqli_query($conn, $post_query);

                            while($row = mysqli_fetch_assoc($post_result)){ 
                        ?>
                                <article class="mb-4 border">
                                    <header class="bg-light text-dark border-bottom faq__header">
                                        <?php echo $row['post_title'];?> - [ <?php echo $row['post_date'];?> ]
                                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </header>
                                    <footer class="faq__footer h3 text-dark">
                                        <p>
                                            <?php echo $row['post_detail'];?>
                                        </p>
                                        <a class="btn btn-danger" href="<?php base_url();?>dashboard/include/delete_post.php?post_id=<?php echo $row['post_id'];?>">DELETE</a>
                                    </footer>
                                </article>

                        <?php
                            }

                        ?>
                    </section>
                </div>
                <div class="tab-2 tab-detail">
                    <div class="container">
                        <header class="header-text-3">
                            active post
                        </header>
                    </div>
                    <section class="section-faq">
                    
                        <?php
                        
                        $post_query = "SELECT * FROM posts WHERE post_state = 1 ORDER BY post_id ASC";
                        $post_result = mysqli_query($conn, $post_query);

                            while($row = mysqli_fetch_assoc($post_result)){ 
                        ?>
                                <article class="mb-4 border">
                                    <header class="bg-light text-dark border-bottom faq__header">
                                        <?php echo $row['post_title'];?>
                                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </header>
                                    <footer class="faq__footer h3 text-dark">
                                        <p>
                                        <?php echo $row['post_detail'];?>
                                        </p>
                                    </footer>
                                </article>

                        <?php
                            }

                        ?>
                    </section>
                </div>
                <div class="tab-3 tab-detail">
                    <div class="container">
                        <header class="header-text-3">
                            teacher viewed post
                        </header>
                    </div>
                    <section class="section-faq">
                    
                        <?php
                        
                        $post_query = "SELECT * FROM posts WHERE post_state = 1 AND block_date BETWEEN now() AND DATE_ADD(now(), INTERVAL 48 HOUR) ORDER BY block_date ASC";
                        $post_result = mysqli_query($conn, $post_query);

                            while($row = mysqli_fetch_assoc($post_result)){ 
                        ?>
                                <article class="mb-4 border">
                                    <header class="bg-light text-dark border-bottom faq__header">
                                        <?php echo $row['post_title'] . " [" . $row['block_date'] . "]";?>
                                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </header>
                                    <footer class="faq__footer h3 text-dark">
                                        <p>
                                            <?php echo $row['post_detail'];?>
                                        </p>
                                    </footer>
                                </article>

                        <?php
                            }

                        ?>
                    </section>
                </div>
                <div class="tab-4 tab-detail">
                    <div class="container">
                        <header class="header-text-3">
                            expired posts
                        </header>
                    </div>
                    <section class="section-faq">
                    
                        <?php
                        
                        $post_query = "SELECT posts.*, std.* FROM posts 
                            JOIN std
                                ON std.student_id = posts.student_id
                        WHERE post_state = 2 ORDER BY block_date ASC";
                        $post_result = mysqli_query($conn, $post_query);

                            while($row = mysqli_fetch_assoc($post_result)){ 
                        ?>
                                <article class="mb-4 border">
                                    <header class="bg-light text-dark border-bottom faq__header">
                                        <?php echo $row['post_title'] . " [" . $row['block_date'] . "]";?>
                                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </header>
                                    <footer class="faq__footer h3 text-dark">
                                        <ul class="row border-botton pb-3">
                                            <li class="col-2">
                                                <?php echo $row['student_first_name'];?>
                                            </li>
                                            <li class="col-4">
                                            <?php echo $row['student_email'];?> 

                                            </li>
                                            <li class="col-4">
                                                +91<?php echo $row['student_phone'];?>
                                            </li>
                                            <li class="col-2">
                                            <a class="btn btn-link btn-sm" href="<?php base_url()?>dashboard/student/student_detail.php?id=<?php echo $row['student_id'];?>">More detail</a>
                                            </li>
                                        </ul>
                                        <p>
                                            <?php echo $row['post_detail'];?>
                                        </p>
                                        <button class="btn btn-success">activate post</button>
                                        <button class="btn btn-danger">deactivate post</button>
                                    </footer>
                                </article>

                        <?php
                            }

                        ?>
                    </section>
                </div>
            </div>

<?php
    include("../include/footer.inc.php");
?>