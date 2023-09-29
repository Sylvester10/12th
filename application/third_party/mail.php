<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

        //Server settings
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Mailer = "smtp";
        $mail->Host       = 'mail.12thcityrealestate.ng';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@12thcityrealestate.ng';                     // SMTP username
        $mail->Password   = '12thcityinfo';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Hostname = 'localhost.localdomain';
        $mail->SMTPSecure = 'ssl';
        $mail->addReplyTo('info@12thcityrealestate.ng', 'no-reply');


         //Recipients
        $mail->setFrom('info@12thcityrealestate.ng', 'Uche from 12th City');
        



?>