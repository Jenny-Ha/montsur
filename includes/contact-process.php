<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");

    $from = "info@montsur.com";
    //$to = "destinationemail@yourprovider.com";
    $to = "ps.jennyha@gmail.com";
    $subject = "Simple test for mail function";
    $message = "This is a test to check if php mail function sends out the email";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: ". $from. "\r\n";
    $headers .= "Reply-To: ". $from. "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= "X-Priority: 1" . "\r\n";
  
    if (mail('ps.jennyha@gmail.com', $subject, $message, $headers)) {
    echo("
        Message successfully sent :)!
    ");
    } else {
    echo("
        Message delivery failed...
    ");
    }
?>