<?php
require 'PHPMailer-6.7.1/src/PHPMailer.php';
require 'PHPMailer-6.7.1/src/SMTP.php';
require 'PHPMailer-6.7.1/src/Exception.php';

include 'datoscorreo.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$mail = new PHPMailer(true);

try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail ->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anynaranjo2011@hotmail.com';
    $mail->Password = 'Octavia@2101';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('anynaranjo2011@hotmail.com', 'SCCA - Sistema de Control de Condiciones Ambientales');
    $mail->addAddress($correo,"Supervisor");

    $mail->isHTML(true);
    $mail->Subject = 'Anomalia en Invernadero';
    $mail->Body = '<div> <p>Uno de los invernaderos a su cargo presenta cambios en sus condiciones ambientales.</p>
    <p>Se solicita atencion inmediata</p></div>';
    $mail->send();

    //echo 'Correo Enviado';
}catch(Exception $e){
    echo 'Mensaje ' . $mail->ErrorInfo;
}

?>