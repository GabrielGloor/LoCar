<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 17.02.2022
 * @Version : 0.1
 * @Description : This file is designed for manage the offers
 */

require_once "model/json.php";

function getOffersInfos(){
    $jsonFile = "model/content/offers.json";
    $offersInfos = decodeJson($jsonFile);
    return $offersInfos;
}

/**
 * @brief This function is designed to create an offer on insert it in json file
 * @param $data : This param contain all the offer's datas
 */
function createOffer($data){
    $jsonFile = "model/content/offers.json";
    $allOffersDatas = decodeJson($jsonFile);

    foreach ($allOffersDatas as $offerDatas){
        if ($offerDatas['name'] == $data['name']){
            header('Location: ?action=offerCreate&exists=true');
        }
    }

    $allOffersDatas .= $data;
    encodeJson($allOffersDatas, $jsonFile);

    header('Location: ?action=home');

}