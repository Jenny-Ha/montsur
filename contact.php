<?php 

    $from = "info@montsur.com";
    $to = "ps.jennyha@gmail.com"; // email address of destination pass: @goldpigperu
    $subject = "Web Montsur - Contacto";

    //Correo que se enviará
    $name 	 = $_POST['name'];
	$email 	 = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['subject'];
    $message = $_POST['message'];

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: ". $from. "\r\n";
    $headers .= "Reply-To: ". $from. "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= "X-Priority: 1" . "\r\n";

    $mensajeCompleto = $message . '\nAtentamente: ' . $name . $company . $email . $phone;

    if(mail($to, $subject, $mensajeCompleto, $headers)) {
       
        echo "<script>alert('Su mensaje se envió correctamente')</script>";
    } else {
        echo "<script>alert('Failed envio')</script>";
    }

    // echo "<script> setTimeout(\"location.href='index.html'\", 1000)</script>";

?>