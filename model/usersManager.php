<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to check if user inputs are correct
 */

/**
 * @brief   This function is designed to verify if the login form of the user is correct
 * @param $email    User Email
 * @param $password     User Password
 */
function isUserCorrect($email,$password){
	require 'json.php';
	$error = null;
	
	$json = 'model/content/users.json';
	$jsonData = decodeJson($json);
	
	if(isset($jsonData[$email])){
		if($jsonData[$email]['password'] == $password){
			$_SESSION['username'] = $jsonData[$email]['username'];
			header('Location: ?action=home');
		}else{
			header('Location: ?action=login&incorrect=true');
		}
	}else{
		header('Location: ?action=login&incorrect=true');
	}
}