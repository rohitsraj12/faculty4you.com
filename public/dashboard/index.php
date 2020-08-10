<?php 
    require("../../private/config/config.php");
    require("../../private/config/db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
     />
     <link rel="stylesheet" href="<?php base_url();?>css/style.css">
     <link rel="stylesheet" href="style.css">

      
</head>
<body>
        <div class="body-wrap">
            <div class="body-header" data-aos="zoom-out-down" data-aos-duration="1000">
              <header class="wrap-container w-100">
                    <div class="header-brand">
                        <a href="<?php base_url();?>index.php">
                            <!-- <img src="<?php base_url();?>img/brand/header-logo.png" alt="faculty 4 you"> -->
                            facultyforyou admin
                        </a>
                    </div>
                    <!-- end header brand -->
                    <nav class="header__nav">
                        <ul>
                            <li> 
                                <label for="search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </label>
                                <input type="search">
                            </li>
                            <li class="nav__list"> <a href="#" class="nav__link">notification</a>
                                <sub class="sub__nav" >
                                    <ul>
                                        <li>1</li>
                                        <li>2</li>
                                    </ul>
                                </sub>
                            </li>
                           
                            <li class="nav__list"><a href="#" class="nav__link">profile</a>
                                <sub class="sub__nav">
                                    <ul>
                                        <li> <a href="">profile</a></li>
                                        <li> <a href="">update profile</a></li>
                                        <li> <a href="">logout</a></li>
                                    </ul>
                                </sub>
                            </li>

                        </ul>
                    </nav>
                    <!-- end header nav -->
                </header>
            </div>
            <!-- end body header -->
            <div class="body-container">
                <div class="body-container-left">
                    <ul>
                        <li>dashboard</li>
                        <li>page content</li>
                        <li>teachers</li>
                        <li>students</li>
                        
                    </ul>
                    <ul>
                        <li>sdf</li>
                        <li>asdc</li>
                    </ul>
                </div>
                <div class="body-container-right">
                
                </div>
            </div>



     <!-- script -->
     <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
            <script src="<?php base_url();?>js/owl.carousel.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script src="<?php base_url();?>js/script.js"></script>
            
            <script>
                AOS.init();
              </script>

</body>
</html>