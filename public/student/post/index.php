<?php

    session_start();
    //back function false
    if(!isset($_SESSION['user_name'])){
        header('location: ../login.php');
    } 

    $page_title = "post";
    require("../../../private/config/db_connect.php");
    require("../../../private/config/config.php");
    require("../include/header.inc.php");
?>
                    
<div class="header__profile u-right-text text-sub-primary">
            <i class="fa fa-user" aria-hidden="true"></i>                        
            <?php 
               echo $row['student_user_name'];
            ?>
        </div>
    <?php 
        require("../include/banner.inc.php");

    ?>

    <div class="body-container">
        <main>
            <section>
            
            
        <?php 

        $student_id = $row['student_id'];
            
        // $query = "SELECT  posts.*, cities.*, states.* FROM posts, cities, states WHERE student_id = $student_id";
        // $query = "SELECT posts.*, cities.city_name, states.state_name FROM posts LEFT JOIN cities ON posts.city_id = cities.city_id AND RIGHT JOIN states ON posts.state_id = states.state_id WHERE student_id = $student_id";
        // $query = "SELECT posts.*, cities.city_name FROM posts LEFT JOIN cities ON posts.city_id = cities.city_id WHERE student_id = $student_id";
        
        $query = "SELECT posts.*, cities.city_name, states.state_name 
                    FROM posts
                        JOIN cities
                            ON cities.city_id = posts.city_id
                        JOIN states
                            ON states.state_id = posts.state_id
                        WHERE student_id = $student_id";

        $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_assoc($result)){
            ?>
                <article>
                <div class="right__block">
                    <header>
                        <h1>
                            <?php echo $row['post_title'];?>
                        </h1>
                        <a href=""><?php echo $row['city_name'] ;?></a>
                        <a href=""><?php echo $row['state_name'] ;?></a>
                    </header>
                    <div class="body">
                        <p>
                            <?php echo $row['post_detail'];?>
                        </p>
                        <ul>
                            <li>qualification: <?php $row['post_date'] ?> </li>
                            <li>Experience: </li>
                            
                        </ul>
                    </div>
                    
                    <footer>
                    <a href="detail.php?id=<?php echo $row['post_id']?>&title=<?php echo $row['post_title']?>">more details</a>
                    </footer>
                </div>
          </article>
          <?php
            }
        ?>
        </section>

        </main>

    </div>



<?php 
    require("../include/footer.inc.php");
?>