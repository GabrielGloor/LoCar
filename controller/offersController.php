<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 28.01.2022
 * @Version : 0.1
 * @Description : This file is designed to manage the offers
 */

require_once "model/offersManagement.php";

/**
 * @brief This function is designed to show to the user the offer page with all the offers
 */
function offers(){
    $offers = getOffersInfos();
    $classNb = 0;

    ob_start();
    foreach ($offers as $offer){
        $class = $classNb%2 ? ($classNb+1)." pair" : ($classNb+1)." impair";
        $name = $offer['name'];
        $linkToImg = $offer['image'];
        $price = $offer['price'];
        $id = $offer['id'];
        $linkToDetails = "?action=offerDetails&offerId=".$id;

        require "view/contents/offer_template.php";
        $classNb++;
    }
    $products = ob_get_clean();
    require "view/offers.php";
}

/**
 * @brief This function is designed the last 4 offers only in the home page
 */
function showOffersInHomePage(){
    $offersData = getOffersInfos();

    $nbOffers = count($offersData);
    if ($nbOffers == 0){
        $err = "Il n'y a aucune offre actuellement";
        require "view/contents/offer_template.php";
    }else{
        for ($showCurrentOffers = $nbOffers - 4; $showCurrentOffers < $nbOffers; $showCurrentOffers++) {
            $class = $showCurrentOffers%2 ? $showCurrentOffers." impair" : $showCurrentOffers." pair";
            $name = $offersData[$showCurrentOffers]['name'];
            $linkToImg = $offersData[$showCurrentOffers]['image'];
            $linkToDetails = "?action=offerDetails&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];

            require "view/contents/offer_template.php";
        }
    }
}

/**
 * @brief This function is designed to show to the user a page with all the infos of an offer
 * @param $id : ID of the offer get by $_GET
 */
function offerDetails($id){
    $offersDatas = getOffersInfos();

    foreach ($offersDatas as $offerData){
        if ($offerData['id'] == $id) {
            $linkToImg = $offerData['image'];
            $name = $offerData['name'];
            $price = $offerData['price'];
            $town = $offerData['town'];
            $brand = $offerData['brand'];
            $year = $offerData['year'];
            $description = $offerData['description'];
            $title = $name;

            require "view/offerDetails.php";
        }
    }
}

function createOffer($infos){
    if (isset($infos['name'])){

    }else{
        require "view/createOffer.php";
    }
}