<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 17.02.2022
 * @Version : 0.1
 * @Description : This file is designed for manage the offers
 */

require_once "model/json.php";
require_once "model/dbConnector.php";

/**
 * @brief This function is designed to take offers infos in the json data file
 * @return mixed This function return the datas of the offers
 */
function getOffersInfos($filters = "", $id = null){
    //$jsonFile = "model/content/offers.json";
    //$offersInfos = decodeJson($jsonFile);
    $querySelect = $id == null ? "SELECT offerNumber, title, description, price, town, brand, year, image, user_id FROM offers" : "SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.image, users.email FROM users INNER JOIN offers ON users.id =".offers.user_id."WHERE offers.id =".$id;
    $offersInfos = executeQuerySelect($querySelect);

    $indexes = array();

    if($filters != ""){

        if($filters['search'] != ''){
            foreach($offersInfos as $index=>$offer){
                if(strpos($offer['town'],$filters['search']) == false){
                    array_push($indexes,$index);
                }
            }

            //TODO NGY What about cleaning the $indexes instead of making a look of each items ?
            foreach($indexes as $index){
                unset($offersInfos[$index]);
            }
        }

        if($filters['prices'] != ''){
            $prices = array_column($offersInfos, 'price');
            if($filters['prices'] == 'asc'){
                array_multisort($prices, SORT_ASC, $offersInfos);
            }elseif($filters['prices'] == 'desc'){
                array_multisort($prices, SORT_DESC, $offersInfos);
            }
        }
    }

    return $offersInfos;
}

/**
 * @brief This function is designed to create an offer on insert it in json file
 * @param $offerData : This param contain all the offer's datas
 * @param $file : This param contain the informations about the offer image
 */
function createOffers($offerData, $file){
    $target_dir = "model/content/offers_img/";
    $jsonFile = "model/content/offers.json";
    $allOffersDatas = getOffersInfos();

    foreach ($allOffersDatas as $offerDatas){
        if ($offerDatas['name'] == $offerData['title']){
            header('Location: ?action=offerCreate&exists=true');
        }
    }

    $id = $allOffersDatas[count($allOffersDatas)-1]['id']+1;
    $file['img']['name'] = $id.substr($file['img']['name'],strpos($file['img']['name'],'.'),null);
    $image = $target_dir . basename($file["img"]["name"]);
    $name = $offerData['title'];
    $price = number_format(floatval($offerData['price']),2);
    $brand = $offerData['brand'];
    $description = $offerData['desc'];
    $town = $offerData['town'];
    $year = intval($offerData['year']);
    $ownerEmail = $_SESSION['email'];

    $arrayData = array(
        "id" => $id,
        "name" => $name,
        "price" => $price,
        "description" => $description,
        "town" => $town,
        "image" => $image,
        "brand" => $brand,
        "ownerEmail" => $ownerEmail,
        "year" => $year
    );

    move_uploaded_file($file["img"]["tmp_name"], $image);

    $allOffersDatas[count($allOffersDatas)] = $arrayData;

    encodeJson($allOffersDatas, $jsonFile);

    header('Location: ?action=offers&offerCreated=true');
}

/**
 * @brief This function is designed to modify an offer
 * @param $offerData : This param contain all the offer's datas
 * @param $offerId : This param is the offer id. It will be used to fill the form with the data already existing for example
 */
function modifyOffers($offerData, $offerId){
    //$jsonFile = "model/content/offers.json";
    //$allOffersDatas = getOffersInfos();
    //$offerModified = null;
    $strSeparator = '\'';

    $title = $offerData['title'];
    $price = number_format(floatval($offerData['price']),2);
    $brand = $offerData['brand'];
    $description = $offerData['desc'];
    $town = $offerData['town'];
    $year = intval($offerData['year']);
    $userId = executeQuerySelect("SELECT id FROM users WHERE email = ".$strSeparator.$_SESSION['email'].$strSeparator);

    $queryUpdateP1 = "UPDATE offers SET title = ".$strSeparator.$title.$strSeparator.", description = ".$strSeparator.$description.$strSeparator.", price = ".$strSeparator.$price.$strSeparator;
    $queryUpdateP2 = ", town = ".$strSeparator.$town.$strSeparator.", brand = ".$strSeparator.$brand.$strSeparator.", year = ".$strSeparator.$year.$strSeparator;
    $queryUpdateP3 = ", user_id = ".$strSeparator.$userId.$strSeparator." WHERE offerId = ".$offerId;
    $queryUpdate = $queryUpdateP1.$queryUpdateP2.$queryUpdateP3;
    executeQueryUpdate($queryUpdate);

    /*foreach ($allOffersDatas as $index => $offerDatas){
        if ($offerDatas['id'] == $offerId){
            $allOffersDatas[$index]['name'] = $offerData['title'];
            $allOffersDatas[$index]['price'] = number_format(floatval($offerData['price']),2);
            $allOffersDatas[$index]['brand'] = $offerData['brand'];
            $allOffersDatas[$index]['description'] = $offerData['desc'];
            $allOffersDatas[$index]['town'] = $offerData['town'];
            $allOffersDatas[$index]['year'] = intval($offerData['year']);
            break;
        }
    }*/

    //encodeJson($allOffersDatas, $jsonFile);

    header('Location: ?action=offers&offerModified=true');
} //Ended

/**
 * @brief This function is designed to delete offers from his code
 * @param $offerId : Is the idd of the offer to delete
 */
function deleteOffers($offerId){
    //$datas = getOffersInfos();
    //$index = NULL;
    //$file = "model/content/offers.json";
    $strseparator = '\'';

    $queryDelete = "DELETE FROM offers WHERE offerNumber = ".$strseparator.$offerId.$strseparator; // Delete where offerid = $offerId
    executeQueryDelete($queryDelete);

} //Ended
