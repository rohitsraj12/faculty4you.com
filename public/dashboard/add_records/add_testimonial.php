<?php 
$active = "student";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
        

    <?php
         if(isset($_REQUEST['submit_testimonial'])){
            //checking  for empty field
            if(($_REQUEST['testimonial'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                
                $id = $_GET['id'];

                $quote = $_REQUEST['testimonial'];
                $status = "1";
    
                $query = "INSERT INTO testimonials (student_id, testimonial_quote, testimonial_status)
                          VALUES('$id', '$quote', '$status')";
                          
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
                    Create new Testimonial
                </header>
            </div>
        </div>
        <section class="section-faq">
            <?php 
                $id = $_GET['id'];

                $sql = "SELECT * FROM std WHERE student_id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
                    
                    <!-- <header class="text-center border-bottom mb-5">
                        Testimonial by
                    </header>
                    <ul>
                        <li class="row mb-2">     
                            <div class="col-2">
                                Name of student
                            </div>
                            <div class="col-9">
                            <?php echo $row['student_first_name']. " " . $row['student_last_name']; ?>
                            </div>
                        </li>
                        <li class="row mb-2">     
                            <div class="col-2">
                                Email
                            </div>
                            <div class="col-9">
                                <?php echo $row['student_email'];?>
                            </div>
                        </li>
                        <li class="row mb-2">
                            
                            <div class="col-2">
                                phone number
                            </div>
                            <div class="col-9">
                                +91 <?php echo $row['student_phone'];?>
                            </div>
                        </li>

                    </ul> -->
            <form action="" method="POST">
                
                <div class="form-group">
                    <label for="answer">testimonial</label>
                    <textarea class="form-control" id="answer" name="testimonial" rows="3"></textarea>
                </div>   
                <input class="btn btn-primary" type="submit" name="submit_testimonial" value="Submit new Testimonial">
            </form>
        </section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>