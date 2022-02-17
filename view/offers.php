<?php
/**
 * @file         offers.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         17.02.2022
 * @project      LoCar
 * @description  Offers view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 17.02.2022
 */

ob_start();

$title = 'LoCar - Offres';

require "view/contents/top_bar.php";
require "view/contents/offers_findSection.php";
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
                <?php
                    for ($i = 1; $i <= 80; $i++){
                        $class = $i;
                        $link = "view/contents/img/car-1.png";
                        $name = "Camry";
                        $price = 20000.00;
                        require "view/contents/offer_template.php";
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- end car section -->
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>
