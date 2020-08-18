<?php
    $from = "sendermeail@yourprovider.com";
    $to = "destinationemail@yourprovider.com";
    $subject = "Simple test for mail function";
    $message = "This is a test to check if php mail function sends out the email";
    $headers = "From:" . $from;
    if (mail($to, $subject, $body, $header)) {
    echo("
        Message successfully sent!
    ");
    } else {
    echo("
        Message delivery failed...
    ");
    }
?>