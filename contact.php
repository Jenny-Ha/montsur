<?php 

    //Correo que se enviará
    $nameTo = 'Info Montsur';
    $nameFrom = 'Contacto - montsur.com';

    $name 	 = $_POST['name'];
	$email 	 = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['subject'];
    $message = $_POST['message'];
    
    $body = file_get_contents('includes/plantilla-correo.html');
    $body = str_replace('%Name%', $name, $body);
    $body = str_replace('%Email%', $email, $body);
    $body = str_replace('%Phone%', $phone, $body);
    $body = str_replace('%Message%', $message, $body);
    if (!empty($company)) {
		$body = str_replace('%Company%', $company, $body);
	}
	else { 
		$body = str_replace('%Company%', '(El consultante no ingresó este dato)', $body);
	}
    $body = preg_replace('/\\\\/','', $body); //Strip backslashes

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
    $oMail->setFrom("ventas@montsur.com", $nameFrom);
    $oMail->addAddress("info@montsur.com",$nameTo);
    
    // Content
    $oMail->Subject='Nuevo mensaje de '. $name;
    $oMail->msgHTML($body);
    $oMail->isHTML(true);
    //$oMail->Body = $body;
    $oMail->CharSet = 'UTF-8';
   

    // Enviar el mail
    if (!$oMail->send()) {
        echo 'Mailer Error: '. $oMail->ErrorInfo;
    } else {
        echo 'Success'; // El msg que resibirá el AJAX en shortcodes.js
    }    
?>