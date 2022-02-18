<?php
/**
 * @file         offerDetails.php
 * @author       Diogo.DA-SILVA-FERNA
 * @date         18.02.2022
 * @project      PROJECT
 * @description  DESCRIPTION
 * @last_update  Diogo.DA-SILVA-FERNA - DATE
 */

ob_start();

require 'view/contents/top_bar.php';
?>
<div class="boxOffer">
    <div class="imgBox">
        <img class="img-fluid" src="view/contents/img/car.png">
    </div>

    <div class="titlePriceTown">
        <h3>Annonce</h3>
        <p><span style="color: limegreen">CHF</span> 55/Jour</p>
        <p>Yverdon-Les-Bains</p>
    </div>

    <hr>

    <div class="infos">
        <p><span style="font-weight: bold">Description :</span> aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>