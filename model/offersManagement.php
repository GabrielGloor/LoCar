<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 17.02.2022
 * @Version : 0.1
 * @Description : This file is designed for manage the offers
 */

require_once "model/json.php";

/**
 * @brief This function is designed to show all offers
 */
function showOffers(){

    $offersData = decodeJson("model/content/offers.json");

    $nbOffers = count($offersData);
    if ($nbOffers == 0){
        $err = "Il n'y a aucune offre actuellement";
        require "view/contents/offer_template.php";
    }else{
        for ($showCurrentOffers = 0; $showCurrentOffers < $nbOffers; $showCurrentOffers++) {
            $class = $showCurrentOffers%2 ? $showCurrentOffers." pair" : $showCurrentOffers." impair";
            $name = $offersData[$showCurrentOffers]['name'];
            $linkImg = $offersData[$showCurrentOffers]['image'];
            $linkToDetails = "?action=offer&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];

            require "view/contents/offer_template.php";
        }
    }
}


/**
 * @brief This function is designed to show the details of one offer
 * @param $offerId : This param is for designate only one offer
 */
function showOffersDetails($offerId){
    $offersData = decodeJson("model/content/offers.json");

    $name = null;
    $linkImg = null;
    $price = null;
    $brand = null;
    $year = null;
    $description = null;
    $town = null;

    foreach ($offersData as $offer){
        if ($offer['id'] == $offerId) {
            $name = $offersData['name'];
            $linkImg = $offersData['image'];
            $price = $offersData['price'];
            $description = $offersData['description'];
            $brand = $offersData['brand'];
            $year = $offersData['year'];
            $town = $offersData['town'];
        }
    }
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