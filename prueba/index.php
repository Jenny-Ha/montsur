<?php
    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $oMail= new PHPMailer();
    $oMail->isSMTP();

    $oMail->Host = 'localhost';
    $oMail->Port=25;
    $oMail->SMTPSecure=false;
    $oMail->SMTPAuth=false;
    $oMail->SMTPAutoTLS = false;

    //$oMail->Username="ps.jennyha@gmail.com";
    //$oMail->Password="M3thalme";
    $oMail->setFrom("info@montsur.com","Montsur");
    $oMail->addAddress("ps.jennyha@gmail.com","Jenny Dos");
    $oMail->Subject="PHPMailer comienza a trabajar";
    $oMail->msgHTML("Hola esto es una prueba de envió de correo");

    $oMail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;

    // Hasta aqui el original:
    /* $oMail= new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="ps.jennyha@gmail.com";
    $oMail->Password="M3thalme";
    $oMail->setFrom("ps.jennyha@gmail.com","Jenny Ha");
    $oMail->addAddress("ps.jennyha@gmail.com","Jenny Dos");
    $oMail->Subject="Prueba de PHPMailer";
    $oMail->msgHTML("Hola esto es una prueba de envió de correo"); */

    if(!$oMail->send())
        echo $oMail->ErrorInfo;  
?>