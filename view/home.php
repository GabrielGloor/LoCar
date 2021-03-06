<?php
/**
 * @file         home.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Home page
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
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
                <?php
                require_once "controller/offersController.php";
                showOffersInHomePage();
                ?>
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
                    <form action="?action=email" method="post">
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" placeholder="Nom" name="name" required>
                                </div>
                                <div>
                                    <input type="text" placeholder="Numéro de téléphone" name="telNumber" required pattern="[0-9]{10}">
                                </div>
                                <div>
                                    <input type="email" name="mail" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                </div>
                                <div class="mt-5">
                                    <textarea name="msg" cols="30" rows="10" placeholder="Message" required></textarea>
                                </div>
                                <div class="mt-5 d-flex justify-content-center justify-content-sm-start">
                                    <button type="submit">
                                        Envoyer
                                    </button>
                                </div>
                                <?php
                                        if(isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
                                    ?>
                                        <p style="color: green; text-align: center; margin-left: -40px; margin-top: 20px">Votre email a bien été transmis à notre équipe. Vous avez également reçu un email de confirmation.</p>
                                    <?php 
                                        }elseif(isset($_GET['confirm']) && $_GET['confirm'] == 'false'){
                                    ?>
                                        <p style="color: red; text-align: center; margin-left: -40px; margin-top: 20px">Votre email n'a pas pu être livré. Veuillez réessayer plus tard.</p>
                                    <?php
                                        }
                                    ?>
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
