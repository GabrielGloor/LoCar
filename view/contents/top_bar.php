<?php
/**
 * @file         top_bar.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Top bar for all the pages
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 10.02.2022
 */

$style = isset($_GET['action']) && $_GET['action'] != 'home' ? 'style="background-color: #1a1a1a;"' : "";
$homeLink = isset($_GET['action']) && $_GET['action'] != 'home' ? "?action=home" : "#";
$offersLink = isset($_GET['action']) && $_GET['action'] != 'home' ? ($_GET['action'] == 'offers' ? "#" : "?action=offers") : "#offres";
$createOffersLink = isset($_GET['action']) && $_GET['action'] != 'home' ? ($_GET['action'] == 'createOffer' ? "#" : "?action=createOffer") : "?action=createOffer";
$aboutUsLink = isset($_GET['action']) && $_GET['action'] != 'home' ? "?action=home#a-propos" : "#a-propos";
$contactUsLink = isset($_GET['action']) && $_GET['action'] != 'home' ? "?action=home#nous-contacter" : "#nous-contacter";
?>
<!-- header section strats -->
<header class="header_section" <?=$style?>>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="<?=$homeLink?>">
                <i class="fas fa-car" style="color: white; font-size: 30px"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?=$homeLink?>">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$offersLink?>"> Offres </a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])){?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$createOffersLink?>"> Créer une offre </a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$aboutUsLink?>"> A propos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$contactUsLink?>">Nous contacter</a>
                        </li>
                    </ul>
                </div>
                <div class="login_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                    <a <?php if(isset($_SESSION['username'])) echo 'href="?action=userManagement&user='.$_SESSION['username'].'"'; else echo 'href="?action=login"';?>>
                        <?php if(isset($_SESSION['username'])) echo '<i class="fa-solid fa-user" style="padding-right: 15px"></i>'.$_SESSION['username']; else echo 'Se connecter';?>
                    </a>
                </div>
                <?php if(!isset($_SESSION['username'])){?>
                    <div class="login_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                        <a href="?action=register">
                            S'enregistrer
                        </a>
                    </div>
                <?php }?>
                <?php if(isset($_SESSION['username'])){?>
                <div class="login_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                    <a href="?action=logout" style="color: red">
                        <i class="fa-solid fa-door-closed" style="padding-right: 15px"></i>Se déconnecter
                    </a>
                </div>
                <?php }?>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
