<?php
/**
 * @file         offer_template.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         17.02.2022
 * @project      LoCar
 * @description  Offer template
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 17.02.2022
 */

if (isset($err)){
?>
<h1><?=$err?></h1>
<?php
}else{
?>
<div class="col-md-6 c-<?=$class?>">
    <div class="img-box">
        <img src="<?=$linkImg?>" alt="">
    </div>
    <div class="detail-box">
        <div class="btn-box">
            <a href="<?=$linkToDetails?>">
                Détails
            </a>
        </div>
        <div class="detail_text">
            <div class="name">
                <h4>
                    <?=$name?>
                </h4>
            </div>
            <div class="price">
                <h4>
                <span>
                  CHF
                </span>
                    <?=$price?>
                </h4>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
