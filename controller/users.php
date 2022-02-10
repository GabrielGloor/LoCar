<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to verify for the login and the register if the user input are filled or not.
 */

function login($inputs)
{
    if (isset($inputs['inputEmail']) && isset($inputs['inputPswd']))
    {

    }
    else
    {
        require "view/login.php";
    }
}
