<article class="mt-3 post-sections" >
    <header class="post-header">
        <h1 class="">
            <?php echo $row["post_title"];?>
        </h1>
    </header>
    <div class="post-body">
        <ul class="d-flex flex-row flex-wrap bd-highlight py-4 h4 font-weight-normal text-secondary">
            <li class="mr-5"><i class="fa fa-calendar mr-2" aria-hidden="true"></i><?php echo $row["post_date"];?></li>
            <li class="mr-5"><i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i><?php echo $row["study_type_name"];?></li>
            <li class="mr-5"><i class="fa fa-university mr-2" aria-hidden="true"></i><?php echo $row["study_cat_type"];?></li>
            <li class="mr-5"><i class="fa fa-map-marker mr-2" aria-hidden="true"></i><?php echo $row["city_name"];?></li>
        </ul>
    <p class="text-dark">
        <?php echo $row["post_detail"];?>
    </p>
    </div>
    <footer class="post-footer">
        <a class="button-primary mr-5" href="<?php base_url();?>student/login.php">Log In</a>
        <a class="button__link-primary" href="<?php base_url();?>student/registration.php">Sign Up</a>
    </footer>
</article>
    