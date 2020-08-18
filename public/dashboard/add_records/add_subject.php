<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }


$active = "add record";
$sub = "add subject";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
     
   

    <?php
    // subjects insert
         if(isset($_REQUEST['submit_subject'])){
            //checking  for empty field
            if(($_REQUEST['subject'] == "") || ($_REQUEST['sub-cat'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                $subject = $_REQUEST['subject'];
                $category = $_REQUEST['sub-cat'];
    
                $query = "INSERT INTO subjects (sub_name, sub_category_id)
                          VALUES('$subject', '$category')";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $subject .".!";?>
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
                        Add subjects
                    </header>
                </div>
            </div>
            <div class="row">

                <section class="section-faq col-sm-4">
                    <header class="text-center border-bottom mb-5">
                        <h5>Add subjects</h5>
                    </header>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="q">Add subjects</label>
                            <input type="text" class="form-control" name="subject" id="q">
                            <small id="emailHelp" class="form-text text-muted">Add new subject name here.</small>
                        </div>
                        <div class="form-group">
                            <label for="q">Select subject category</label>
                            <select name="sub-cat" class="form-control">
                                <option>Select subject category</option>
                                <?php 
                                    $query = "SELECT * FROM study_categories ORDER BY study_cat_type ASC";
                                    $result = mysqli_query($conn, $query);
                                
                                    while($row = mysqli_fetch_assoc($result)){;
                                ?>

                                <option value="<?php echo $row['study_cat_id'];?>"><?php echo $row['study_cat_type'];?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div> 
                        
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" name="submit_subject" value="Submit new city">
                        </div>
                    </form>
                </section>
                <!-- <section class="section-faq col-sm-5  align-self-start">
                    
                   
                </section> -->

            </div>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>