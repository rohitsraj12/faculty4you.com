<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - trainee</title>
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous"
        />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="body-wrap">
        
    <!-- <div class="member-body-header">
        <div id="hamberger" class="hamberger">
            <span class="hamberger__line"></span>
            <span class="hamberger__line"></span>
            <span class="hamberger__line"></span>
        </div>
        <!-- end hamberger -->
        <!-- <header class="wrap-container">
            <div class="brand">
                <a href="<?php base_url();?>index.php">
                    <img src="<?php base_url();?>img/brand/header-logo.png" alt="">
                </a>
            </div> --> 
            <!-- <nav class="header__nav">
                    <ul>
                        <li class="nav__list"><a href="<?php base_url();?>student/registration.php" class="nav__link">become teacher</a></li>
                        <li class="nav__list"><a href="<?php base_url();?>teacher/registration.php" class="nav__link button-primary">trainer registration</a></li>
                    </ul>
                </nav> -->
                <!-- end header nav -->
        <!-- </header>
        </div> -->

            <div class="body-container">
            <div class="member-body-header">
                <div id="hamberger" class="hamberger">
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                    <span class="hamberger__line"></span>
                </div>
                <!-- end hamberger -->
                    <header class="wrap-container">
                        <div class="brand">
                            <a href="<?php base_url();?>index.php">
                                <img src="<?php base_url();?>img/brand/header-logo.png" alt="">
                            </a>
                        </div>
                    </header>
            </div>

            <div class="section-member wrap-container">

                <div class="container" id="container">
                    <div class="form-container sign-up-container">
                    <form action="include/login.student.inc.php" method="post"  onsubmit="return login()">
                            <h1>Welcome back</h1>
                            <div class="social-container">
                                <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                            </div>
                            <!-- <span>or use your account</span> -->
                            <input type="text" id="user_name"  placeholder="User name / Email"  name="email" />
                            <input type="password" id="password" placeholder="Password"  name="password"/>
                            <a href="<?php base_url();?>student/reset_password.php">Forgot your password?</a>
                            <button name="login-submit">Login</button>
                        </form>
                    </div>
                    <div class="form-container sign-in-container">
                        
                        <form  action="include/registration.student.inc.php" method="post" onsubmit="return registration()">
                            <h1>Create your account</h1>
                            <div class="social-container">
                                <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                            </div>
                            <!-- <span>or use your email for registration</span> -->
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="user_name" id="user_name" placeholder="user name" />
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </span>
                            <input name="email" type="email" id="email" placeholder="email" />
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </span>
                            <input name="password" type="password" id="password" placeholder="password" />
                            <span class="error-icon">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </span>
                            <input name="re_password" type="password" id="re-password" placeholder="repeat password">
                            <button  name="submit-register" >Sign Up</button>
                        </form>
                    </div>
                    <div class="overlay-container">
                        <div class="overlay">
                            <div class="overlay-panel overlay-right">
                                <h1>Hello, Student!</h1>
                                <p class="text-light">If you are already a member</p>
                                <button class="ghost" id="signIn">Login</button>
                            </div>
                            <div class="overlay-panel overlay-left">
                                <h1>Hello, Student!</h1>
                                <p class="text-light">If you are new to <strong>faculty for you</strong></p>
                                <button class="ghost" id="signUp">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    
    <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php base_url();?>js/script.js"></script>
    <script src="<?php base_url();?>js/validation.js"></script>
    
    <script>
        AOS.init();
        </script>

    <script>
        const signUpButton = document.getElementById('signIn');
        const signInButton = document.getElementById('signUp');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>
