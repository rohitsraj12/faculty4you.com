<?php
    $page_title = "faq";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include_once("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");

?>

<div class="body-container">
    <main>
        <section class="section-sitemap">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary-h"> 
                    site map
                </header>
            </div>
        </section>
    </main>
</div>


<?php
    include_once("../private/required/public/footer.public.php");
?>