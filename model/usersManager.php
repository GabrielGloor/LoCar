<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to check if user inputs are correct
 */

require 'json.php';

/**
 * @brief   This function is designed to verify if the login form of the user is correct
 * @param $email    User Email
 * @param $password     User Password
 */
function isUserCorrect($email,$password){
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

/**
 * @brief This function is designed to register the user to a json file.
 * @param $username : Username input
 * @param $email : User email
 * @param $password : User password
 */
function userRegister($username, $email, $password){
    $json = 'model/content/users.json';
    $jsonData = decodeJson($json);

    if(isset($jsonData[$email])){
        header('Location: ?action=register&incorrect=true&userExists=true');
    }else{
        foreach ($jsonData as $array){
            if ($array["username"] == $username){
                header('Location: ?action=register&incorrect=true&userExists=true');
                return;
            }
        }

        $newUser = array("username" => $username,"password"=>$password);

        $jsonData[$email] = $newUser;

        encodeJson($jsonData, $json);

        header('Location: ?action=login&userCreated=true');
    }
}