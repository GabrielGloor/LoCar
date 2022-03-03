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
        <div class="brand">
            <p><span style="font-weight: bold">Marque :</span> Audi</p>
        </div>
        <div class="year">
            <p><span style="font-weight: bold">Année :</span> 2022</p>
        </div>
        <div class="desc">
            <p><span style="font-weight: bold">Description :</span></p>
            <textarea readonly rows="10">asddddddddddddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
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
                            <form action="#" method="post">
                                <div class="contact_form-container">
                                    <div>
                                        <div>
                                            <input type="text" placeholder="Nom">
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Numéro de téléphone">
                                        </div>
                                        <div>
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div class="mt-5">
                                            <textarea name="msg" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="mt-5 d-flex justify-content-center justify-content-sm-start">
                                            <button type="submit">
                                                Envoyer
                                            </button>
                                        </div>
                                    </div>

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