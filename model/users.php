<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to check if user inputs are correct
 */

require 'json.php';
require_once "model/dbConnector.php";

/**
 * @brief   This function is designed to verify if the login form of the user is correct
 * @param $email    User Email
 * @param $password     User Password
 */
function isUserCorrect($email,$password){

    $strSeparator = '\'';
    $querySelect = "SELECT username, email, password FROM users WHERE email =".$strSeparator.$email.$strSeparator;
    $userData = executeQuerySelect($querySelect);
	
	if(isset($userData[0]['email'])){
		if(password_verify($password, $userData[0]['password'])){
			$_SESSION['username'] = $userData[0]    ['username'];
            $_SESSION['email'] = $email;
			header('Location: ?action=home');
		}else{
			header('Location: ?action=login&incorrect=true');
		}
	}else{
		header('Location: ?action=login&incorrect=true');
	}
} //toCheck

/**
 * @brief This function is designed to register the user to a json file.
 * @param $username : Username input
 * @param $email : User email
 * @param $password : User password
 */
function userRegister($username, $email, $password){

    $strseparator = '\'';

    $querySelect = "SELECT username, email, password FROM users WHERE username = ".$strseparator.$username.$strseparator." OR email = ".$strseparator.$email.$strseparator;
    $queryResult = executeQuerySelect($querySelect);

    if(isset($queryResult['email'])){
        header('Location: ?action=register&incorrect=true&userExists=true');
    }else{
        $queryInsert = "INSERT INTO users (username, email, password) VALUES (".$strseparator.$username.$strseparator.", ".$strseparator.$email.$strseparator.", ".$strseparator.password_hash($password, PASSWORD_DEFAULT).$strseparator.")";
        //$queryInsert = "INSERT INTO users(username, email, password) VALUES(".$strseparator.$username.$strseparator.", ".$strseparator.$email.$strseparator.", ".$strseparator.password_hash($password, PASSWORD_DEFAULT).$strseparator;
        executeQueryInsert($queryInsert);

        header('Location: ?action=login&userCreated=true');
    }
} //toCheck