
<?php
    include_once("../../private/config/config.php");
    require_once('../../private/config/db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
                        <li class="nav__list">Not a member? <a class="nav__link" href="<?php base_url();?>teacher/registration.php">Sign up now</a></li>
                        </ul>
                    </nav>
                    <!-- end header nav -->
            </header>
        </div>

        <div class="body-container">
        <div class="section-forgotpwd wrap-container">

            <div class="container" id="container">
                <div class="form-container password-container">
                    <?php
                        if(isset($_GET['reset'])){
                            if($_GET['reset'] == "success"){
                            ?>
                            <div  class="success_message" role="alert">
                            <p>please check your email....</p>
                            </div>
                            <?php
                            }
                        }
                    
                    ?>
                    <form action="include/reset-request.inc.php" method="post" >
                        <h1>Forgot password</h1>
                        <div class="social-container">
                            
                            <p>
                            Enter the email address you used when you joined and we’ll send you instructions to reset your password. For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.
                            </p>
                        </div>
                        <!-- <span>or use your account</span> -->

                        <input type="text" id="user_name"  placeholder="Email"  name="email" />
                        <button name="reset-request-submit">Send reset instructions</button>
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
