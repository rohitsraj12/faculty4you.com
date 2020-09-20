<?php
$page_title = "social media";
 require_once("../private/config/db_connect.php");
 require("../private/config/config.php");
 include("../private/required/public/components/social_media.php");
 include("../private/required/public/header.public.php");
?>
<div class="wrap-container">
    <table>
        <thead>
        <tr>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach($social_media as $name => $url){
            ?>
                <td ><a href="<?php echo $url; ?>" target="_blank" >
                <img src="<?php echo $name;?>" alt=""></a></td>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
<?php
include("../private/required/public/footer.public.php");
?>