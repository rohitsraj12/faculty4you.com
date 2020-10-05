<?php

    require_once('../../private/config/db_connect.php');

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: login.php');
    }


    $page_title = "profile";
    include_once("../../private/config/config.php");
    include("../../private/required/public/components/social_media.php");
    include_once('include/header.inc.php');
    // include("../../private/required/public/components/search.php");

    // trnsaction email
    include("include/email/transaction.gpay.php");
    include("include/email/transaction.phonepe.php");
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
                                    <li class="study-type col-sm-12 " data-study-type="study-type-2"><button class="tablinks" data-study-type="study-type-2">Phone pe</button></li>
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
                                                <form method="POST" action="" class=" border bg-white p-5" onsubmit="return transactionTypeOne()">
                                                    <div class="form-group wrap-form pb-2">
                                                        <label for="transaction_number">Google pay UPI Transaction Id</label>
                                                        <span class="error-msg"></span>
                                                        <input type="text" class="form-control transaction_id"  id="transaction_number" name="num" placeholder="Please eneter transaction number">
                                                        <input type="hidden" class="form-control" value="google pay" name="type">
                                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                    </div>
                                                    <div class="form-group wrap-form pb-2">
                                                        <label for="phone_number">Google Pay Phone Number</label>
                                                        <span class="error-msg"></span>
                                                        <input type="tel" class="form-control phone" id="phone_number" name="gphone" placeholder="Please enter google pay phone number">
                                                    </div>
                                                    <button type="submit" class="button-primary" name="submit_googlepay">Submit</button>
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
                                                <form method="POST" action="" class=" border bg-white p-5" onsubmit="return transactionTypeTwo()" >
                                                    <div class="form-group wrap-form pb-3">
                                                        <label for="transaction_id">Payment Transaction Id</label>
                                                        <span class="error-msg"></span>
                                                        <input type="text" class="form-control phonepe_transaction_id" id="transaction_id"  name="num"  placeholder="Please eneter transaction Id">
                                                        <input type="hidden" class="form-control" value="phonePe"  name="type">

                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Payment Details</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                                    </div> -->
                                                    <button type="submit" class="button-primary" name="submit_phonepe">Submit</button>
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
  include("../../private/required/public/components/agreement.php");

    include("include/footer.inc.php");

?>