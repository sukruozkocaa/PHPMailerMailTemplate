<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail_adres=$_POST['mail'];

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPKeepAlive = true;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Port = 587;
$mail->Host = "smtp.gmail.com";

$mail->Username = "Kaynak - Mail - Adresiniz";
$mail->Password = "Mail - Şifreniz";


$mail->setFrom($mail_adres);
$mail->addAddress($mail_adres);

$body = file_get_contents('./Template.html');



$mail->isHTML(true);
$mail->Subject = "Ozbay Web";
$mail->Body = $body;



if ($mail->send())
     echo "Mail gonderimi basarili."; 
   
else
    echo "Malesef olmadi.";
?>