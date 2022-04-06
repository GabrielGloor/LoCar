<?php
/**
 * @file         offerDetails.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         18.02.2022
 * @project      LoCar
 * @description  Offer details view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */

ob_start();

require 'view/contents/top_bar.php';
?>
<div class="boxOffer">
    <div class="imgBox">
        <img class="img-fluid" src="<?=$linkToImg?>">
    </div>

    <div class="titlePriceTown">
        <h3><?=$name?></h3>
        <p><span style="color: limegreen">CHF</span> <?=$price?>/Jour</p>
        <p><?=$town?></p>
    </div>

    <hr>

    <div class="infos">
        <div class="brand">
            <p><span style="font-weight: bold">Marque :</span> <?=$brand?></p>
        </div>
        <div class="year">
            <p><span style="font-weight: bold">Année :</span> <?=$year?></p>
        </div>
        <div class="desc">
            <p><span style="font-weight: bold">Description :</span></p>
            <textarea readonly rows="10"><?=$description?></textarea>
        </div>
    </div>

    <hr>

    <div class="contact">
        <section class="contact_section" id="nous-contacter" style="margin-top: -70px">
            <div class="container">
                <div class="heading_container d-flex justify-content-center" style="margin-top: 120px; margin-bottom: -80px">
                    <h3>
                        Contacter le propriétaire
                    </h3>
                </div>
                <div class="layout_padding">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <form action="?action=email&offerId=<?=$_GET['offerId']?>" method="post">
                                <div class="contact_form-container">
                                    <div>
                                        <input type="hidden" name="ownerEmail" value="<?=$ownerEmail?>" required>
                                        <div>
                                            <input type="text" name="name" placeholder="Nom" required>
                                        </div>
                                        <div>
                                            <input type="text" name="telNumber" placeholder="Numéro de téléphone" required pattern="[0-9]{10}">
                                        </div>
                                        <div>
                                            <input type="email" name="mail" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                        </div>
                                        <div class="mt-5">
                                            <textarea name="msg" cols="30" rows="10" placeholder="Message" name="msg"></textarea>
                                        </div>
                                        <div class="mt-5 d-flex justify-content-center justify-content-sm-start">
                                            <button type="submit" style="width: 90%">
                                                Envoyer
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
                                    ?>
                                        <p style="color: green; text-align: center; margin-left: -40px; margin-top: 20px">Votre email a bien été transmis au propriétaire du véhicule. Vous avez également reçu un email de confirmation.</p>
                                    <?php 
                                        }elseif(isset($_GET['confirm']) && $_GET['confirm'] == 'false'){
                                    ?>
                                        <p style="color: red; text-align: center; margin-left: -40px; margin-top: 20px">Votre email n'a pas pu être livré. Veuillez réessayer plus tard.</p>
                                    <?php
                                        }
                                    ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>