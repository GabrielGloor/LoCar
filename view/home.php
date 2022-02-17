<?php
/**
 * @file         home.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Home page
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 10.02.2022
 */
ob_start();

$title = 'LoCar - Accueil';
?>
<div class="hero_area">
    <?php include 'contents/top_bar.php'; ?>

    <!-- slider section -->
    <section class=" slider_section container">
        <div class="slider_detail-box col-md-4 col-sm-8">
            <h1>
                Location <br>
                de véhicules <br>
                facile <br>
                et rapide
            </h1>
            <div class="btn-box">
                <a href="#offres" class="btn-1">
                    Offres
                </a>
            </div>
        </div>
    </section>
</div>
<!-- end slider section -->

<?php require "view/contents/offers_findSection.php" ?>

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
                <div class="col-md-6 c-1">
                    <div class="img-box">
                        <img src="view/contents/img/car-1.png" alt="">
                    </div>
                    <div class="detail-box">
                        <div class="btn-box">
                            <a href="">
                                Détails
                            </a>
                        </div>
                        <div class="detail_text">
                            <div class="name">
                                <h4>
                                    Camry
                                </h4>
                            </div>
                            <div class="price">
                                <h4>
                <span>
                  CHF
                </span>
                                    30000.00
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 c-2">
                    <div class="img-box">
                        <img src="view/contents/img/car-2.png" alt="">
                    </div>
                    <div class="detail-box">
                        <div class="btn-box">
                            <a href="">
                                Détails
                            </a>
                        </div>
                        <div class="detail_text">
                            <div class="name">
                                <h4>
                                    Bmw
                                </h4>
                            </div>
                            <div class="price">
                                <h4>
                <span>
                  CHF
                </span>
                                    40000.00
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 c-3">
                    <div class="img-box">
                        <img src="view/contents/img/car-3.png" alt="">
                    </div>
                    <div class="detail-box">
                        <div class="btn-box">
                            <a href="">
                                Détails
                            </a>
                        </div>
                        <div class="detail_text">
                            <div class="name">
                                <h4>
                                    Lamborghini
                                </h4>
                            </div>
                            <div class="price">
                                <h4>
                <span>
                  CHF
                </span>
                                    60000.00
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 c-4">
                    <div class="img-box">
                        <img src="view/contents/img/car-4.png" alt="">
                    </div>
                    <div class="detail-box">
                        <div class="btn-box">
                            <a href="">
                                Détails
                            </a>
                        </div>
                        <div class="detail_text">
                            <div class="name">
                                <h4>
                                    Audi
                                </h4>
                            </div>
                            <div class="price">
                                <h4>
                <span>
                  CHF
                </span>
                                    50000.00
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="?action=offers" class="see_more-btn">
                Voir plus
            </a>
        </div>
    </div>
</section>
<!-- end car section -->

<!-- about section -->
<section class="about_section layout_padding" id="a-propos">
    <div class="container">
        <div class="heading_container">
            <h2>
                A propos de nous
            </h2>
            <hr>
        </div>
        <div>
            <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking
                at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, It
                is a long established fact that a reader will be distracted by the readable content of a page when looking at
                its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, It is
                a long established fact that a reader will be distracted by the readable content of a page when looking at its
                layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
            </p>
        </div>
    </div>
</section>
<!-- end about section -->

<!-- contact section -->
<section class="contact_section" id="nous-contacter">
    <div class="container">
        <div class="heading_container">
            <h2>
                Nous contacter
            </h2>
            <hr>
        </div>
        <div class="layout_padding">
            <div class="row">
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
                <div class="col-md-6">
                    <div class="contact_img-box">
                        <img src="view/contents/img/car-service.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->
<?php
$content = ob_get_clean();
require 'gabarit.php'
?>
