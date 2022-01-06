<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once 'vendor/autoload.php';
require_once "const.php";
require_once "getValuesByName.php";

//Create an instance; passing `true` enables exceptions
function sendEmail($reciverEmail, $message)
{
    $mail = new PHPMailer(true);
    $companyEmail = COMPANY_EMAIL;
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $companyEmail;
        $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($companyEmail, EMAIL_USERNAME);
        $mail->addAddress($reciverEmail);
        $mail->addReplyTo(getValuesByName("email"), 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reply to the email';
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}