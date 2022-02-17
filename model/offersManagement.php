<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 17.02.2022
 * @Version : 0.1
 * @Description : This file is designed for manage the offers
 */

require "model/json.php";

function showOffers(){

    $offersData = decodeJson("model/content/offers.json");

    $nbOffers = count($offersData);
    if ($nbOffers == 0){
        $err = "Il n'y a aucune offre actuellement";
    }else{
        for ($showCurrentOffers = 1; $showCurrentOffers <= $nbOffers; $showCurrentOffers++) {
            $class = $showCurrentOffers%2 ? $showCurrentOffers." pair" : $showCurrentOffers." impair";
            $name = $offersData[$showCurrentOffers]['name'];
            $linkImg = $offersData[$showCurrentOffers]['image'];
            $linkToDetails = "?action=offer&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];

            require "view/contents/offer_template.php";
        }
    }
}

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