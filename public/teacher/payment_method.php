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

    if(isset($_POST['submit'])){
        $membership_type = $_GET['membership_type'];
        $transaction_type = $_POST['type'];
        $transaction_id = $_POST['num'];
        $gpay_transaction_phone_number = $_POST['gphone'];

        $admin_email = "admin@facultyforyou.com";

        $teacher_name = $user_row['teacher_first_name'] . " " . $user_row['teacher_last_name'];
        $teacher_email = $user_row['teacher_email'];
        $teacher_phone = $user_row['teacher_phone'];


        


          //send email to admin
          $to = $admin_email;
          $subject = "New " . $membership_type . " membership application";
          $message = "<p>Dear,</p></br>";
          $message .= "<table> <tr><th></th> <th>details</th></tr>";
          $message .= "<tr><td>teacher Id: </td><td>" . $teacher_id . "</td></tr>";
          $message .= "<tr><td>teacher Name: </td><td>" . $teacher_name . "</td></tr>";
          $message .= "<tr><td>teacher email id: </td><td>" . $teacher_email . "</td></tr>";
          $message .= "<tr><td>teacher phone Number: </td><td>" . $teacher_phone . "</td></tr>";
          $message .= "<tr><td>transaction mode: </td><td><b>" . $transaction_type . "</b></td></tr>";
          $message .= "<tr><td>google pay transaction phone number: </td><td><b>" . $transaction_type . "</b></td></tr>";
          $message .= "<tr><td>transaction Id: </td><td><b>" . $transaction_id . "</b></td></tr>";
          $message .= "</table>";
          $message .= "<p>Thank you.,</p>";
          $message .= "<p>" . $teacher_name . "</p>";
          
          $headers = "From:  " . $teacher_name . " <" . $teacher_email . ">\r\n";
          $headers .= "Reply-To: " . $teacher_email . "\r\n";
          $headers .= "Content-type: text/html\r\n";
      
          mail($to, $subject, $message, $headers);

         //send email to teacher
         $to = $teacher_email;
         $subject = "hi " . $teacher_name . ", thanks for becoming " . $membership_type . " member of facultyforyou.com";
         $message = "<p>Dear " . $teacher_name . ",</p></br>";
         $message .= "<p>Thank you for buying " . $membership_type . " membership. Your membership will activate within 24 hours. We are sure that you have chosen a surefire way to get yourself succeed.</p></br>";
         $message .= "<p>Thank you,</p>";
         $message .= "<p>Facultyforyou.com</p>";
         $message .= "<div><img width='250px' src='http://facultyforyou.com/img/brand/faculty_for_you_brand.png'></div>";
         
         $headers = "From: facultyforyou.com <" . $admin_email . ">\r\n";
         $headers .= "Reply-To: " . $admin_email . "\r\n";
         $headers .= "Content-type: text/html\r\n";
     
         mail($to, $subject, $message, $headers);
?>
            <div class="alert alert-success m-0" role="alert">
                <div class="wrap-container h3 py-4">
                    <p>   
                        Thank you for buying <?php echo $membership_type?> membership. Your membership will activate within 24 hours. We are sure that you have chosen a surefire way to get yourself succeed.
                    </p>
                    <p>
                    Thank you,
                    </p>
                </div>
            </div>
 <?php           
    }
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
                                                    <button type="submit" class="button-primary" name="submit">Submit</button>
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
                                                    <button type="submit" class="button-primary" name="submit">Submit</button>
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