<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/Exception.php';
require_once __DIR__ . '/phpmailer/PHPMailer.php';
require_once __DIR__ . '/phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupérer les données du formulaire
  $name = $_POST['mot de passe'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = getenv('SMTP_USERNAME');
    $mail->Password = getenv('SMTP_PASSWORD');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom(getenv('SMTP_USERNAME'));
    $mail->addAddress('tsoin2017@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name: $name <br>Email: $email <br>Message: $message</h3>";

    $mail->send();
    $alert = 'Message Sent! Thank you for contacting us.';
  } catch (Exception $e) {
    $alert = 'Error: ' . $e->getMessage();
  }
}

echo $alert;
?>
