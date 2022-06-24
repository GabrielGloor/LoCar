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
 * @param $email    string  User Email
 * @param $password string   User Password
 */
function isUserCorrect(string $email, string $password){

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
    
    //TODO this function must return a boolean. The controller is then responsible to redirect the query to the view (model to view should be avoided in MVC).
    
} //toCheck

/**
 * @brief This function is designed to register the user to a json file.
 * @param $username : Username input
 * @param $email : User email
 * @param $password : User password
 */
function userRegister($username, $email, $password){

    $strSeparator = '\'';

    $querySelect = "SELECT username, email, password FROM users WHERE username = ".$strSeparator.$username.$strSeparator." OR email = ".$strSeparator.$email.$strSeparator;
    $queryResult = executeQuerySelect($querySelect);

    if(isset($queryResult['email'])){
        header('Location: ?action=register&incorrect=true&userExists=true');
    }else{
        $queryInsert = "INSERT INTO users (username, email, password) VALUES (".$strSeparator.$username.$strSeparator.", ".$strSeparator.$email.$strSeparator.", ".$strSeparator.password_hash($password, PASSWORD_DEFAULT).$strSeparator.")";
        executeQueryInsert($queryInsert);

        header('Location: ?action=login&userCreated=true');
    }
}