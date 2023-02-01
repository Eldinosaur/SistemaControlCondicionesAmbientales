<?php
require '../PHPMailer-6.7.1/src/PHPMailer.php';
require '../PHPMailer-6.7.1/src/SMTP.php';
require '../PHPMailer-6.7.1/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail ->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anynaranjo2011@hotmail.com';
    $mail->Password = 'Octavia@2101';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('anynaranjo2011@hotmail.com', 'SCCA');
    $mail->addAddress('eldinosaur7u7@outlook.com','Supp');

    $mail->isHTML(true);
    $mail->Subject = 'Prueba de correo';
    $mail->Body = 'Esta es una prueba de <b>Correo</b>';
    $mail->send();

    echo 'Correo Enviado';
}catch(Exception $e){
    echo 'Mensaje ' . $mail->ErrorInfo;
}

?>