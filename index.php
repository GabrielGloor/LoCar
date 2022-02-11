<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed for redirecting to the adaptate fonction
 */

require "controller/users.php";
require "controller/nav.php";


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
            register();
            break;
        default :
            lost();
    }
} else {
    home();
}
?>