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
function createOffers($offerData, $file){
    $target_dir = "model/content/offers_img/";
    $jsonFile = "model/content/offers.json";
    $allOffersDatas = decodeJson($jsonFile);

    foreach ($allOffersDatas as $offerDatas){
        if ($offerDatas['name'] == $offerData['name']){
            header('Location: ?action=offerCreate&exists=true');
        }
    }

    $id = $allOffersDatas[count($allOffersDatas)-1]['id']+1;
    $file['img']['name'] = $id.substr($file['img']['name'],strpos($file['img']['name'],'.'),null);
    $image = $target_dir . basename($file["img"]["name"]);
    $name = $offerData['title'];
    $price = floatval($offerData['price']);
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

    header('Location: ?action=home');
}
