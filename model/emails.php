<?php
/**
 * @file         emails.php
 * @author       Diogo.DA-SILVA-FERNA
 * @date         25.03.2022
 * @project      PROJECT
 * @description  DESCRIPTION
 * @last_update  Diogo.DA-SILVA-FERNA - DATE
 */

function transport_noreply(){
    // Create the Transport
    $transport = (new Swift_SmtpTransport('mail01.swisscenter.com', 587))
        ->setUsername('no-reply@locar.mycpnv.ch')
        //TODO NGY - set password dynamically
        ->setPassword('22_2a_loca_NOBD')
    ;

    return $transport;
}

function createMailMessage($subject,$emailFrom,$emailFrom_Name,$emailTo,$body){
    if ($emailFrom == null) $emailFrom = "no-reply@locar.mycpnv.ch";
    if ($emailFrom_Name == null) $emailFrom_Name = "LoCar | No-Reply";

    $message = (new Swift_Message($subject))
        ->setFrom([$emailFrom => $emailFrom_Name])
        ->setTo([$emailTo])
        ->setContentType("text/html")
        ->setBody($body)
    ;

    return $message;
}

function confirm_mail($infos,$code){
    require_once 'model/vendor/autoload.php';

    // Create the Transport
    $transport = transport_noreply();

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Body message
    $body = "<html><body>";
    $body .= '<div style="width: 70%; margin-left: 15%; background-color: green;"><h2 style="text-align: center; color: white; padding: 20px 0">Confirmation !</h2></div>';

    if ($code != false) {
        $body .= "<div style='width: 70%; margin-left: 15%; padding: 20px 0; font-size: 15px;'><div style='text-align: center'>Votre intérêt pour <a href='locar.mycpnv.ch?action=offerDetails&offerId=$code' style='color: black'>l'annonce</a> n°" . $code . " à bien été prise en compte ! Un e-mail a été envoyé au propriétaire de l'annonce avec les informations ci-dessous:<br><br>";
    }else {
        $body .= "<div style='width: 70%; margin-left: 15%; padding: 20px 0; font-size: 15px;'><div style='text-align: center'>Vous avez aujourd'hui rempli le formulaire de contact. Votre e-mail a bien été transmis à notre équipe. Ci-dessous, retrouvez toutes les informations:<br><br>";
    }

    $body .= "<strong>Nom :</strong> " . $infos['name'] . "<br><strong>Numéro de téléphone :</strong> " . $infos['telNumber'] . "<br><strong>E-mail :</strong> <a href='mailto://" . $infos['mail'] . "'>" . $infos['mail'] . "</a><br><br>";
    $body .= "Vous pouvez également retrouvé ci-dessous le message :<br><br>";
    $body .= "<div style='font-style: italic; color: gray; width: 70%; margin-left: 15%'>" . $infos['msg'] . "</div></div></div>";
    $body .= "<div style='width: 70%; margin-left: 15%; background-color: #272727;'><p style='color: white; text-decoration: none; font-size: 15px; text-align: center; padding: 10px 0'>LoCar</p></div></body></html>";

    // Create a message
    $message = createMailMessage("Confirmation de contact", null, null, $infos['mail'], $body);

    // Send the message
    $mailer->send($message);
}

function mailSender($infos,$code){
    require_once 'model/vendor/autoload.php';

    // Create the Transport
    $transport = transport_noreply();

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    if ($code != false) {
        // Body message
        $body = "<html><body>";
        $body .= '<div style="width: 70%; margin-left: 15%; background-color: green;"><h2 style="text-align: center; color: white; padding: 20px 0">Une personne vous a contacté !</h2></div>';
        $body .= "<div style='width: 70%; margin-left: 15%; padding: 20px 0; font-size: 15px;'><div style='text-align: center'>Votre <a href='locar.mycpnv.ch?action=offerDetails&offerId=$code' style='color: black'>annonce</a> n°" . $code . " à porté de l'attention a quelqu'un aujourd'hui ! Ci-dessous, retrouvé les informations de cette personne:<br><br>";
        $body .= "<strong>Nom :</strong> " . $infos['name'] . "<br><strong>Numéro de téléphone :</strong> " . $infos['telNumber'] . "<br><strong>E-mail :</strong> <a href='mailto://" . $infos['mail'] . "'>" . $infos['mail'] . "</a><br><br>";
        $body .= "Vous pouvez également retrouvé ci-dessous le message de la personne :<br><br>";
        $body .= "<div style='font-style: italic; color: gray; width: 70%; margin-left: 15%'>" . $infos['msg'] . "</div></div></div>";
        $body .= "<div style='width: 70%; margin-left: 15%; background-color: #272727;'><p style='color: white; text-decoration: none; font-size: 15px; text-align: center; padding: 10px 0'>LoCar</p></div></body></html>";

        // Create a message
        $message = createMailMessage("Votre offre a intéressé une personne !", null, null, $infos['ownerEmail'], $body);
    }else{
        // Body message
        $body = "<html><body>";
        $body .= '<div style="width: 70%; margin-left: 15%; background-color: green;"><h2 style="text-align: center; color: white; padding: 20px 0">Une personne nous a contacté !</h2></div>';
        $body .= "<div style='width: 70%; margin-left: 15%; padding: 20px 0; font-size: 15px;'><div style='text-align: center'>Aujourd'hui, une personne a rempli le formulaire de contact. Ci-dessous, retrouvé les informations de cette personne:<br><br>";
        $body .= "<strong>Nom :</strong> " . $infos['name'] . "<br><strong>Numéro de téléphone :</strong> " . $infos['telNumber'] . "<br><strong>E-mail :</strong> <a href='mailto://" . $infos['mail'] . "'>" . $infos['mail'] . "</a><br><br>";
        $body .= "Vous pouvez également retrouvé ci-dessous le message de la personne :<br><br>";
        $body .= "<div style='font-style: italic; color: gray; width: 70%; margin-left: 15%'>" . $infos['msg'] . "</div></div></div>";
        $body .= "<div style='width: 70%; margin-left: 15%; background-color: #272727;'><p style='color: white; text-decoration: none; font-size: 15px; text-align: center; padding: 10px 0'>LoCar</p></div></body></html>";

        // Create a message
        $message = createMailMessage("E-mail de ".$infos['name'], null, null, "contact@locar.mycpnv.ch", $body);
    }

    // Send the message
    $result = $mailer->send($message);

    if ($result){
        confirm_mail($infos,$code);
        return true;
    }else return false;
}