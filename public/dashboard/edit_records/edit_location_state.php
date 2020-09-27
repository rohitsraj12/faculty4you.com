<?php 
    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../index.php');
    }
    
    $active = "add record";
    $sub = "add location";

    require("../../../private/config/config.php");
    require("../../../private/config/db_connect.php");
    include("../include/header.inc.php");

?>
    
    <div class="body-container-right"> 
     
    <?php
    // state data insert
         if(isset($_REQUEST['submit_state'])){
            //checking  for empty field
            if(($_REQUEST['state'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                $state = $_REQUEST['state'];
                $id = $_GET['id'];
                $query = "UPDATE states SET 
                             state_name = '$state'
                          WHERE state_id = '$id'";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $state .".!";
                    exit();
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
           
                <section class="section-faq col-sm-5 mb-5  align-self-start">
                    
                    <header class="text-center border-bottom mb-5">
                        <h5>Edit state to data-base</h5>
                    </header>
                    <form action="" method="POST" onsubmit="return stateValidations()">
                        <div class="form-group">
                            <label for="q">Add new state</label>
                            <input type="text" class="form-control new-state" name="state" id="q">
                            <small id="emailHelp" class="form-text text-muted">Edit state name here.</small>
                        </div>
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" name="submit_state" value="Submit new state">
                        </div>
                    </form>
                </section>

            </div>
            
            <div class="wrap-container">
                <div class="row">
                    <div class=" col-sm-7">
                         <section class="wrap-table"> 
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">State Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $study_query = "SELECT cities.*, states.* FROM cities
                                            LEFT JOIN states
                                                ON states.state_id = cities.state_id
                                                ORDER BY city_name ASC";
                                        $result = mysqli_query($conn, $study_query);

                                // $query_results = mysqli_num_rows($result);

                                // echo $query_results;

                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['city_id'];?></th>
                                        <td><?php echo $row['state_name'];?></td>
                                        </tr>
                                    <?php 
                                    }
                                    ?>
                                    <?php
                                        ?>
                                </tbody>
                            </table>
                         </section> 
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </div>

<?php
    include("../include/footer.inc.php");
?>