<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to decode & Encode JSON's datas
 */

/**
 * @brief   This function is designed to decode the json data for use it in the functions
 * @param $file     Access to the json file
 * @return mixed    Return associative array with the data
 */
function decodeJson($file): mixed
{
	$json = file_get_contents($file);
	return json_decode($json,true);
}

/**
 * @brief   This function is designed to encode the data and write it in the json file.
 * @param $array    For send the data to input the file in an array
 * @param $file     Access to the json file
 */
function encodeJson($array, $file): bool|int
{
	$data = json_encode($array);
    //TODO NGY - you never use $json variable
	return file_put_contents($file,$data);
}