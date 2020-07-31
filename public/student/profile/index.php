<?php
    $page_title = "profile";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
     
    // $sql = "SELECT * FROM std";

    // $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
?>



<div class="body-container">
                
    <div class="header__profile u-right-text text-sub-primary">
        <i class="fa fa-user" aria-hidden="true"></i>                        
        <?php 
            // echo $row['student_user_name'];
        ?>
    </div>

    <main class="wrap-container profile">
        <section class="section-profile">
            <div class="section-header u-center-text"  data-aos="zoom-out-up" data-aos-duration="1000">
                <heeader class="text-primary"> 
                    my profile
                </header>
                
            </div>
            <div class="section-body">
                <section class="section-short-info">
                    <article class="article-profile" data-aos="zoom-out-up" data-aos-duration="1000">
                        <figure>
                            <img src="" alt="">
                        </figure>
                        <header class="u-center-text">
                            <h1 class="text-secondary">
                            <?php 
                                echo $row['student_first_name'];
                            ?>
                            </h1>
                        </header>
                        <footer>
                            <ul>
                                <li>
                                
                            <?php 
                                echo $row['student_email'];
                            ?>
                                </li>
                                <li>
                                
                            <?php 
                                echo $row['student_phone'];
                            ?>
                                </li>
                            </ul>
                        </footer>
                    </article>
                </section>
                <section class="section-detail-info">
                    <article class="article-profile" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="article__header">
                            about me
                        </header>
                        <div class="article-body">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus, ipsa!
                        </p>
                        </div>
                    </article>
                    <article class="article-profile" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="article__header">
                            personal detail
                        </header>
                        <div class="article-body">
                            <div class="article-info">
                                <ul>
                                    <li>
                                    <li>name</li>
                                        <?php 
                                            echo $row['student_first_name'] . " " . $row['student_last_name'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>phone</li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>email</li>
                                    <li>
                                        
                                
                            <?php 
                                echo $row['student_email'];
                            ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="article-info">
                                <ul>
                                    <li>address</li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="article-profile" data-aos="zoom-out-up" data-aos-duration="1000">
                        <header class="article__header">
                            professional detail
                        </header>
                        <div class="article-body">
                        
                        <div class="article-info">
                                <ul>
                                    <li>experience</li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>tuition type</li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            
                            <div class="article-info">
                                <ul>
                                    <li>subject</li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </section>
    </main>
</div>
<?php
    }
    require("../include/footer.inc.php");
?>