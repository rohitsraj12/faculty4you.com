<?php
 require_once("../private/config/db_connect.php");
 require("../private/config/config.php");
 include("../private/required/public/components/social_media.php");

    $page_title = "Posts";
  
    include("../private/required/public/header.public.php");
?>
<div class="body-container">
    <main>
        <section class="section-search-result wrap-container">
            <div class="section-header u-center-text">
                <heeader class="text-primary-h-3"> 
                    Posts
                </header>
            </div>
                <div class="wrap-container">
                    <?php
                        $study_type_sql = "SELECT * FROM study_types ORDER BY study_type_id ASC";
                        $type_result = mysqli_query($conn, $study_type_sql);                 
                    ?>
                    <section class="row section__post">
                        <div class="col-sm-12">
                            <section class="all post__cat" id="viewPost">
                                <div class="search-result-nu" >
                                    <?php 
                                        $sql = "SELECT posts.*, students.*, study_types.*, study_categories.*, subjects_categories.*, subjects.*, cities.* 
                                        FROM posts
                                        JOIN students
                                            ON students.student_id = posts.student_id
                                        JOIN cities
                                            ON cities.city_id = students.city_id
                                        JOIN study_types
                                            ON study_types.study_type_id = posts.study_type_id
                                        JOIN study_categories
                                            ON study_categories.study_cat_id = posts.study_cat_id
                                        JOIN subjects_categories
                                            ON subjects_categories.sub_cat_id = posts.sub_cat_id
                                        JOIN subjects
                                            ON subjects.subject_id = posts.subject_id
                                        ORDER BY post_id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        $query_results = mysqli_num_rows($result);
                                    ?>
                                    <p>
                                        <?php echo $query_results; ?> results are matching
                                    </p>
                                </div>
                                    <?php 
                                        while($row = mysqli_fetch_assoc($result)){
                                            include("../private/required/public/teacher_search.php");
                                        }
                                    ?>
                            </section>
                        </div>
                    </section>
                </div>
        </section>
    </main>
</div>





<?php
    include("../private/required/public/components/agreement.php");
    include("../private/required/public/footer.public.php");
?>