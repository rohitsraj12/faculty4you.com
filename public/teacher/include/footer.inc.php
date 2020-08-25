<?php
$social_media = [
    "<i class='fa fa-facebook-official' aria-hidden='true'></i>" => "www.facebook.com",
    "<i class='fa fa-instagram' aria-hidden='true'></i>" => "www.instagram.com",
    "<i class='fa fa-twitter-square' aria-hidden='true'></i>" => "www.twitter.com"
];
?>

<div class="body-footer">


    <footer class="wrap-container text-light pt-5">
            <div class="row">
                <section class="col-sm-3">
                    <article>
                        <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                            
                            faculty4you
                        </header>
                        <p class="text-light h4">we provide top trainers for academic/non-academic and online/offline activities. Faculty for you is the best platform which helps you in reaching your destination.</p>
                    </article>
                </section>
                <section class="col-sm-6">
                    <article>
                        <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                            Quick links
                        </header>
                        <div class="row">
                            <ul class="col-sm-4">
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>teacher/index.php"> home</a></li>
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>faq.php"> faq</a></li>
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>site_map.php"> site map</a></li>
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>logout.php"> logout</a></li>
                            </ul>
                            <ul class="col-sm-4">
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>teacher/profile/index.php"> view my profile</a></li>
                                <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>teacher/profile/profile_update.php"> update profile</a></li>
                            </ul>
                        </div>
                     
                    </article>
                </section>
                <section class="col-sm-3">
                    <article>
                        <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                            Follow                        
                        </header>
                        <div class="social-media">
                            <ul class="">
                                <?php
                                foreach($social_media as $name => $url){
                                ?>
                                <li class="social__list"><a class="social__link" href="<?php echo $url ;?>" target="_blank"><?php echo $name;?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </article>
                </section>

        </div>
    </footer>
    <div class="footer-base bg-primary p-3">
        <ul class="wrap-container">
            <li class="footer-base__list">copyright 2014-2020 <a class="footer-base__link" href="<?php echo base_url();?>teacher/index.php">facultyforyou.com</a> </li>
            <li class="footer-base__list"><a class="footer-base__link" href="#">terms and conditions</a></li>
            <li class="footer-base__list">Developed by <a class="footer-base__link" href="#"></a></li>
        </ul>
    </div>
</div>
            <!-- end body footer -->
        </div>
        <!-- end body wrap -->

        <!-- script -->
            <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
            <script src="<?php base_url();?>js/owl.carousel.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script src="<?php base_url();?>js/script.js"></script>
            <script src="<?php base_url();?>js/validation.js"></script>
            
            <script>
                AOS.init();
              </script>
    </body>
</html>