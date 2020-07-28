<?php
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "profile view";

    require_once("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
?>

<div class="body-container">
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
                            <h1 class="text-secondary">firstname lastname</h1>
                        </header>
                        <footer>
                            <ul>
                                <li>
                                email
                                </li>
                                <li>
                                phone
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
                                    <li>name</li>
                                    <li></li>
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
                                    <li></li>
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
    require("../include/footer.inc.php");
?>