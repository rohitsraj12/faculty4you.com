<?php
if(isset($_POST['submit_googlepay'])){
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
          $message .= "<tr><td>google pay transaction phone number: </td><td><b>" . $gpay_transaction_phone_number . "</b></td></tr>";
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
         $subject = "hi " . $teacher_name . ", thanks for buying " . $membership_type . " member of facultyforyou.com";
         $message = "<p>Dear " . $teacher_name . ",</p></br>";
         $message .= "<p>Thank you for buying " . $membership_type . " membership. Your membership will activate after the verification of your payment details by faculty for you team within 24 hours.</p></br>";
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
                        Thankyou for buying <?php echo $membership_type?> membership. Your membership will activate after the verification of your payment details by faculty for you team within 24 hours.
                    </p>
                    <p>
                    Thank you,
                    </p>
                </div>
            </div>
 <?php           
    }
?>