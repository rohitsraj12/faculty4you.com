<?php
    $page_title = "faq";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include_once("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");

?>

<div class="body-container">
    <main>
        <section class="section-faq">
            <div class="section-header u-center-text">
                <heeader class="text-primary-h"> 
                    FAQ
                </header>
            </div>
            <div class="section-faq-body wrap-container"> 
                <article class="mb-4 border">
                    <header class="bg-light text-dark border-bottom faq__header">
                        some question
                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </header>
                    <footer class="py-4 h3 text-dark">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                    </footer>
                </article>
                <article class="mb-4 border">
                    <header class="bg-light text-dark border-bottom faq__header">
                        some question
                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </header>
                    <footer class="py-4 h3 text-dark">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                    </footer>
                </article>
                <article class="mb-4 border">
                    <header class="bg-light text-dark border-bottom faq__header">
                        some question
                        <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                    </header>
                    <footer class="py-4 h3 text-dark">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                    </footer>
                </article>

                
            </div>
           
        </section>
    </main>
</div>


<?php
    include_once("../private/required/public/footer.public.php");
?>
