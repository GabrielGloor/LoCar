<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to verify for the login and the register if the user input are filled or not.
 */

require "model/users.php";

/**
 * @brief   This function is designed to verify if the required data are filled
 * @param null $userEmailAddress
 * @param null $userPwd
 */
function login($userEmailAddress = null, $userPwd = null)
{
    if (isset($userEmailAddress) && isset($userPwd))
    {
        //TODO you never use the isUserCorrect return there...
        return isUserCorrect($userEmailAddress,$userPwd);
    }
    else
    {
        require "view/login.php";
    }
}

/**
 * @brief This function is designed to verify if the inputs are filled. If not it will show the register page, else it will register the user. (WIP)
 * @param $userRegisterInputs : It is the user input in the register form
 */
function register($userRegisterInputs)
{
    if (isset($userRegisterInputs['inputUsername']) && isset($userRegisterInputs['inputEmail']) && isset($userRegisterInputs['inputPswd']) && isset($userRegisterInputs['inputPswdTwo'])){
        if ($userRegisterInputs['inputPswd'] == $userRegisterInputs['inputPswdTwo']){
            userRegister($userRegisterInputs['inputUsername'], $userRegisterInputs['inputEmail'], $userRegisterInputs['inputPswd']);
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

    $strSeparator ='\'';
    $query = "SELECT id FROM users WHERE email =".$strSeparator.$_SESSION['email'].$strSeparator;
    $userId = executeQuerySelect($query);

    ob_start();
    foreach($offers as $offer){
        if($offer['user_id'] == $userId[0]['id']){
            //TODO NGY - why are you using a counter in a foreach (foreach alreday offer it)
            //TODO NGY - https://stackoverflow.com/questions/43021/how-do-you-get-the-index-of-the-current-iteration-of-a-foreach-loop
            $class++;
            $linkToImg = $offer['imageName'];
            $offerId = $offer['id'];
            $name = $offer['title'];
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
