<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }

    $active = "teacher";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
        

    <?php
         if(isset($_REQUEST['submit_member'])){
            //checking  for empty field
            if(($_REQUEST['expDate'] == "" || $_REQUEST['membership_type'] == "" || $_REQUEST['number'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                
                $id = $_GET['id'];

                $date = date("Y/m/d");
                $exp = $_REQUEST['expDate'];
                $type = $_REQUEST["membership_type"];
                $token = $_REQUEST['number'];
                $status = "1";
    
                $query = "INSERT INTO memberships (`teacher_id`, `membership_type`, `member_token`, `membership_starting_date`, `membership_expiry_date`, `membership_status`) 
                  VALUES ('$id', '$type', '$token', '$date', '$exp', '$status')";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted testimonial.!";
                    
                        // header('Location: ../testimonial/index.php');
                    ?>
                </div>
            <?php 
                }else{
                    die("Database query failed " . mysqli_connect_error($conn));
                }
            }
        }            
    ?>
        <div class="wrap-container">
        <div class="page-header">
            <div class="container">
                <header class="header-text-1" class="py-3">
                    Add Membership
                </header>
            </div>
        </div>
        <section class="section-faq">
            <?php 
                $id = $_GET['id'];

                $sql = "SELECT * FROM teachers WHERE teacher_id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
                    
               <form action="" method="POST" onsubmit="return validation()">
                
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="answer">Member Expire Date</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" name="expDate">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3">

                    <label for="answer">Membership type</label>
                    </div>
                    <div class="col-sm-6">
                     <select name="membership_type" id="">
                     <option value="nooption">Select Membership</option>
                     <option value="1">Silver Membership</option>
                     <option value="2">Gold Membership</option>
                     <option value="3">platinum Membership</option>
                     </select>
                    </div>
                </div>      
                <div class="form-group row">
                    <div class="col-sm-3">

                    <label for="answer">Number of token</label>
                    </div>
                    <div class="col-sm-6">
                        
                    <input type="number" name="number">
                    </div>
                </div>   
                <input class="btn btn-primary" type="submit" name="submit_member" value="Set Membership">
            </form>
        </section>
        <section class="section-bottom">
            <header class="text-center border-bottom mb-5">
                        Member Details
            </header>
                    <ul>
                        <li class="row mb-2">     
                            <div class="col-2">
                                Name of tutor
                            </div>
                            <div class="col-9">
                            <?php echo $row['teacher_first_name']. " " . $row['teacher_last_name']; ?>
                            </div>
                        </li>
                        <li class="row mb-2">     
                            <div class="col-2">
                                Email
                            </div>
                            <div class="col-9">
                                <?php echo $row['teacher_email'];?>
                            </div>
                        </li>
                        <li class="row mb-2">
                            
                            <div class="col-2">
                                Phone number
                            </div>
                            <div class="col-9">
                                +91 <?php echo $row['teacher_phone'];?>
                            </div>
                        </li>

                    </ul>
           
        </section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>