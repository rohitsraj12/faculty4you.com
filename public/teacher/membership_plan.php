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
                    <heeader class="text-primary-h-3"> 
                       Membership Plans
                    </header>
                </div>
            </div>

            <section class="wrap-container">
                <div class="row">
                <!-- offset-sm-1 -->
                    <div class="col-sm-4">
                        <article class="member-block member-silver">
                            <header class="member__header">
                                <h1>Faculty for you</h1>
                                <div class="wrap-price">
                                    <strong>Silver Membership</strong>
                                    <p>Rs <em>500</em></p>
                                </div>
                            </header>
                            <div class="member-body">
                                <p>
                                    By purchasing of this membership:
                                </p>
                                <ul>
                                <!-- <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>500</li> -->
                                    <!-- <li>5 students</li>
                                    <li>30 days validity</li> -->
                                    <li>
                                        You can see the contact details of five students related to the subject/activity that you have registered within 30 days
                                    </li>
                                    <li>
                                        Students from all over India looking for tuition related to your subject/activity can see the details and contact you through message, call, e-mail up to 30 days from the day of activation of your membership.
                                    </li>
                                </ul>
                                
                                <div class="confirm-agreement text-center mt-5">
                                    <input class="agree__input mr-2" type="checkbox" id="silver"> <label for="silver">agree</label> <a data-toggle="modal" data-target="#silver" class="" href="#">terms and conditions</a>
                                </div>
                            </div>
                            <footer class="member__footer">
                                <a  href="#" class="button-primary buy__button">BUY NOW</a>
                            </footer>
                        </article>
                        
                        <div class="modal fade" id="silver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Silver Membership Terms and Condition</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="payment_method.php" type="button" class="btn btn-primary">Continue</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <article class="member-block member-gold">
                            <header class="member__header">
                            <h1>Faculty for you</h1>
                                <div class="wrap-price">
                                    <strong>Gold Membership</strong>
                                    <p>Rs <em>1000</em></p>
                                </div>
                                </header>
                            <div class="member-body">
                                
                                <p>
                                    By purchasing of this membership:
                                </p>
                                <ul>
                                    <!-- <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>1000</li> -->
                                    <!-- <li>12 students</li>
                                    <li>60 days validity</li> -->
                                    <li>
                                        You can see the contact details of eleven students related to the subject/activity that you have registered within 60 days.
                                    </li>
                                    <li>
                                        Students from all over India looking for tuition related to your subject/activity can see the details and contact you through message, call, e-mail up to 60 days from the day of activation of your membership.
                                    </li>
                                </ul>
                                
                                
                                <div class="confirm-agreement text-center mt-5">
                                <input class="agree__input mr-2" type="checkbox" id="gold"> <label for="gold">agree</label> <a data-toggle="modal" data-target="#silver" class="" href="#">terms and conditions</a>
                                </div>
                            </div>
                            <footer class="member__footer">
                                <a href="#" class="button-primary buy__button">BUY NOW</a>
                            </footer>
                        </article>
                        
                        <div class="modal fade" id="gold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gold Membership Terms and Condition</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="payment_method.php" type="button" class="btn btn-primary">Continue</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <article class="member-block member-platinum">
                            <header class="member__header">
                            
                            <h1>Faculty for you</h1>
                            <div class="wrap-price">
                                <strong>Platinum Membership</strong>
                                <p>Rs <em>1500</em></p>
                            </div>
                                </header>
                            <div class="member-body">
                                
                                <p>
                                    By purchasing of this membership:
                                </p>
                                <ul>
                                    <!-- <li class="member-body__list"><i class="fa fa-inr" aria-hidden="true"></i>1500</li>                                   -->
                                    <!-- <li>20 students</li>
                                    <li>90 days validity</li> -->
                                    <li>
                                        You can see the contact details of eighteen students related to the subject/activity that you have registered within 90 days.
                                    </li>
                                    <li>
                                        Students from all over India looking for tuition related to your subject/activity can see the details and contact you through message, call, e-mail up to 90 days from the day of activation of your membership.
                                    </li>
                                </ul>
                                
                                
                                <div class="confirm-agreement text-center mt-5">
                                    <input class="agree__input mr-2" type="checkbox" id="platinum"> <label class="label" for="platinum">agree</label> <a data-toggle="modal" data-target="#silver" class="" href="#">terms and conditions</a>
                                </div>
                            </div>
                            <footer class="member__footer">
                                <a  href="#"  class="button-primary buy__button">BUY NOW</a>
                            </footer>
                        </article>
                        
                        <div class="modal fade" id="platinum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Platinum Membership Terms and Condition</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="payment_method.php" type="button" class="btn btn-primary">Continue</a>
                                </div>
                                </div>
                            </div>
                        </div>
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