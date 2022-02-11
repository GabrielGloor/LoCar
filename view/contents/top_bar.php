<?php
/**
 * @file         top_bar.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Top bar for all the pages
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 10.02.2022
 */
?>
<!-- header section strats -->
<header class="header_section" <?php if(isset($_GET['action']) && $_GET['action'] != 'home') echo 'style="background-color: #1a1a1a;"'?>>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="?action=home">
                <i class="fas fa-car" style="color: white; font-size: 30px"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="?action=home">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#offres"> Offres </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#a-propos"> A propos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nous-contacter">Nous contacter</a>
                        </li>
                    </ul>
                </div>
                <div class="login_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                    <a <?php if(isset($_SESSION['username'])) echo 'href="?action=logout"'; else echo 'href="?action=login"';?>>
                        <?php if(isset($_SESSION['username'])) echo '<i class="fa-solid fa-user" style="padding-right: 15px">'.$_SESSION['username'].'</i>'; else echo 'Se connecter';?>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
