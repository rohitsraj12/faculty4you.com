<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    $page_title = "Home page";
    require_once('../../private/config/db_connect.php');
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");

    $teacher_name = $_SESSION['user_name'];

    $sql = "SELECT teachers.*, cities.*, states.*, gender.*, subjects.* FROM teachers 
    LEFT JOIN cities
        ON cities.city_id = teachers.city_id
    LEFT JOIN states
        ON states.state_id = teachers.state_id
    LEFT JOIN gender
        ON gender.gender_id = teachers.gender_id
    LEFT JOIN subjects
        ON subjects.subject_id = teachers.subject_id
    WHERE teacher_user_name = '$teacher_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['teacher_id'];
    $teacher_first_name = $row['teacher_first_name'];
    include_once('include/header.inc.php');

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $student_query = "SELECT * FROM students WHERE student_id = '$id'";
        $student_result = mysqli_query($conn, $student_query);
        $student_row = mysqli_fetch_assoc($student_result);
        echo $student_row['student_first_name'];
    }        

?>
    <div class="body-container">
        <main>
            <section class="wrap-container">
                <header class="text-primary-h-3 text-center">
                    Students Post
                </header>
                <div class="row">
                    <div class="col-sm-3 mt-5">
                        <ul class="px-4 tab row">
                            <li class="study-type col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="study-type-1">online tuition</button></li>
                            <li class="study-type col-sm-12 " data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">home tuition - <?php echo $user_row['city_name'];?></button></li>
                            <li class="study-type col-sm-12 " data-study-type="study-type-3"><button class="tablinks" data-study-type="study-type-3">Any</button></li>
                        </ul>
                    </div>
                    <?php
                        if(empty($teacher_first_name)){
                            ?>
                                <div class="col-sm-9">
                                    <header class="text-primary-h-3 mt-5">
                                        <p>Create your profile to show student posts on your expert knowledge. <a href="<?php base_url() ;?>teacher/profile/profile_update.php">create update</a></p>
                                    </header>
                                </div>
                            <?php
                        } else {
                            ?>

                                <div class="col-sm-9">
                                    <section class="wrap-study-type study-type-1">
                                        <?php 
                                        $member = $user_row['teacher_membership_status'];
                                        $subject = $user_row['subject_id'];

                                        $home_sql = "SELECT posts.*, subjects.*, subjects_categories.*, students.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                                        FROM posts
                                            JOIN students
                                                ON students.student_id = posts.student_id
                                            JOIN cities
                                                ON cities.city_id = posts.city_id
                                            JOIN states
                                                ON states.state_id = posts.state_id
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.study_cat_id = posts.study_cat_id
                                            JOIN subjects_categories
                                                ON subjects_categories.sub_cat_id = posts.sub_cat_id
                                            JOIN subjects
                                                ON subjects.subject_id = posts.subject_id
                                            WHERE ((posts.study_type_id = 1) AND (posts.post_state = 1) AND (block_date NOT BETWEEN now() AND DATE_ADD(now(), INTERVAL 48 HOUR))) AND (posts.subject_id = $subject)  
                                            ORDER BY post_id DESC ";
                                        $home_result = mysqli_query($conn, $home_sql);
                                        $query_results = mysqli_num_rows($home_result);

                                        if($query_results > 0){
                                            while($row = mysqli_fetch_assoc($home_result)){
                                                $study_type = $row['study_type_name'];
                                                    
                                        ?>
                                                <article class="student-post mt-5 post-sections">
                                                    <header class="post-header">
                                                        <h1 class="">
                                                            <?php echo $row["post_title"];?>
                                                        </h1>
                                                    </header>
                                                    <div class="post-body">
                                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal">
                                                            <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                            <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                            <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_cat_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                        </ul>
                                                        <p class="text-dark">
                                                            <?php echo $row["post_detail"];?>
                                                        </p>
                                                    </div>
                                                    <footer class=" post-footer">
                                                        <?php 
                                                            $member_query = "SELECT * FROM memberships WHERE teacher_id = $teacher_id";
                                                            $member_result = mysqli_query($conn, $member_query);
                                                            $member_row = mysqli_fetch_assoc($member_result);
                        
                                                            $start = $member_row['membership_starting_date'];
                                                            $exp = $member_row['membership_expiry_date'];
                                                            $date = date("Y - m - d");

                                                            $token = $member_row['member_token'];

                                                            if($token > 0){
                                                            // echo $token;
                                                                $token_left = $token;
                                                                $token = $token - 1;

                                                                if($token > -1){
                                                                    //echo "<p>You have " . $token_left ." token left in your membership.</p>";
                                                                    ?>
                                                                    <form action="<?php base_url();?>teacher/include/tokens.php" method="POST">
                                                                        <input type="hidden" value="<?php echo $member_row['membership_id'];?>" name="membership_id">
                                                                        <input type="hidden" value="<?php echo $token;?>" name="token">
                                                                        <input type="hidden" value="<?php echo $row['student_id'];?>" name="student" >
                                                                        <input type="hidden" value="<?php echo $row['student_first_name'] . ' ' . $row['student_last_name'];?>" name="student_name" >
                                                                        <input type="hidden" value="<?php echo $row['student_phone'];?>" name="student_phone" >
                                                                        <input type="hidden" value="<?php echo $row['student_email'];?>" name="student_email" >
                                                                        <input type="hidden" value="<?php echo $row['post_id'];?>" name="post" >
                                                                        <button class="button-primary" type="submit" name="token_update">Student detail</button>                                                                
                                                                    </form>
                                                                                    
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <a href="membership_plan.php" class=" button-primary">Contact details</a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </footer>
                                                </article>
                                        <?php 
                                            }
                                            } else{
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
                                    <section class="wrap-study-type study-type-2">
                                        <?php 
                                            $city = $user_row['city_id'];
                                        
                                            $home_sql = "SELECT posts.*, subjects.*, subjects_categories.*, students.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                                            FROM posts
                                                JOIN students
                                                    ON students.student_id = posts.student_id
                                                JOIN cities
                                                    ON cities.city_id = posts.city_id
                                                JOIN states
                                                    ON states.state_id = posts.state_id
                                                JOIN study_types
                                                    ON study_types.study_type_id = posts.study_type_id
                                                JOIN study_categories
                                                    ON study_categories.study_cat_id = posts.study_cat_id
                                                JOIN subjects_categories
                                                    ON subjects_categories.sub_cat_id = posts.sub_cat_id
                                                JOIN subjects
                                                    ON subjects.subject_id = posts.subject_id
                                                WHERE ((posts.study_type_id = 2) AND (posts.city_id = $city) AND (posts.post_state = 1) AND (block_date NOT BETWEEN now() AND DATE_ADD(now(), INTERVAL 48 HOUR))) AND (posts.subject_id = $subject) 
                                                ORDER BY post_id DESC ";
                                            $home_result = mysqli_query($conn, $home_sql);
                                            $query_results = mysqli_num_rows($home_result);

                                            if($query_results > 0){
                                                while($row = mysqli_fetch_assoc($home_result)){
                                                    $study_type = $row['study_type_name'];
                                                    
                                        ?>
                                        <article class="student-post mt-5 post-sections">
                                            <header class="post-header">
                                                <h1 class="">
                                                    <?php echo $row["post_title"];?>
                                                </h1>
                                            </header>
                                            <div class="post-body">
                                                <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal">
                                                    <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                    <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                    <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                    <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                    <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                                </ul>
                                                <p class="text-dark">
                                                    <?php echo $row["post_detail"];?>
                                                </p>
                                            </div>
                                            
                                            <footer class=" post-footer">
                                                        <?php 
                                                            $member_query = "SELECT * FROM memberships WHERE teacher_id = $teacher_id";
                                                            $member_result = mysqli_query($conn, $member_query);
                                                            $member_row = mysqli_fetch_assoc($member_result);
                        
                                                            $start = $member_row['membership_starting_date'];
                                                            $exp = $member_row['membership_expiry_date'];
                                                            $date = date("Y - m - d");

                                                            $token = $member_row['member_token'];

                                                            if($token > 0){
                                                            // echo $token;
                                                                $token_left = $token;
                                                                $token = $token - 1;

                                                                if($token > -1){
                                                                    //echo "<p>You have " . $token_left ." token left in your membership.</p>";
                                                                    ?>
                                                                    <form action="<?php base_url();?>teacher/include/tokens.php" method="POST">
                                                                        <input type="hidden" value="<?php echo $member_row['membership_id'];?>" name="membership_id">
                                                                        <input type="hidden" value="<?php echo $token;?>" name="token">
                                                                        <input type="hidden" value="<?php echo $row['student_id'];?>" name="student" >
                                                                        <input type="hidden" value="<?php echo $row['student_first_name'] . ' ' . $row['student_last_name'];?>" name="student_name" >
                                                                        <input type="hidden" value="<?php echo $row['student_phone'];?>" name="student_phone" >
                                                                        <input type="hidden" value="<?php echo $row['student_email'];?>" name="student_email" >
                                                                        <input type="hidden" value="<?php echo $row['post_id'];?>" name="post" >
                                                                        <button class="button-primary" type="submit" name="token_update">Student detail</button>                                                                
                                                                    </form>
                                                                                    
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <a href="membership_plan.php" class=" button-primary">Contact details</a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </footer>
                                            </footer>
                                                        <?php
                                                        }
                                                        ?>
                                        </article>
                                         <?php 
                                            
                                        } else{
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
                                    <section class="wrap-study-type study-type-3">
                                        <?php 
                                        $city = $user_row['city_id'];
                                    
                                        $home_sql = "SELECT posts.*, subjects.*, subjects_categories.*, students.*, cities.*, states.state_name, study_types.study_type_name, study_categories.study_cat_type 
                                        FROM posts
                                            JOIN students
                                                ON students.student_id = posts.student_id
                                            JOIN cities
                                                ON cities.city_id = posts.city_id
                                            JOIN states
                                                ON states.state_id = posts.state_id
                                            JOIN study_types
                                                ON study_types.study_type_id = posts.study_type_id
                                            JOIN study_categories
                                                ON study_categories.study_cat_id = posts.study_cat_id
                                            JOIN subjects_categories
                                                ON subjects_categories.sub_cat_id = posts.sub_cat_id
                                            JOIN subjects
                                                ON subjects.subject_id = posts.subject_id
                                            WHERE ((posts.study_type_id = 3) AND (posts.post_state = 1) AND (block_date NOT BETWEEN now() AND DATE_ADD(now(), INTERVAL 48 HOUR))) AND (posts.subject_id = $subject) 
                                            ORDER BY post_id DESC ";
                                        $home_result = mysqli_query($conn, $home_sql);
                                        $query_results = mysqli_num_rows($home_result);

                                        if($query_results > 0){
                                            while($row = mysqli_fetch_assoc($home_result)){
                                                $study_type = $row['study_type_name'];
                                                    
                                                    ?>
                                                <article class="student-post mt-5 post-sections">
                                                    <header class="post-header">
                                                        <h1 class="">
                                                            <?php echo $row["post_title"];?>
                                                        </h1>
                                                    </header>
                                                    <div class="post-body">
                                                        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal">
                                                            <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
                                                            <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
                                                            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
                                                            <li class="mr-5"><i class="fa fa-certificate mr-2" aria-hidden="true"></i><?php echo $row["sub_name"];?></li>
                                                        </ul>
                                                        <p class="text-dark">
                                                            <?php echo $row["post_detail"];?>
                                                        </p>
                                                    </div>
                                                    <footer class=" post-footer">
                                                        <?php 
                                                            $member_query = "SELECT * FROM memberships WHERE teacher_id = $teacher_id";
                                                            $member_result = mysqli_query($conn, $member_query);
                                                            $member_row = mysqli_fetch_assoc($member_result);
                        
                                                            $start = $member_row['membership_starting_date'];
                                                            $exp = $member_row['membership_expiry_date'];
                                                            $date = date("Y - m - d");

                                                            $token = $member_row['member_token'];

                                                            if($token > 0){
                                                            // echo $token;
                                                                $token_left = $token;
                                                                $token = $token - 1;

                                                                if($token > -1){
                                                                    //echo "<p>You have " . $token_left ." token left in your membership.</p>";
                                                                    ?>
                                                                    <form action="<?php base_url();?>teacher/include/tokens.php" method="POST">
                                                                        <input type="hidden" value="<?php echo $member_row['membership_id'];?>" name="membership_id">
                                                                        <input type="hidden" value="<?php echo $token;?>" name="token">
                                                                        <input type="hidden" value="<?php echo $row['student_id'];?>" name="student" >
                                                                        <input type="hidden" value="<?php echo $row['student_first_name'] . ' ' . $row['student_last_name'];?>" name="student_name" >
                                                                        <input type="hidden" value="<?php echo $row['student_phone'];?>" name="student_phone" >
                                                                        <input type="hidden" value="<?php echo $row['student_email'];?>" name="student_email" >
                                                                        <input type="hidden" value="<?php echo $row['post_id'];?>" name="post" >
                                                                        <button class="button-primary" type="submit" name="token_update">Student detail</button>                                                                
                                                                    </form>
                                                                                    
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <a href="membership_plan.php" class=" button-primary">Contact details</a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </footer>
                                                       
                                                    </article>
                                                <?php 
                                            }
                                        } else{
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
                                </div>
                            <?php
                        }
                    ?>
                </div> 
            </section>
        </main>
    </div>
<?php 
    include("../../private/required/public/components/agreement.php");
    require("include/footer.inc.php");    
?>