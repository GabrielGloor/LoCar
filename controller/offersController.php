<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 28.01.2022
 * @Version : 0.1
 * @Description : This file is designed to manage the offers
 */

require "model/offersManagement.php";

function offers(){
    require "view/offers.php";
}

/**
 * @brief This function is designed to show all offers
 */
function showOffers(){
    $offersData = getOffersInfos();

    $nbOffers = count($offersData);
    if ($nbOffers == 0){
        $err = "Il n'y a aucune offre actuellement";
        require "view/contents/offer_template.php";
    }else{
        for ($showCurrentOffers = 0; $showCurrentOffers < $nbOffers; $showCurrentOffers++) {
            $class = $showCurrentOffers%2 ? $showCurrentOffers." pair" : $showCurrentOffers." impair";
            $name = $offersData[$showCurrentOffers]['name'];
            $linkImg = $offersData[$showCurrentOffers]['image'];
            $linkToDetails = "?action=offerDetails&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];

            require "view/contents/offer_template.php";
        }
    }
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
        for ($showCurrentOffers = $nbOffers - 4;    $showCurrentOffers < $nbOffers; $showCurrentOffers++) {
            $class = $showCurrentOffers%2 ? $showCurrentOffers." pair" : $showCurrentOffers." impair";
            $name = $offersData[$showCurrentOffers]['name'];
            $linkImg = $offersData[$showCurrentOffers]['image'];
            $linkToDetails = "?action=offerDetails&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];

            require "view/contents/offer_template.php";
        }
    }
}
