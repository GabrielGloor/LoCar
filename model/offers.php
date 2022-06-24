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
function getOffersInfos($filters = "", $id = null): mixed
{
    $querySelect = $id == null ? "SELECT id, title, description, price, town, brand, year, imageName, user_id FROM offers WHERE active = 1" : "SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.image, users.email FROM users INNER JOIN offers ON users.id = offers.user_id WHERE offers.id =".$id." AND active = 1";

    //$querySelect = $id == null ? "SELECT offerNumber, title, description, price, town, brand, year, image, user_id FROM offers" : "SELECT offers.id, offers.title, offers.description, offers.price, offers.town, offers.brand, offers.year, offers.image, users.email FROM users INNER JOIN offers ON users.id =".offers.user_id."WHERE offers.id =".$id;

    $offersInfos = executeQuerySelect($querySelect);

    if($filters != ""){

        if($filters['search'] != ''){
            foreach($offersInfos as $index=>$offer){
                if(!strpos(" ".$offer['town']." ",$filters['search'])){
                    unset($offersInfos[$index]);
                }
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
 * @param $offerData : This param contain all the offer's data
 * @param $file : This param contain the information about the offer image
 */
function createOffers($offerData, $file){
    $target_dir = "model/content/offers_img/";
    $strSeparator = '\'';

    $querySelect = "SELECT id, title, description, price, town, brand, year, imageName, user_id FROM offers";
    $allOffersDatas = executeQuerySelect($querySelect);

      foreach($allOffersDatas as $offerDatasCheck){
          if ($offerDatasCheck['title'] == $offerData['title']) header('Location: ?action=offerCreate&exists=true');
        }

    $id = count($allOffersDatas)+1;
    $file['img']['name'] = $id.substr($file['img']['name'],strpos($file['img']['name'],'.'),null);
    $image = basename($file["img"]["name"]);
    $target = $target_dir . basename($file["img"]["name"]);

    //duplicate code -> see of 6 lines long in 98-103
    $name = $offerData['title'];
    $price = number_format(floatval($offerData['price']),2);
    $brand = $offerData['brand'];
    $description = $offerData['desc'];
    $town = $offerData['town'];
    $year = intval($offerData['year']);

    $ownerEmail = $_SESSION['email'];
    $querySelectUser = "SELECT id FROM users WHERE email = ".$strSeparator.$ownerEmail.$strSeparator;
    $getUserID = executeQuerySelect($querySelectUser);
    $userID = $getUserID[0]['id'];

    $creationQueryP1 = "INSERT INTO offers (title, description, price, town, brand, year, imageName, active, user_id) VALUES (".$strSeparator.$name.$strSeparator.", ".$strSeparator.$description.$strSeparator;
    $creationQueryP2 = ", ".$strSeparator.$price.$strSeparator.", ".$strSeparator.$town.$strSeparator.", ".$strSeparator.$brand.$strSeparator.", ".$strSeparator.$year.$strSeparator;
    $creationQueryP3 = ", ".$strSeparator.$image.$strSeparator.", 1, ".$userID.")";
    $creationQuery = $creationQueryP1.$creationQueryP2.$creationQueryP3;
    executeQueryInsert($creationQuery);

    move_uploaded_file($file["img"]["tmp_name"], $target);

    header('Location: ?action=offers&offerCreated=true');
} //toCheck

/**
 * @brief This function is designed to modify an offer
 * @param $offerData : This param contain all the offer's data
 * @param $offerId : This param is the offer id. It will be used to fill the form with the data already existing for example
 */
function modifyOffers($offerData, $offerId){
    $strSeparator = '\'';

    //duplicate code -> see of 6 lines long in 67-72
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

    $queryDelete = "UPDATE offers SET active = 0 WHERE id =".$strseparator.$offerId.$strseparator;
    executeQueryDelete($queryDelete);

} //toCheck
