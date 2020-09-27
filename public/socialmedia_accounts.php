<?php
$page_title = "social media";
 require_once("../private/config/db_connect.php");
 require("../private/config/config.php");
 include("../private/required/public/components/social_media.php");
 include("../private/required/public/header.public.php");
?>
<div class="body-container mb-6">
    <main class="wrap-container">
        <div class="section-header u-center-text">
            <header class="text-primary-h-3">
                Social media
            </header>
        </div>
        <section class="social-media-section">
            <table>
                <thead>
                <tr>
                    <!-- <th>social media name</th> -->
                    <th class="social-media-header">social media links</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($social_media as $name => $url){
                    ?>
                    <tr>
                    <!-- <td>facebook</td> -->
                        <td class="social-media-data">
                        <a class="social-media__link" href="<?php echo $url; ?>" target="_blank" >
                    
                        <img class="social-media__image" src="<?php echo base_url();?>img/social_media/<?php echo $name;?>" alt="<?php echo $name; ?>">
                        </a>
                        </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</div>
<?php
  include("../private/required/public/components/agreement.php");

include("../private/required/public/footer.public.php");
?>