<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 28.01.2022
 * @Version : 0.1
 * @Description : This file is designed to manage the offers
 */


require "model/offers.php";

/**
 * @brief This function is designed to show to the user the offer page with all the offers
 */

define("YEAR_ERROR_MESSAGE" , "L'année rentrée est erronée ! (supérieur 1920 | inférieur Année actuelle)");

function offers($filters = null){
    $offers = getOffersInfos($filters);
    $classNb = 0;

    ob_start();
    
    if(!empty($offers)){
        foreach ($offers as $offer){
            $class = $classNb%2 ? ($classNb+1)." pair" : ($classNb+1)." impair";
            $name = $offer['title'];
            $linkToImg = $offer['imageName'];
            $price = $offer['price'];
            $offerId = $offer['id'];
            $linkToDetails = "?action=offerDetails&offerId=".$offerId;
            $btnName = 'Détails';

            require "view/contents/offer_template.php";
            $classNb++;
        }
    }else{
        echo "<h2>Aucune offre correspond à vos filtres.</h2>";
    }
    
    $products = ob_get_clean();
    require "view/offers.php";
}

/**
 * @brief This function is designed show the last 4 offers on the home page
 */
function showOffersInHomePage(){
    $offersData = getOffersInfos();

    $nbOffers = count($offersData)-1;
    if ($nbOffers == 0){
        $err = "Il n'y a aucune offre actuellement";
        require "view/contents/offer_template.php";
    }else{
        for ($showCurrentOffers = $nbOffers; $showCurrentOffers >= $nbOffers-3; $showCurrentOffers--) {
            $class = ($showCurrentOffers-($nbOffers-4))%2 ? ($showCurrentOffers-($nbOffers-4))." pair" : ($showCurrentOffers-($nbOffers-4))." impair";
            $name = $offersData[$showCurrentOffers]['title'];
            $linkToImg = $offersData[$showCurrentOffers]['imageName'];
            $linkToDetails = "?action=offerDetails&offerId=".$offersData[$showCurrentOffers]['id'];
            $price = $offersData[$showCurrentOffers]['price'];
            $btnName = 'Détails';
            $offerId = $offersData[$showCurrentOffers]['id'];

            require "view/contents/offer_template.php";
        }
    }
}

/**
 * @brief This function is designed to show to the user a page with all the infos of an offer
 * @param $offferId : ID of the offer get by $_GET
 */

/*function offerDetails($id)
{
    $offersDatas = getOffersInfos($id);
}
*/
function offerDetails($offerId)
{
    $offersDatas = getOffersInfos("", intval($offerId));


    foreach ($offersDatas as $offerData){
        if ($offerData['id'] == $offerId) {
            $linkToImg = $offerData['image'];
            $name = $offerData['title'];
            $price = $offerData['price'];
            $town = $offerData['town'];
            $brand = $offerData['brand'];
            $year = $offerData['year'];
            $description = $offerData['description'];
            $ownerEmail = $offerData['email'];
            $title = $name;

            require "view/offerDetails.php";
        }
    }
}

function createOffer($infos, $file){
    if (!isset($_SESSION['username'])) header('Location: ?action=home');

    if (isset($infos['title'])){
        if ((int) $infos['year'] > (int) date("Y") || (int) $infos['year'] < 1920){
            setInfos($infos);
            $yearErr = YEAR_ERROR_MESSAGE;

            require "view/createOffer.php";
        }else{
            createOffers($infos, $file);
        }
    }else{
        require "view/createOffer.php";
    }
}

function modifyOffer($infos, $offerId){
    if (!isset($_SESSION['username'])) header('Location: ?action=home');

    $offers = getOffersInfos();
    $owner = null;

    $strSeparator ='\'';
    $query = "SELECT id FROM users WHERE email =".$strSeparator.$_SESSION['email'].$strSeparator;
    $userId = executeQuerySelect($query);

    foreach($offers as $offer){
        if($offer['id'] == $offerId){
            if($offer['user_id'] != $userId[0]['id']){
                header('Location: ?action=home');
            }else{
                $owner = true;
            }
        }
    }

    if (isset($infos['title'])){
        if ((int) $infos['year'] > (int) date("Y") || (int) $infos['year'] < 1920){
            setInfo($infos);
            $yearErr = YEAR_ERROR_MESSAGE;
        }else {
            modifyOffers($infos, $offerId);
        }
    }else{
        foreach($offers as $offer){
            if($offer['id'] == $offerId){
                setInfo($offer);
            }
        }

        require "view/modifyOffer.php";
    }
}

/**
 * @param $offerId
 */
function deleteOffer($offerId){
    deleteOffers($offerId);
    header("Location: ?action=user&username=".$_SESSION['username']."&deleted=true");
}

function setInfo($infos){
    $offerId = $infos['id'];
    $name = $infos['title'];
    $town = $infos['town'];
    $brand = $infos['brand'];
    $desc = $infos['description'];
    $year = $infos['year'];
    $price = $infos['price'];

    require "view/modifyOffer.php";
}