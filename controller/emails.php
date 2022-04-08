<?php
/**
 * @file         emails.php
 * @author       Diogo.DA-SILVA-FERNA
 * @date         25.03.2022
 * @project      PROJECT
 * @description  DESCRIPTION
 * @last_update  Diogo.DA-SILVA-FERNA - DATE
 */

function mail_c($infos,$offer){
    if (isset($infos['ownerEmail']) || isset($infos['name'])){
        require_once "model/emails.php";

        if(mail_m($infos,$offer)){
            if ($offer != false) header('Location: ?action=offerDetails&offerId='.$offer.'&confirm=true#contact');
            else header('Location: ?action=home&confirm=true#nous-contacter');
        }
        else{
            if ($offer != false) header('Location: ?action=offerDetails&offerId='.$offer.'&confirm=false#contact');
            else header('Location: ?action=home&confirm=false#nous-contacter');
        }
    }else{
        if ($offer != false) header('Location: ?action=offerDetails&offerId='.$offer.'#contact');
        else header('Location: ?action=home#nous-contacter');
    }
}
