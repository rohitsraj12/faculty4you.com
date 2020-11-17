<?php
    $page_title = "Sitemap";
    require_once("../private/config/db_connect.php");
    require("../private/config/config.php");
    include("../private/required/public/components/social_media.php");
    include_once("../private/required/public/header.public.php");


    $query = "SELECT * FROM subjects WHERE sub_cat_id = 8";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['sub_name'] . "</br>";
    }
?>

<div class="body-container">
    <main>
        <section class="section-sitemap">
            <div class="wrap-container">
                <div class="section-header u-center-text">
                    <heeader class="text-primary-h-3"> 
                        Site map
                    </header>
                </div>
                <div class="section-sitemap-body">
                    <article>
                        <ul class="section-sitemap-main">
                            <li>
                                <a href="<?php base_url();?>index.php">Home</a>
                            </li>
                            <li> <a href="<?php base_url();?>teacher/index.php">Trainer</a>
                                <ul>
                                    <li> <a href="<?php base_url();?>teacher/login.php">Login</a></li>
                                    <li> <a href="<?php base_url();?>teacher/registration.php">Register</a></li>
                                </ul>
                            </li>
                            <li> <a href="<?php base_url();?>student/index.php">Trainee</a>
                                <ul>
                                    <li> <a href="<?php base_url();?>student/login.php">Login</a></li>
                                    <li> <a href="<?php base_url();?>student/registration.php">Register</a></li>
                                </ul>
                            </li>
                            <li> <a href="<?php base_url();?>faq.php">Faq</a></li>
                            <li> <a href="<?php base_url();?>">Testimonial</a></li>
                            <li> <a href="<?php base_url();?>student/post/post.php">Post</a></li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>
    </main>
</div>

<?php
  include("../private/required/public/components/agreement.php");

    include_once("../private/required/public/footer.public.php");
?>
