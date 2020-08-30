<?php
    $page_title = "sitemap";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include_once("../private/required/public/header.public.php");

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
    include_once("../private/required/public/footer.public.php");
?>
