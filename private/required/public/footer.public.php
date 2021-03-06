

        <?php
            include("../private/required/public/components/agreement.php");

        ?>
    <div class="body-footer" >    
        <footer class="wrap-container text-light pt-5">
            <div class="row">
                    <section class="col-sm-4 mb-4">
                        <article>
                            <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                                
                                facultyforyou
                            </header>
                            <p class="text-light h4">We provide top <strong>tutors</strong> for <strong>academic/non-academic</strong> and <strong>online/offline</strong> activities. <strong>Faculty for you</strong>  is the best platform which helps you in reaching your destination.</p>
                        </article>
                    </section>
                    <section class="col-sm-5">
                        <article>
                            <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                                Quick links
                            </header>
                            <div class="row footer-list">
                                <ul class="col-sm-4">
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>index.php"> home</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>testimonials.php"> testimonials</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>contact_us.php"> contact us</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>faq.php"> faq</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>site_map.php"> site map</a></li>
                                </ul>
                                <ul class="col-sm-4">
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>student/registration.php">student registration</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>student/login.php">student login</a></li>
                                </ul>
                                <ul class="col-sm-4">
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>teacher/registration.php">tutor registration</a></li>
                                    <li class="pb-2"><a class="text-light h4" href="<?php echo base_url();?>teacher/login.php">tutor login</a></li>
                                </ul>
                            </div>
                        
                        </article>
                    </section>
                    <section class="col-sm-3">
                        <article>
                            <header class="h2 border-bottom border-white-50 mb-5 pb-4">
                                Follow us                   
                            </header>
                            <div class="social-media">
                                <ul class="">
                                    <?php
                                    foreach($social_media_follow as $follow_name => $follow_url){
                                    ?>
                                    <li class="social__list"><a class="social__link" href="<?php echo $follow_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $follow_name ;?>" alt="<?php echo $follow_name ?>"></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </article>
                    </section>

            </div>
        </footer>
        <div class="footer-base p-3">
            <ul class="wrap-container">
                <li class="footer-base__list">copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2014 - <?php echo date("Y");?>  <a class="footer-base__link" href="<?php echo base_url();?>">facultyforyou.com</a> </li>
                <li class="footer-base__list"><a class="footer-base__link" href="#" data-toggle="modal" data-target="#agreement">terms and conditions</a></li>
                <li class="footer-base__list">Developed by <a class="footer-base__link" href="https://github.com/rohitsraj12" target="_blank">rohit</a></li>
            </ul>
        </div>
    </div>
            <!-- end body footer -->

        <!-- script -->
            <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
            <script src="<?php base_url();?>js/owl.carousel.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            <script src="<?php base_url();?>js/script.js"></script>
            
            <script>
                // AOS.init();
                $(document).ready(function(){
                // ajax search subjects
                    $(".search_subject").keyup(function () {
                        var query = $(this).val();
                        // alert(query);
                        if (query != "") {
                        $.ajax({
                            url: "aj/load_data.php",
                            method: "POST",
                            data: { subject: query },
                            success: function (data) {
                            $(".subject-list").slideDown();
                            $(".subject-list").html(data);
                            },
                        });
                        } else {
                        $(".subject-list").slideUp();
                        $(".subject-list").html();
                        }
                    });
                    $(".subject-list").on('click', 'li', function(){
                        // alert('hi');
                        $('.search_subject').val($(this).text());
                        $('.subject-list').slideUp();
                    
                    })

                    
                // ajax search subjects
                    $(".city_name").keyup(function () {
                        var query = $(this).val();
                        // alert(query);
                        if (query != "") {
                        $.ajax({
                            url: "aj/load_data.php",
                            method: "POST",
                            data: { city: query },
                            success: function (data) {
                            $(".city_list").slideDown();
                            $(".city_list").html(data);
                            },
                        });
                        } else {
                        $(".city_list").slideUp();
                        $(".city_list").html();
                        }
                    });
                    $(".city_list").on('click', 'li', function(){
                        // alert('hi');
                        $('.city_name').val($(this).text());
                        $('.city_list').slideUp();
                    
                    })
                })
              </script>
    </body>
</html>