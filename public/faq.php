<?php
    $page_title = "faq";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include_once("../private/required/public/header.public.php");
    // include("../private/required/public/banner/banner.public.php");

?>

<div class="body-container">
    <main class="wrap-container">
        
    <div class="section-header u-center-text">
                        <heeader class="text-primary-h"> 
                            FAQ
                        </header>
                    </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="tab faq__tab">
                    <button class="tablinks active" data-faq="general">General FAQs</button>
                    <button class="tablinks" data-faq="student">Students FAQs</button>
                    <button class="tablinks" data-faq="teacher">Teachers FAQs</button>
                </div>
            </div>
            
            <div class="col-sm-9">
                <section class="general section-faq">
                <div class="section-faq-body wrap-container"> 
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
                    </div>
                </section>
                <section class="student section-faq">
                <div class="section-faq-body wrap-container"> 
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
                        <article class="mb-4 border">
                            <header class="bg-light text-dark border-bottom faq__header">
                                some question
                                <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </header>
                            <footer class="faq__footer h3 text-dark">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                            </footer>
                        </article> <article class="mb-4 border">
                            <header class="bg-light text-dark border-bottom faq__header">
                                some question
                                <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </header>
                            <footer class="faq__footer h3 text-dark">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, culpa. Non saepe ducimus dolore sint dolorem officiis in dolores voluptatum.</p>
                            </footer>
                        </article>
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
                    </div>
                </section>
                <section class="teacher section-faq">
                    <div class="section-faq-body wrap-container"> 
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
                    </div>
                </section>
            </div>
        </div>
        
    </main>
</div>


<?php
    include_once("../private/required/public/footer.public.php");
?>
