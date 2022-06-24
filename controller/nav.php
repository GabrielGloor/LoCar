<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to show a page to the user.
 */

/**
 * @brief This function is designed to show the home page
 */
function home()
{
    require "view/home.php";
}

/**
 * @brief This function is designed to show the lost page
 */
function lost()
{
    //TODO what about redirecting to home, with info message "this page wasn't found"
    require "view/lost.php";
}
