<?php
$usermail ='binhphan2721@gmail.com';
$password = 'vdshiydhgqozwkcr';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';




function sendEmailForAccountActive($email,$link){   

    global $usermail;
    global $password;
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $usermail;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('binhphan2721@gmail.com', 'GoFish');
        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '[GoFish] Kích hoạt tài khoản của bạn';
        $mail->Body    = 'Chào mừng bạn đến với GoFish. Để sử dụng tài khoản vui lòng nhấp vào '.$link.' để kích hoạt tài khoản của bạn';
        $mail->AltBody = '';

        if($mail->send()){
            return true;
        }
        echo 'Vui lòng kiểm tra email của bạn để kích hoạt tài khoản';
    } catch (Exception $e) {
        echo "Có lỗi: {$mail->ErrorInfo}";
    }
    return false;
 }






?>