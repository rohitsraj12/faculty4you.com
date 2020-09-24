<?php 
    
    // session_start();
    // //back function false
    // if(!isset($_SESSION['user_name'])){
    //     header('location: login.php');
    // }
    $page_title = "Search result teachers";
    require_once("../private/config/db_connect.php");
    include("../private/config/config.php");

    include("../private/required/public/components/social_media.php");
    include("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");
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
                // teacher profiles search result
                if(isset($_POST["search-teacher"])){
                    // security
                    $search = mysqli_real_escape_string($conn, $_POST["search"]);
                    $city = mysqli_real_escape_string($conn, $_POST["city"]);

                    $sql = "SELECT * FROM subjects WHERE sub_name LIKE '$search'";
                    // $sql = "SELECT teachers.*, cities.*, subjects.*, study_categories.* 
                    // FROM teachers
                    // JOIN cities
                    //     ON cities.city_id = teachers.city_id
                    // JOIN subjects
                    //     ON subjects.subject_id = teachers.subject_id
                    // JOIN study_categories
                    //     ON study_categories.category_id = teachers.category_id
                    //     WHERE subjects.sub_name = '$search'";
                
                    $result = mysqli_query($conn, $sql);
                    $query_results = mysqli_num_rows($result);

                    ?>
                    <div class="search-result-num" >
                        <p>
                            Total <?php echo $query_results; ?> results are matching
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
                                                                ON study_categories.category_id = teachers.category_id
                                                            WHERE (study_categories.category_id = 1  AND (subjects.sub_name = '$search' AND cities.city_name = '$city')) OR (study_categories.category_id = 1 AND subjects.sub_name = '$search') OR (study_categories.category_id = 2 AND cities.city_name = '$city') ";
                                                        
                                                        $result = mysqli_query($conn, $sql);
                                                        $query_results = mysqli_num_rows($result);

                                                    
                                                
                                                    ?>
                                                    <p>
                                                            <?php echo $query_results; ?> academic results are matching
                                                    </p>
                                                </div>
                                                        <?php 
                                                            
                                                            while($row = mysqli_fetch_assoc($result)){
                                                        
                                                    
                                                            // fetching file from private
                                                            include("../private/required/public/student/teacher_detail.php");  
                                                    
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
                                                                ON study_categories.category_id = teachers.category_id
                                                                WHERE (study_categories.category_id = 2  AND (subjects.sub_name = '$search' AND cities.city_name = '$city')) OR (study_categories.category_id = 2 AND subjects.sub_name = '$search')  OR (study_categories.category_id = 2 AND cities.city_name = '$city')";
                                                        
                                                        $result = mysqli_query($conn, $sql);
                                                        $query_results = mysqli_num_rows($result);

                                                    
                                                
                                                    ?>
                                                    <p>
                                                            <?php echo $query_results; ?> non-academic results are matching
                                                    </p>
                                                </div>
                                                        <?php 
                                                            while($row = mysqli_fetch_assoc($result)){

                                                            // fetching file from private
                                                        include("../private/required/public/student/teacher_detail.php");  
                                                    
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
        </section>
    </main>
</div>

<?php
    include("../private/required/public/footer.public.php");

?>