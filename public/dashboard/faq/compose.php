<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }


$active = "faq";
$sub = "faq_compose";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
        

    <?php
         if(isset($_REQUEST['submit_faq'])){
            if(($_REQUEST['question'] == "") || ($_REQUEST['category'] == "") || ($_REQUEST['answer'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                $q = $_REQUEST['question'];
                $cat = $_REQUEST['category'];
                $ans = $_REQUEST['answer'];
                $status = "1";
    
                $query = "INSERT INTO faqs (faq_question, faq_answer, faq_category, faq_status)
                          VALUES('$q', '$ans', '$cat', $status)";
                          
                $result = mysqli_query($conn, $query); 
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted.!";?>
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
                    Compose new Faq
                </header>
            </div>
        </div>
        <section class="section-faq">
            <form action="" method="POST" onsubmit="return faqValidation()">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" name="question" id="question">
                    <small id="emailHelp" class="form-text text-muted">Enter FAQ question here.</small>
                </div>
                <div class="form-group row">
                    <div class="col-2">
                        Select category
                    </div>
                    <div class="col-9">

                    <select name="category" id="">
                        <option value="nooption">Select category</option>
                        <option value="general">General category question</option>
                        <option value="student">Tutor category question</option>
                        <option value="teacher">Student category question</option>
                    </select>
                        <!-- <div class="form-check">
                            <input class="form-check-input category" type="radio" name="category" id="general" value="general">
                            <label class="form-check-label" for="general">
                                General category question
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category" type="radio" name="category" id="student" value="student">
                            <label class="form-check-label" for="student">
                                Trainee category question
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input category" type="radio" name="category" id="teacher" value="teacher">
                            <label class="form-check-label" for="teacher">
                                Trainer category question
                            </label>
                        </div> -->
                    </div>
                    
                </div> 
                <div class="form-group">
                    <label for="answer">Example textarea</label>
                    <textarea class="form-control" id="answer" name="answer" rows="3"></textarea>
                </div>   
                <input class="btn btn-primary" type="submit" name="submit_faq" value="Submit new FAQ">
            </form>
        </section>
        <section class="section-bottom"></section>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>