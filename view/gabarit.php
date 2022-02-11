<?php
/**
 * @file         gabarit.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Gabarit
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 10.02.2022
 */
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?=$title?></title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="view/contents/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="view/contents/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="view/contents/css/responsive.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/d8302aa554.js" crossorigin="anonymous"></script>
</head>

<body>
<?=$content?>

<!-- info section -->
<section class="info_section">
    <div class="d-flex justify-content-center">
        <div class="social_container">

            <div class="number-box">
                <a href="">
                    <img src="view/contents/img/phone.png" alt="">
                    <h6>
                        +01 123567894
                    </h6>
                </a>
            </div>
            <div class="mail-box">
                <a href="">
                    <img src="view/contents/img/mail.png" alt="">
                    <h6>
                        demo@gmail
                    </h6>
                </a>
            </div>
            <div class="social-box">
                <div class="box">
                    <a href="">
                        <img src="view/contents/img/facebook-logo.png" alt="">
                    </a>
                </div>
                <div class="box">
                    <a href="">
                        <img src="view/contents/img/twitter.png" alt="">
                    </a>
                </div>
                <div class="box">
                    <a href="">
                        <img src="view/contents/img/linkedin.png" alt="">
                    </a>
                </div>
                <div class="box">
                    <a href="">
                        <img src="view/contents/img/instagram-logo.png" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="container layout_padding2 mobile_padding-top-none">
        <div class="row justify-content-md-center">
            <div class="col-md-3">
                <h5>
                    Contact
                </h5>
                <p>
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in
                    some form, by injected humour
                </p>
            </div>
            <div class="col-md-3">
                <h5>

                    Liens utiles
                </h5>
                <ul>
                    <li>
                        <a href="#">
                            Notre Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Notre Twitter
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Notre LinkedIn
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Notre Instagram
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">

                <div class="subscribe_container">
                    <h5>
                        Newsletter
                    </h5>
                    <div class="form_container">
                        <form action="#" method="post">
                            <input type="email" placeholder="Enter your email">
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end info section -->

<!-- footer section -->
<footer class="container-fluid footer_section">
    <p>
        &copy; <span id="getcurrentYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
    </p>
</footer>
<!-- footer section -->


<script type="text/javascript" src="view/contents/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="view/contents/js/bootstrap.js"></script>
<script type="text/javascript" src="view/contents/js/custom.js"></script>

</body>

</html>