<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed for redirecting to the adaptate fonction
 */

require "controller/users.php";
require "controller/nav.php";
require "controller/offersController.php";


session_start();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register':
            register($_POST);
            break;
        case 'offers':
            offers();
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
        default :
            lost();
    }
} else {
    home();
}
?>