

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <?php 

        require("../../private/config/config.php");
        require("../../private/config/db_connect.php");

    ?>
<!-- 
    <div class="body-container">
        <div class="wrap-container">
            <form action="include/log_in.inc.php" method="post" onsubmit="return validation()">
                <input type="text" id="user_name"  placeholder="User name / Email"  name="email" />
                <input type="password" id="password" placeholder="Password"  name="password"/>
                <button name="submit_login">Login</button>
            </form>
        </div>
    </div> -->
    
    <div class="body__wrap">
        <div class="body__header bg-danger pt-5 pb-4">
            <header class="text-white h3 text-center">
                Faculty For You Admin Login
            </header>
        </div>
    
        <div class="container pt-5">
            <form action="include/log_in.inc.php" method="post" onsubmit="return validation()" class="w-50 m-auto bg-light border p-5">
            
                <div class="form-group">
                    <label for="user_name">Email address</label>
                    <input type="text" id="user_name"  placeholder="User name / Email" name="email" />
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password" name="password"/>
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit_login">Login</button>
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
