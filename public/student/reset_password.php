<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student reset password</title>
</head>
<body>
    
    <form action="include/reset-request.inc.php" method="post">
        <label for="">Reset password</label>
        <input type="text" name="email">
        <button type="submit" name="reset-request-submit" >Receive new password by mail</button>

    </form>
   
</body>
</html>

<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - teacher</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="body-wrap">
        
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
                <nav class="header__nav">
                        <ul>
                            <!-- <li class="nav__list"><a href="<?php base_url();?>student/registration.php" class="nav__link">become teacher</a></li> -->
                            <li class="nav__list"><a href="<?php base_url();?>teacher/login.php" class="nav__link button-primary">trainer login</a></li>
                        </ul>
                    </nav>
                    <!-- end header nav -->
            </header>
        </div>

        <div class="body-container">
        <div class="section-member wrap-container">

            <div class="container" id="container">
                <div class="form-container sign-in-container">
                <?php
                    if(isset($_GET['reset'])){
                        if($_GET['reset'] == "success"){
                            echo "<p>please check your email..</p>";
                        }
                    }
                
                ?>
                    <form action="include/reset-request.inc.php" method="post" >
                        <h1>Forgot password</h1>
                        <div class="social-container">
                            
                            <p>
                            Enter the email address you used when you joined and we’ll send you instructions to reset your password.
                            </p>
                            <p>
                            For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.
                            </p>
                        </div>
                        <!-- <span>or use your account</span> -->

                        <input type="text" id="user_name"  placeholder="Email"  name="email" />
                        <button name="reset-request-submit">Login</button>
                    </form>
                </div>
                <!-- <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                            <h1>Forgot password</h1>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div> -->
            </div>
            </div>
        </div>
    </div>
    

    
    <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php base_url();?>js/script.js"></script>
    
    <script>
        AOS.init();
        </script>
    <script>
    // const signUpButton = document.getElementById('signUp');
    // const signInButton = document.getElementById('signIn');
    // const container = document.getElementById('container');

    // signUpButton.addEventListener('click', () => {
    //     container.classList.add("right-panel-active");
    // });

    // signInButton.addEventListener('click', () => {
    //     container.classList.remove("right-panel-active");
    // });
    </script>
</body>
</html>
