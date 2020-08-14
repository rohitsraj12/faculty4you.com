<?php 
$active = "faq";
$sub = "faq_view";

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
            <?php
                $query = "SELECT * FROM faqs";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)){
            ?>
            <article class="mb-4 border">
                <header class="bg-light text-dark border-bottom faq__header">
                <?php echo $row['faq_id'];?> - <?php echo $row['faq_question'];?>
                    <span class="toggle__btn"><i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </header>
                <footer class="faq__footer h3 text-dark">
                    <p>
                    <?php echo $row['faq_answer'];?>
                    </p>
                </footer>
            </article>
            <?php 
            }
            ?>
        </section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>