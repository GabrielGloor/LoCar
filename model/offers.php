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
    $querySelect = $id == null ? "SELECT id, title, description, price, town, brand, year, image, user_id FROM offers" : "SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.image, users.email FROM users INNER JOIN offers ON users.id = offers.user_id WHERE offers.id =".$id;

    //$querySelect = $id == null ? "SELECT offerNumber, title, description, price, town, brand, year, image, user_id FROM offers" : "SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.image, users.email FROM users INNER JOIN offers ON users.id =".offers.user_id."WHERE offers.id =".$id;

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
} //toDO

/**
 * @brief This function is designed to create an offer on insert it in json file
 * @param $offerData : This param contain all the offer's datas
 * @param $file : This param contain the informations about the offer image
 */
function createOffers($offerData, $file){
    $target_dir = "/view/model/content/offers_img/";
    $strseparator = '\'';

    $querySelect = "SELECT id, title, description, price, town, brand, year, image, user_id FROM offers";
    $allOffersDatas = executeQuerySelect($querySelect);

      foreach($allOffersDatas as $offerDatasCheck){
          if ($offerDatasCheck['title'] == $offerData['title']) header('Location: ?action=offerCreate&exists=true');
        }

    $id = count($allOffersDatas)+1;
    $file['img']['name'] = $id.substr($file['img']['name'],strpos($file['img']['name'],'.'),null);
    $image = $target_dir . basename($file["img"]["name"]);
    $name = $offerData['title'];
    $price = number_format(floatval($offerData['price']),2);
    $brand = $offerData['brand'];
    $description = $offerData['desc'];
    $town = $offerData['town'];
    $year = intval($offerData['year']);

    $ownerEmail = $_SESSION['email'];
    $querySelectUser = "SELECT id FROM users WHERE email = ".$strseparator.$ownerEmail.$strseparator;
    $getUserID = executeQuerySelect($querySelectUser);
    $userID = $getUserID[0]['id'];

    $creationQueryP1 = "INSERT INTO offers (title, description, price, town, brand, year, image, user_id) VALUES (".$strseparator.$name.$strseparator.", ".$strseparator.$description.$strseparator;
    $creationQueryP2 = ", ".$strseparator.$price.$strseparator.", ".$strseparator.$town.$strseparator.", ".$strseparator.$brand.$strseparator.", ".$strseparator.$year.$strseparator;
    $creationQueryP3 = ", ".$strseparator.$image.$strseparator.", ".$userID.")";
    $creationQuery = $creationQueryP1.$creationQueryP2.$creationQueryP3;
    executeQueryInsert($creationQuery);

    header('Location: ?action=offers&offerCreated=true');
} //toCheck

/**
 * @brief This function is designed to modify an offer
 * @param $offerData : This param contain all the offer's datas
 * @param $offerId : This param is the offer id. It will be used to fill the form with the data already existing for example
 */
function modifyOffers($offerData, $offerId){
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
    $queryUpdateP3 = ", user_id = ".$strSeparator.$userId[0]['id'].$strSeparator." WHERE id = ".$offerId;
    $queryUpdate = $queryUpdateP1.$queryUpdateP2.$queryUpdateP3;
    executeQueryUpdate($queryUpdate);

    header('Location: ?action=offers&offerModified=true');
} //toCheck

/**
 * @brief This function is designed to delete offers from his code
 * @param $offerId : Is the idd of the offer to delete
 */
function deleteOffers($offerId){
    $strseparator = '\'';

    $queryDelete = "DELETE FROM offers WHERE offerNumber = ".$strseparator.$offerId.$strseparator;
    executeQueryDelete($queryDelete);

} //toCheck
