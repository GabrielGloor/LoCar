<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to verify for the login and the register if the user input are filled or not.
 */

require "model/usersManager.php";

/**
 * @brief   This function is designed to verify if the requirements datas are filled
 * @param $inputs : Is the logs of the users
 */
function login($inputs)
{
    if (isset($inputs['inputEmail']) && isset($inputs['inputPswd']))
    {
        isUserCorrect($inputs['inputEmail'],$inputs['inputPswd']);
    }
    else
    {
        require "view/login.php";
    }
}

/**
 * @brief This function is designed to verify if the inputs are filled. If not it will show the register page, else it will register the user. (WIP)
 * @param $inputs : It is the user input in the register form
 */
function register($inputs)
{
    if (isset($inputs['inputUsername']) && isset($inputs['inputEmail']) && isset($inputs['inputPswd']) && isset($inputs['inputPswdTwo'])){
        if ($inputs['inputPswd'] == $inputs['inputPswdTwo']){
            userRegister($inputs['inputUsername'], $inputs['inputEmail'], $inputs['inputPswd']);
        }else{
            header('Location: ?action=register&incorrect=true&badPassword=true');
        }
    }else{
        require "view/register.php";
    }
}

/**
 * @brief This function is designed to show a page with all infos about the user.
 * @param $username : It's the user username gived in $_GET
 */
function userPage($username){
    if($username != $_SESSION['username']) header('Location: ?action=home');

    $offers = getOffersInfos();
    $class = 0;

    ob_start();
    foreach($offers as $offer){
        if($offer['ownerEmail'] == $_SESSION['email']){
            $class++;
            $linkToImg = $offer['image'];
            $linkToDetails = '?action=modifyOffer&offerId='.$offer['id'];
            $name = $offer['name'];
            $price = $offer['price'];
            $btnName = 'Modifier';

            require 'view/contents/offer_template.php';
        }
    }
    if ($class == 0){
        echo "<h2>Vous n'avez aucune offre !</h2>";
    }
    $products = ob_get_clean();

    require 'view/user.php';
}

/**
 * @brief This function is designed to end the user session
 */
function logout()
{
    unset($_SESSION['username']);
    session_destroy();

    header("Location: ?action=home");

}
