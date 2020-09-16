<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
    include("../../private/required/public/components/social_media.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - trainee</title>
    <link rel="icon" href="<?php base_url();?>img/brand/factulyforyou_fevicon.png" type="image/gif" sizes="32x32">
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
        
      
        <div class="body-container">
            <div class="member-body-header">
                <header class="wrap-container">
                    <div class="brand">
                        <a href="<?php base_url();?>index.php">
                            <img src="<?php base_url();?>img/brand/faculty_for_you_brand.png" alt="faculty for you">
                        </a>
                    </div>
                    <div class="nav-social-media">
                        <ul>
                                <li class="nav-social__list log">Follow us : </li>
                            <?php
                            foreach($social_media_follow as $follow_name => $follow_url){
                            ?>
                            <li class="nav-social__list"><a class="nav-social__link" href="<?php echo $follow_url ;?>" target="_blank"><img src="<?php echo base_url() . 'img/social_media/' . $follow_name ;?>" alt="<?php echo $follow_name ?>"></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- <nav class="header__nav">
                            <ul>
                                <li class="nav__list"><a href="<?php base_url();?>student/registration.php" class="nav__link">become teacher</a></li>
                                <li class="nav__list"><a href="<?php base_url();?>teacher/login.php" class="nav__link button-primary">trainer login</a></li>
                            </ul>
                        </nav> -->
                        <!-- end header nav -->
                </header>
            </div>

        <div class="section-member wrap-container">

            <div class="container" id="container">
                <div class="form-container sign-up-container">
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
                        <input type="text" name="user_name" class="reg" placeholder="user name" />
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input type="tel" name="telephone" class="reg" placeholder="phone number"> 
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input name="email" type="email" class="reg" placeholder="email" />
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input name="password" type="password" class="reg regPwd" placeholder="password" />
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input name="re_password" type="password" class="reg regPwd" placeholder="repeat password">
                        <button  name="submit-register" >Sign Up</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form action="include/login.student.inc.php" method="post"  onsubmit="return logIn()">
                        <h1>Welcome back</h1>
                        <div class="social-container">
                            <!-- <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                        <!-- <span>or use your account</span> -->
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="login"  placeholder="User name / Email"  name="email" />
                        <span class="error-icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </span>
                        <input type="password" class="login" placeholder="Password"  name="password"/>
                        <a class="forgot_password" href="<?php base_url();?>student/reset_password.php">Forgot your password?</a>
                        <button name="login-submit">Login</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Hello, Student!</h1>
                            <p class="text-light">If you are already a member</p>
                            <button class="ghost" id="signIn">Login</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, student!</h1>
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
    <script src="<?php base_url();?>js/regVal.js"></script>
    
    <script>
        AOS.init();
        </script>
    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
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
