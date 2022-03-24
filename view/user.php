<?php
/**
 * @file         user.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         06.03.2022
 * @project      LoCar
 * @description  User page view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */

ob_start();
$title = 'Votre profil';

require "view/contents/top_bar.php";
?>
<!-- car section -->
<section class="car_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Vos offres
            </h2>
            <hr>
        </div>

        <?php
        if (isset($_GET['deleted']) && $_GET['deleted'] == 'true'){?>
            <p style="color: green; text-align: center;">Votre annonce a bien été supprimée !</p>
        <?php
        }
        ?>

        <div class="layout_padding">
            <div class="row">
                <?=$products?>
            </div>
        </div>
    </div>
</section>
<!-- end car section -->
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>