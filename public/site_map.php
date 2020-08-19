<?php
    $page_title = "faq";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include_once("../private/required/public/header.public.php");

?>

<div class="body-container">
    <main>
        <section class="section-sitemap">
            <div class="wrap-container">
                <div class="section-header u-center-text">
                    <heeader class="text-primary-h"> 
                        Site map
                    </header>
                </div>
                <div class="section-sitemap-body">
                    <article>
                        <ul class="section-sitemap-main">
                            <li>
                                <a href="">home</a>
                            </li>
                            <li> <a href="">trainer</a>
                                <ul>
                                    <li> <a href="">login</a></li>
                                    <li> <a href="">register</a></li>
                                </ul>
                            </li>
                            <li> <a href="">trainee</a>
                                <ul>
                                    <li> <a href="">login</a></li>
                                    <li> <a href="">register</a></li>
                                </ul>
                            </li>
                            <li> <a href="">faq</a></li>
                            <li> <a href="">testimonial</a></li>
                            <li> <a href="">post</a></li>
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
