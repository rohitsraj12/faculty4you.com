<?php 
$active = "home";

    require("../../private/config/config.php");
    require("../../private/config/db_connect.php");
    include("include/header.inc.php");

?>

    <div class="body-container">
        <div class="wrap-container">
            <form action="../../private/required/dashboard/log_in.inc.php" method="post">
                <input type="text" id="user_name"  placeholder="User name / Email"  name="email" />
                <input type="password" placeholder="Password"  name="password"/>
                <button name="submit_login">login</button>
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
