<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $page_title = "profile";
    include_once("../../private/config/config.php");
        include_once'include/header.inc.php';
    while($row = mysqli_fetch_assoc($result)){
?>

                
<div class="header__profile u-right-text text-sub-primary">
    <i class="fa fa-user" aria-hidden="true"></i>                        
    <?php 
        echo $row['teacher_user_name'];
    
    }
    ?>
</div>
<?php 
        include_once'include/banner.inc.php';

?>

            <div class="body-container">
                <main>
                    <section class="wrap-container">
                        <header class="text-primary text-center">
                            students Post
                        </header>
                    <?php 
                        include('include/teacher.query.inc.php');
                        while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <h1><?php echo $row["teacher_user_name"]?></h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate placeat saepe doloremque omnis aspernatur iure consequuntur minima odit libero tenetur, ullam nam at accusantium, dignissimos voluptatibus, inventore quisquam magni quo.
                    </p>
                    <?php 
                        }
                    ?>

                </section>
            </main>
            </div>

<?php 
     require("include/footer.inc.php");    
?>