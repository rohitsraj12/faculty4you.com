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
    
                $query = "INSERT INTO states (state_name)
                          VALUES('$state')";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $state .".!";?>
                </div>
            <?php 
                }else{
                    die("Database query failed " . mysqli_connect_error($conn));
                }
            }
        }            
    ?>

    <?php
    // city data insert
         if(isset($_REQUEST['submit_city'])){
            //checking  for empty field
            if(($_REQUEST['city'] == "") || ($_REQUEST['state'] == "")){
    ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo "Fill all fields..";?>
        </div>
    <?php 
            } else {
                $city = $_REQUEST['city'];
                $state = $_REQUEST['state'];
    
                $query = "INSERT INTO cities (city_name, state_id)
                          VALUES('$city', '$state')";
                          
                $result = mysqli_query($conn, $query); 
                // test if there was a query error
                if($result) {

            ?>
                <div class="alert alert-primary" role="alert">
                    <?php  echo "successfully Inserted " . $city .".!";?>
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
                        Add new city and state in database
                    </header>
                </div>
            </div>
            <div class="row justify-content-around mb-5">

                <section class="section-faq col-sm-5">
                    <header class="text-center border-bottom mb-5">
                        <h5>Add new city to data-base</h5>
                    </header>
                    <form action="" method="POST" onsubmit="return cityValidations()">
                        <div class="form-group">
                            <label for="q">Add new city</label>
                            <input type="text" class="form-control city__input" name="city" id="q">
                            <small id="emailHelp" class="form-text text-muted">add new city name here.</small>
                        </div>
                        <div class="form-group">
                            <label for="q">Select state</label>
                            <select name="state" class="form-control select-state">
                                <option value="nooption">Select state</option>
                                <?php 
                                    $query = "SELECT * FROM states ORDER BY state_name ASC";
                                    $result = mysqli_query($conn, $query);
                                
                                    while($row = mysqli_fetch_assoc($result)){;
                                ?>

                                <option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div> 
                        
                        <div class="form-group text-right">
                            <input class="btn btn-primary" type="submit" name="submit_city" value="Submit new city">
                        </div>
                    </form>
                </section>
                <section class="section-faq col-sm-5  align-self-start">
                    
                    <header class="text-center border-bottom mb-5">
                        <h5>Add new state to data-base</h5>
                    </header>
                    <form action="" method="POST" onsubmit="return stateValidations()">
                        <div class="form-group">
                            <label for="q">Add new state</label>
                            <input type="text" class="form-control new-state" name="state" id="q">
                            <small id="emailHelp" class="form-text text-muted">add new state name here.</small>
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
                                    <th scope="col">city Name</th>
                                    <th scope="col">State Name</th>
                                    <th scope="col">Edit</th>
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
                                        <td><?php echo $row['city_name']?></td>
                                        <td><?php echo $row['state_name'];?></td>
                                        <td><a href="<?php base_url()?>dashboard/edit_records/edit_location_city.php?id=<?php echo $row['city_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php ?></td>
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
                    <div class=" col-sm-5">
     
                        <section class="wrap-table"> 
                            <table class="bg-light table">
                                <thead class="thead-light">
                                    <tr>
                                    <!-- <th scope="col">Id</th> -->
                                    <th scope="col">State Name</th>
                                    <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $study_query = "SELECT * FROM states ORDER BY state_name ASC";
                                        $result = mysqli_query($conn, $study_query);

                                // $query_results = mysqli_num_rows($result);

                                // echo $query_results;

                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <!-- <th scope="row"><?php //echo $row['state_id'];?></th> -->
                                        <td><?php echo $row['state_name'];?></td>
                                        <td><a href="<?php base_url()?>dashboard/edit_records/edit_location_state.php?id=<?php echo $row['state_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><?php ?></td>
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