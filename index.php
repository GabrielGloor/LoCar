<?php
/**
 * @Description : This file is designed to be the application's router
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 */

require "controller/users.php";
require "controller/nav.php";
require "controller/offers.php";
require "controller/emails.php";

session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST['inputEmail'], $_POST['inputPwd']);
            break;
        case 'logout' :
            logout();
            break;
        case 'register':
            register($_POST['inputUsername'], $_POST['inputEmail'], $_POST['inputPwd'], $_POST['inputPwdValidation']);
            break;
        case 'offers':
            offers($_GET);
            break;
        case 'offerDetails':
            offerDetails($_GET);
            break;
        case 'createOffer':
            createOffer($_POST, $_FILES);
            break;
        case 'modifyOffer':
            modifyOffer($_POST, $_GET);
            break;
        case 'user':
            userPage($_GET);
            break;
        case 'deleteOffer' :
            deleteOffer($_GET);
            break;
        case 'email':
            mail_c($_POST,$_GET);
            break;
        default :
            home(true);
    }
} else {
    home();
}
?>