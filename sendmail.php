<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
        //Server settings   
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;         //Enable verbose debug output
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host = 'smtp.gmail.com';     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                    //Enable SMTP authentication
        $mail->Username = 'anhnaypa1@gmail.com';         //SMTP username
        $mail->Password = 'cyzeeymwzsszripl';                   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;
        $mail->CharSet = "UTF-8";
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anhnaypa1@gmail.com', 'Trần Nhật Quang');
        $mail->addAddress('kouame.ksma@gmail.com', 'Trần Nhật Quang');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('kouame.ksma@gmail.com', 'Trần Nhật Quang');
       //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test';
        $mail->Body = 'Test';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Đã gửi thành công email';
    } catch (Exception $e) {
        echo "Email không được gửi. Mailer Error: {$mail->ErrorInfo}";
    }