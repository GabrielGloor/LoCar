<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to check if user inputs are correct
 */

require 'json.php';
require "model/dbConnector.php";

/**
 * @brief   This function is designed to verify if the login form of the user is correct
 * @param $email    User Email
 * @param $password     User Password
 */
function isUserCorrect($email,$password){
	//$json = 'model/content/users.json';
	//$jsonData = decodeJson($json);

    $querySelect = "SELECT";
    $userData = executeQuerySelect($querySelect);
	
	if(isset($userData['email'])){
		if(password_verify($userData['password'], password_hash($password))){
			$_SESSION['username'] = $userData['email']['username'];
            $_SESSION['email'] = $email;
			header('Location: ?action=home');
		}else{
			header('Location: ?action=login&incorrect=true');
		}
	}else{
		header('Location: ?action=login&incorrect=true');
	}
} //Edited

/**
 * @brief This function is designed to register the user to a json file.
 * @param $username : Username input
 * @param $email : User email
 * @param $password : User password
 */
function userRegister($username, $email, $password){
    //$json = 'model/content/users.json';
    //$jsonData = decodeJson($json);

    $querySelect = "SELECT"; //Check if user already exist (Email & Username)
    $queryResult = executeQuerySelect($querySelect);

    if(isset($queryResult['email'])){
        header('Location: ?action=register&incorrect=true&userExists=true');
    }else{
        $queryInsert = "INSERT INTO";
        executeQueryInsert($queryInsert);

        header('Location: ?action=login&userCreated=true');
    }
} //Edited