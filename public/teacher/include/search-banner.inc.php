<div class="body-banner-search">
<div class="banner-wrap">
    <section class="banner-content">
        <article>
            <header class="banner-content__header">
                <!-- <h2 class="text-primary">search top teachers </h2> -->
                <h5 class="text-secondary-h">
                    we provide top <strong>trainers</strong> for <strong class="highlight-primary">online</strong> and <strong class="highlight-primary">home tution</strong> all over india    
                </h5>
            </header>
            <div class="banner-content-body">
                <form action="<?php base_url();?>teacher/search_result.php" method="POST" class="banner__form">
                    <input type="text" name="search" placeholder="search top teachers city / subject / category"  class="banner-search" >
                    <button type="submit" name="submit-search" class="banner__button" ><i class="fa fa-search"aria-hidden="true"></i></button>
                </form>
                <p>
                    <span class="highlight-secondary">Current  trending courses:</span> <strong class="note-primary">IIT-JEE</strong>, <strong class="note-primary">NEET</strong>, <strong class="note-primary">Dance</strong>, <strong class="note-primary">Yoga</strong>
                </p>
            </div>
        </article>
    </section>
    <!-- end banner content -->
    <div class="banner-image">
        <img src="<?php base_url();?>img/<?php echo $banner_image_url;?>.svg" class="banner__image" alt="">
    </div>
    <!-- end banner imager -->
</div>
<!-- end banner wrap -->
</div>