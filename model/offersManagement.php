<?php
/**
 * @Author : Romain Humbert-Droz-Laurent
 * @Date : 17.02.2022
 * @Version : 0.1
 * @Description : This file is designed for manage the offers
 */

require_once "model/json.php";

/**
 * @brief This function is designed to take offers infos in the json data file
 * @return mixed This function return the datas of the offers
 */
function getOffersInfos(){
    $jsonFile = "model/content/offers.json";
    $offersInfos = decodeJson($jsonFile);
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
    $jsonFile = "model/content/offers.json";
    $allOffersDatas = getOffersInfos();
    $offerModified = null;

    foreach ($allOffersDatas as $index => $offerDatas){
        if ($offerDatas['id'] == $offerId){
            $allOffersDatas[$index]['name'] = $offerData['title'];
            $allOffersDatas[$index]['price'] = number_format(floatval($offerData['price']),2);
            $allOffersDatas[$index]['brand'] = $offerData['brand'];
            $allOffersDatas[$index]['description'] = $offerData['desc'];
            $allOffersDatas[$index]['town'] = $offerData['town'];
            $allOffersDatas[$index]['year'] = intval($offerData['year']);
            break;
        }
    }

    encodeJson($allOffersDatas, $jsonFile);

    header('Location: ?action=offers&offerModified=true');
}

/**
 * @brief This function is designed to delete offers from his code
 * @param $offerId : Is the idd of the offer to delete
 */
function deleteOffers($offerId){
    $datas = getOffersInfos();
    $index = NULL;
    $file = "model/content/offers.json";

    foreach ($datas as $key=>$data){
        if ($data['id'] == $offerId){
            $index = $key;
            break;
        }
    }

    unset($datas[$index]);

    encodeJson($datas, $file);

}
