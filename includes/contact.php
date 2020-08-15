<?php 
    $destination = "ps.jennyha@gmail.com"; // email address of destination pass: @goldpigperu
    
    //Correo que se enviará
    $name 	 = stripslashes($_POST['name']);
	$email 	 = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['subject']);
    $message = stripslashes($_POST['message']);

    $header = "Enviado desde Montsur";
    $mensajeCompleto = $message . '\nAtentamente: ' . $name . $company;

    mail($destination, $subject, $mensajeCompleto,$header);

    echo "<script>alert('Su mensaje se envió correctamente')</script>";
    echo "<script> setTimeout(\"location.href='index.html'\", 1000)</script>";

?>