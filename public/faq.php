<?php
    $page_title = "Faq";
    require("../private/config/config.php");
    require_once("../private/config/db_connect.php");
    include("../private/required/public/components/social_media.php");
    include_once("../private/required/public/header.public.php");
?>
<div class="body-container">
    <main class="wrap-container">      
        <div class="section-header u-center-text">
            <heeader class="text-primary-h-3"> 
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
                        <?php
                            $general_query = "SELECT * FROM faqs WHERE faq_category = 'general'";
                            $general_result = mysqli_query($conn, $general_query);

                            while($rows = mysqli_fetch_assoc($general_result)){
                        ?>
                            <article class="mb-4 border post-sections">
                                <header class="text-light border-bottom faq__header post-header">
                                    <?php echo $rows['faq_question'];?>
                                    <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </header>
                                <footer class="faq__footer post-body h3 text-dark">
                                    <p><?php echo $rows['faq_answer'];?></p>
                                </footer>
                            </article>
                        <?php
                            }
                        ?>   
                    </div>
                </section>
                <section class="student section-faq">
                    <div class="section-faq-body wrap-container"> 
                        <?php
                            $general_query = "SELECT * FROM faqs WHERE faq_category = 'student'";
                            $general_result = mysqli_query($conn, $general_query);

                            while($rows = mysqli_fetch_assoc($general_result)){
                        ?>
                        <article class="mb-4 border post-sections">
                            <header class="text-light border-bottom faq__header post-header">
                                <?php echo $rows['faq_question'];?>
                                <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </header>
                            <footer class="faq__footer post-body h3 text-dark">
                                <p><?php echo $rows['faq_answer'];?></p>
                            </footer>
                        </article>
                        <?php
                            }
                        ?>   
                    </div>
                </section>
                <section class="teacher section-faq">
                    <div class="section-faq-body wrap-container"> 
                        <?php
                            $general_query = "SELECT * FROM faqs WHERE faq_category = 'teacher'";
                            $general_result = mysqli_query($conn, $general_query);

                            while($rows = mysqli_fetch_assoc($general_result)){
                        ?>
                        <article class="mb-4 border post-sections">
                            <header class="text-light border-bottom faq__header post-header">
                                <?php echo $rows['faq_question'];?>
                                <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </header>
                            <footer class="faq__footer post-body h3 text-dark">
                                <p><?php echo $rows['faq_answer'];?></p>
                            </footer>
                        </article>
                        <?php
                            }
                        ?>   
                    </div>
                </section>
            </div>
        </div> 
    </main>
</div>
<?php
  include("../private/required/public/components/agreement.php");
  include_once("../private/required/public/footer.public.php");
?>