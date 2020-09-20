<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }

    $user_name = $_SESSION['user_name'];
    $user_query = "SELECT teachers.*, cities.* 
        FROM teachers 
        JOIN cities
            ON cities.city_id = teachers.city_id
        WHERE teacher_user_name = '$user_name'";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);

    $teacher_id = $user_row['teacher_id'];

    $page_title = "profile";
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include_once('include/header.inc.php');
    // include("../../private/required/public/components/search.php");
?>


<div class="body-container">
                <main>
                    <section class="wrap-container">
                        <!-- <header class="text-primary-h-3 text-center">
                            Make Payment
                        </header> -->

                        <div class="row">
                            <div class="col-sm-3 mt-5">
                                <ul class="px-4 tab row">
                                    <li class="study-type col-sm-12 " data-study-type="study-type-1"><button class="tablinks  active" data-study-type="study-type-1">Google pay</button></li>
                                    <li class="study-type col-sm-12 " data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">Phone pay</button></li>
                                    <!-- <li class="study-type col-sm-12" data-study-type="study-type-1"><button class="tablinks" data-study-type="study-type-1">Paytm</button></li> -->
                                </ul>
                            </div>
                            <div class="col-sm-9 payment-body">
                               
                                <section class="wrap-study-type study-type-1">
                                    <header  class="text-primary-h-3 mb-5 pb-3 text-center">
                                            Google pay Payment

                                    </header>
                                   

                                   
                                   <div class="row">
                                        <div class="col-sm-4">
                                            <header  class="section-payment__form">
                                                <header class="h1 mb-5 text-center">
                                                Scan here
                                            </header>
                                            <figure>
                                                <img src="../img/payment_qr_code/gpay.png" width="100%" alt="paytm">
                                            </figure>
                                        </div>
                                        
                                        <div class="col-sm-8">
                                            <div class="section-payment__form">
                                                <header class="h1 mb-5 text-center">
                                                    Share your phone number
                                                </header>
                                                <form method="POST" action="" class=" border bg-white p-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Google pay phone Number</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Payment Details</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                                    </div> -->
                                                    <button type="submit" class="button-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="wrap-study-type study-type-2">
                                   
                                    <header  class="text-primary-h-3 mb-5 pb-3 text-center">
                                            PhonePe Payment

                                    </header>
                                   

                                   <div class="row">
                                        <div class="col-sm-4">
                                            <header  class="h1 mb-5 text-center">
                                                Scan here
                                            </header>
                                            <figure>
                                                <img src="../img/payment_qr_code/phone_pay.png" width="100%" alt="paytm">
                                            </figure>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="section-payment__form">
                                                <header class="h1 mb-5 text-center">
                                                    Share your transaction id
                                                </header>
                                                <form method="POST" action="" class=" border bg-white p-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Payment Transaction Id</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Payment Details</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                                    </div> -->
                                                    <button type="submit" class="button-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- <section class="wrap-study-type study-type-3">
                                    paytm

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <header  class="h1 mb-5 text-center">
                                                Scan here
                                            </header>
                                            <figure>
                                                <img src="../img/payment_qr_code/paytm.jpg" width="100%" alt="paytm">
                                            </figure>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="section-payment__form">
                                                <header class="h1 mb-5 text-center">
                                                    Share your transaction Number
                                                </header>
                                                <form method="POST" action="" class=" border bg-white p-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Payment Transaction Number</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                       
                                                    </div>
                                                    <button type="submit" class="button-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section> -->
                            </div>
                        </div> 

                    </section>
                </main>
            </div>



<?php
    include("include/footer.inc.php");

?>