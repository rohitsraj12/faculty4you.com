<?php 
$active = "home";

    require("../../private/config/config.php");
    require("../../private/config/db_connect.php");
    include("include/header.inc.php");

?>

    <div class="body-container">
        <div class="wrap-container">
            <form action="../../private/required/dashboard/register.inc.php" method="post">
                <input type="text" name="user_name" id="user_name" placeholder="user name" />
                <input name="email" type="email" id="email" placeholder="email" />
                <input name="password" type="password" id="password" placeholder="password" />
                <input name="re_password" type="password" id="re-password" placeholder="repeat password">
                <button  name="submit-register" >Sign Up</button>
            </form>
        </div>
    </div>
    

    
    <script src="<?php base_url();?>js/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?php base_url();?>js/script.js"></script>
    
    <script>
        AOS.init();
        </script>
</body>
</html>
