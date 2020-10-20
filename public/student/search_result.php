<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 
    
    $page_title = "Search result";
    require_once("../../private/config/db_connect.php");
    include("../../private/required/public/components/social_media.php");

    include("../../private/config/config.php");

    include("include/header.inc.php");
    $student_name = $_SESSION['user_name'];

    
    $sql = "SELECT students.*, cities.*, states.*, gender.* FROM students 
    LEFT JOIN cities
        ON cities.city_id = students.city_id
    LEFT JOIN states
        ON states.state_id = students.state_id
    LEFT JOIN gender
        ON gender.gender_id = students.gender_id
     WHERE student_user_name = '$student_name'";
    // $sql = "SELECT * FROM students WHERE student_user_name = '$student_name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $student_first_name = $row['student_first_name'];
 
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
                    
                if(isset($_POST["submit-search"])){
                    // security
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);
                    //echo $search;

                    $sql = "SELECT * FROM subjects WHERE sub_name LIKE '$search'";
                
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                ?>
<!--                     
                    <div class="search-result-num" >
                        <p>
                                <?php //echo $query_results; ?> results are matching
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
                        <ul class="px-4 tab row">
                            <li class="study-type pl-2 col-sm-12" data-study-type="study-type-1"><button class="tablinks active" data-study-type="all study-type-1">academic</button></li>
                            <li class="study-type col-sm-12  pl-2" data-study-type="study-type-2"><button class="tablinks" data-study-type="1 study-type-2">non-academic</button></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <section class="wrap-study-type study-type-1" id="viewPost">
                            
                                <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                    search posts
                                </header>
                                -->
                                    <div class="search-result-nu" >
                                    <?php 
                                        // $search = mysqli_real_escape_string($conn, $_POST["search"]);
                                        // echo $search;
                                        
                                        // $search = "maths";



                                        $sql = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                            FROM teachers
                                            JOIN cities
                                                ON cities.city_id = teachers.city_id
                                            JOIN subjects
                                                ON subjects.subject_id = teachers.subject_id
                                            JOIN study_categories
                                                ON study_categories.study_cat_id = teachers.study_cat_id
                                            WHERE study_categories.study_cat_id = 1 AND subjects.sub_name = '$search'";
                                        $result = mysqli_query($conn, $sql);
                                        $query_results = mysqli_num_rows($result);

                                    
                                   
                                    ?>
                                    <p>
                                            <?php echo $query_results; ?> results are matching
                                    </p>
                                </div>
                                        <?php 
                                            
                                            while($row = mysqli_fetch_assoc($result)){
                                           
                                       
                                            // fetching file from private
                                            include("../../private/required/public/student/teacher_detail.php");  
                                      
                                            }
                                        ?>
                        </section>
                        <section class=" wrap-study-type study-type-2" id="viewPost">
                                <!--     <header class="text-primary-h text-center pb-5 mb-5" >
                                    search posts
                                </header>
                                -->
                                    <div class="search-result-nu" >
                                    <?php 
                                        // $search = mysqli_real_escape_string($conn, $_POST["search"]);
                                        // echo $search;
                                        
                                        // $search = "maths";

                                        $sql = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                                            FROM teachers
                                            JOIN cities
                                                ON cities.city_id = teachers.city_id
                                            JOIN subjects
                                                ON subjects.subject_id = teachers.subject_id
                                            JOIN study_categories
                                                ON study_categories.study_cat_id = teachers.study_cat_id
                                            WHERE study_categories.study_cat_id = 2 AND subjects.sub_name = '$search'";
                                        
                                        $result = mysqli_query($conn, $sql);
                                        $query_results = mysqli_num_rows($result);

                                    
                                   
                                    ?>
                                    <p>
                                            <?php echo $query_results; ?> results are matching
                                    </p>
                                </div>
                                        <?php 
                                            
                                            while($row = mysqli_fetch_assoc($result)){

                                            // fetching file from private
                                         include("../../private/required/public/student/teacher_detail.php");  
                                      
                                            }
                                        ?>
                        </section>
                       
                                    
                    </div>
                        
                                 
                    </div>
                    
                </section>
            </div>
            <?php
            }
            ?>
    </main>
</div>
<?php 
        if(empty($student_first_name) && $page_title == "Search result"){                                                
            ?>
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header post-header">
                            <h5 class="modal-title text-light h2">Welcome to facultyforyou.com</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="h1 text-white" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="text-left py-5 post-body">
                            <p>Create your profile and post your requirement/s to see the details of Tutors on your requirement</p>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <a href="<?php base_url();?>student/profile/profile_update.php?id=<?php echo $row['student_id'];?>" type="button" class="button-primary">create profile</a>
                        </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
<?php
  include("../../private/required/public/components/agreement.php");

    include("include/footer.inc.php");

?>