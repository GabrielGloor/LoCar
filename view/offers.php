<?php
/**
 * @file         offers.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         17.02.2022
 * @project      LoCar
 * @description  Offers view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */

ob_start();

$title = 'LoCar - Offres';

require "view/contents/top_bar.php";
require "view/contents/offers_findSection.php";
?>

<?php
if(isset($_GET['offerCreated']) && $_GET['offerCreated'] == 'true'){?>
    <p style="color: green; text-align: center;">Votre annonce a bien été crée !</p>
<?php
}elseif(isset($_GET['offerModified']) && $_GET['offerModified'] == 'true'){?>
    <p style="color: green; text-align: center;">Votre annonce a bien été modifiée !</p>
<?php
}
?>


<!-- car section -->
<section class="car_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Nos offres
            </h2>
            <hr>
        </div>
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
