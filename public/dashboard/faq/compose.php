<?php 
$active = "faq";
$sub = "faq_compose";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    <div class="body-container-right"> 
        <div class="wrap-container">
        <div class="page-header">
            <div class="container">
                <header class="header-text-1" class="py-3">
                    Faq
                </header>
            </div>
        </div>
        <section class="section-faq">
            
            <article class="mb-4 border">
                <header class="bg-light text-dark border-bottom faq__header">
                    some question
                    <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </header>
                <footer class="faq__footer h3 text-dark">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                </footer>
            </article>
        </section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>