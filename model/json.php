<?php
/**
 * @Author : ROmain Humbert-Droz-Laurent
 * @Date : 10.02.2022
 * @Version : 0.1
 * @Description : This file is designed to decode & Encode JSON's datas
 */

/**
 * @brief   This function is designed to decode the json datas for use it in the functions
 * @param $file     Access to the json file
 * @return mixed    Return assiocative array with the datas
 */
function decodeJson($file){
	$json = file_get_contents($file);
	$data = json_decode($json,true);
	return $data;
}

/**
 * @brief   This function is designed to encode the datas and write it in the json file.
 * @param $array    For send the datas to input the file in an array
 * @param $file     Access to the json file
 */
function encodeJson($array, $file){
	$data = json_encode($array);
	$json = file_put_contents($file,$data);
}