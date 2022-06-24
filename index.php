<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed for redirecting to the adapted function
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
            if (isset($_POST['inputEmail']) && isset($_POST['inputPwd'])) login($_POST['inputEmail'], $_POST['inputPwd']);
            else login();
            break;
        case 'logout' :
            logout();
            break;
        case 'register':
            register($_POST);
            break;
        case 'offers':
            if(isset($_GET['search']) || isset($_GET['prices'])) offers($_GET); else offers();
            break;
        case 'offerDetails':
            if (isset($_GET['offerId'])) offerDetails($_GET['offerId']); else header('Location: ?action=home');
            break;
        case 'createOffer':
            createOffer($_POST, $_FILES);
            break;
        case 'modifyOffer':
            if (isset($_GET['offerId'])) modifyOffer($_POST, $_GET['offerId']); else header('Location: ?action=home');
            break;
        case 'user':
            if (isset($_GET['username'])) userPage($_GET['username']); else header('Location: ?action=home');
            break;
        case 'deleteOffer' :
            if (isset($_GET['offerId'])) deleteOffer($_GET['offerId']); else header("Location: ?action=home");
            break;
        case 'email':
            mailCheck($_POST,$_GET['offerId']);
            break;
        default :
            home();
    }
} else {
    home();
}