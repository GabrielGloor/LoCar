<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to verify for the login and the register if the user input are filled or not.
 */

/**
 * @brief   This function is designed to verify if the requirements datas are filled
 * @param $inputs Is the logs of the users
 */
function login($inputs)
{
    if (isset($inputs['inputEmail']) && isset($inputs['inputPswd']))
    {
        require "model/usersManager.php";
        isUserCorrect($inputs['inputEmail'],$inputs['inputPswd']);
    }
    else
    {
        require "view/login.php";
    }
}
