<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "home";

    require("../../private/config/config.php");
    require("../../private/config/db_connect.php");
    include("include/header.inc.php");

?>
    <div class="body-container-right"> 
        <div class="wrap-container">
        <div class="page-header">
            <div class="container">
                <header class="header-text-1" class="py-3">
                    DASHBOARD
                </header>
            </div>
        </div>
        <section class="section-top">
            <div class="container">
                <div class="dashboard-top">
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            Registered trainees
                        </h2>

                        <p> 
                            <?php

                                    $query = "SELECT * FROM std";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_num_rows($result);

                                 echo $row;
                            ?>
                        </p>
                    </article>
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            Registered trainers
                        </h2>
                        <p>
                        <?php
                            $query = "SELECT * FROM teachers";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($result);
                            echo $row;
                        ?>
                        </p>
                    </article>
                    <article class="border bg-light">
                        <h2 class="text-center primary-text">
                            trainee's post
                        </h2>
                        <p>
                        <?php
                            $query = "SELECT * FROM posts";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($result);
                            echo $row;
                        ?>
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <section class="section-middle"></section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("include/footer.inc.php");
?>