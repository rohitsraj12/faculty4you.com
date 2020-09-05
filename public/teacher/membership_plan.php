<?php 
    
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }
    



    $page_title = "home page";
    $banner_image_url = "search";
    require_once("../../private/config/db_connect.php");
    include("../../private/config/config.php");

    include("../../private/required/public/components/social_media.php");
    include("include/header.inc.php");
    
       // include_once'include/search-banner.inc.php';
       $user_name = $_SESSION['user_name'];
       $user_query = "SELECT teachers.*, cities.* 
           FROM teachers 
           JOIN cities
               ON cities.city_id = teachers.city_id
           WHERE teacher_user_name = '$user_name'";
       $user_result = mysqli_query($conn, $user_query);
       $user_row = mysqli_fetch_assoc($user_result);

       $member = $user_row['teacher_membership_status'];

?>
<div class="body-container">

    <main>
       
        <section class="section-membership">
            <div class="wrap-container">
                <div class="section-header u-center-text">
                    <heeader class="text-primary-h"> 
                        Membership Plans
                    </header>
                </div>
            </div>

            <section class="wrap-container">
                <div class="row">
                    <div class="col-sm-4">
                        <article class="member-block member-silver">
                            <header class="member__header">
                                <h1>Faculty for you</h1>
                                <strong>Silver</strong>
                                <span>Membership</span>
                            </header>
                            <div class="member-body">

                                <ul>
                                <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>500</li>
                                    <li>5 students</li>
                                    <li>30 days validity</li>
                                </ul>
                            </div>
                            <footer class="member__footer">
                                <a href="" class="button-primary">BUY NOW</a>
                            </footer>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="member-block member-gold">
                            <header class="member__header">
                            <h1>Faculty for you</h1>
                                <strong>Gold</strong>
                                <span>Membership</span>
                                </header>
                            <div class="member-body">
                                <ul>
                                    <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>1000</li>
                                    <li>12 students</li>
                                    <li>60 days validity</li>
                                </ul>
                            </div>
                            <footer class="member__footer">
                                <a href="" class="button-primary">BUY NOW</a>
                            </footer>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="member-block member-platinum">
                            <header class="member__header">
                            
                            <h1>Faculty for you</h1>
                                <strong>Platinum</strong>
                                <span>Membership</span>
                                </header>
                            <div class="member-body">
                                <ul>
                                    <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>1500</li>                                  
                                    <li>20 students</li>
                                    <li>90 days validity</li>
                                </ul>
                            </div>
                            <footer class="member__footer">
                                <a href="" class="button-primary">BUY NOW</a>
                            </footer>
                        </article>
                    </div>
                </div>
            </section>
        </section>

    </main>
</div>

<?php
    include("include/footer.inc.php");

?>  