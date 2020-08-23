<?php 

    //Correo que se enviará
    $name 	 = $_POST['name'];
	$email 	 = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['subject'];
    $message = $_POST['message'];

    $body = "Nombre del consultante: " . $name . "<br> Nombre de su compañia: " . $company . "<br>Correo: " . $email . "<br>Teléfono: " . $phone . "<br>Mensaje: " . $message;

    /* Config PHP MAILER */
    require "includes/PHPMailer/Exception.php";
    require "includes/PHPMailer/PHPMailer.php";
    require "includes/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    
    /* Init */
    $oMail= new PHPMailer();
    $oMail->isSMTP();
    $oMail->SMTPDebug = SMTP::DEBUG_OFF; //No muestra info
    //$oMail->SMTPDebug = SMTP::DEBUG_CLIENT; //Info enviada al cliente

    /* SMTP config */
    $oMail->Host = 'localhost';
    $oMail->Port=25;
    $oMail->SMTPSecure=false;
    $oMail->SMTPAuth=false;
    $oMail->SMTPAutoTLS = false;

    /* Sent info */
    $oMail->setFrom("info@montsur.com","Contacto de Web Montsur");
    $oMail->addAddress("ruiai.bxb@gmail.com",$name);
    
    // Content
    $oMail->isHTML(true);
    $oMail->Subject='Nuevo mensaje de '. $name;
    $oMail->Body = $body;
    //$oMail->msgHTML("Hola esto es una prueba de envió de correo");
    $oMail->CharSet = 'UTF-8';
   

    // Enviar el mail
    if (!$oMail->send()) {
        echo 'Mailer Error: '. $oMail->ErrorInfo;
    } else {
        echo 'Success'; // El msg que resibirá el AJAX en shortcodes.js
    }
    
    /* if (!$oMail->send()) {
        echo 'Mailer Error: '. $oMail->ErrorInfo;
    } else {
        echo 'Message sent!';
    } */    
?>